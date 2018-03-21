<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 20.03.2018
 * Time: 15:50
 */

namespace classes;


use classes\helpers\DB;
use classes\helpers\TextSecurity;
use PHPMailer\PHPMailer\PHPMailer;

class User
{

    public function __construct()
    {
        $this->DB = DB::init();
    }

    public function login(array $array){

        if(!$email = filter_var($array['email'], FILTER_VALIDATE_EMAIL)){
            throw new \Exception("Не корректный email", 1);}

        if(!$array['pass']){
            throw new \Exception("Не верный пароль", 2);}

        $email = strtolower($email);

        $this->DB->where("email", $email);
        $resDb = $this->DB->getOne("users");

        //если пользователь есть в базе
        if($resDb){
            if(!$array['pass'] || !password_verify($array['pass'], $resDb['pass'])){
                throw new \Exception("Не верный пароль", 2);}

            if(!$resDb['verified']){
                throw new \Exception("Необходимо подтвердить email", 3);}

            return $resDb;
        }

        //если не найден пользователь, создадим его
        $token = $this->new_token();
        $arr = [
            "email" => $email,
            "pass" => password_hash($array['pass'], PASSWORD_DEFAULT),
            "date" => time(),
            "token" => $token
        ];

        $this->DB->insert("users", $arr);

        //отправим письмо
        $mail = new PHPMailer();
        $mail->isMail();
        $mail->CharSet = "utf-8";
        $mail->setFrom("admin@test.com", "from API");
        $mail->isHTML(true);
        $mail->Subject = "Подтверждение email";
        $mail->addAddress($email);
        $mail->Body = "
            <h1>Welcome to API</h1>
            <p>Для завершения регистрации подтвердите свой email по ссылке: 
              <a href='".HOST."api/?method_name=confirm_email&token=".$token."'> 
              ".HOST."api/?method_name=confirm_email&token=".$token."
              </a>
            </p>
        ";
        $mail->send();

        return false;
    }
    public function confirm(string $token)
    {
        if(!$token = TextSecurity::shield_hard($token)){
            throw new \Exception("Не корректный token");}

        $new_token = $this->new_token();
        $this->DB->where("token", $token);
        $res = $this->DB->update("users", [
            "token" => $new_token,
            "verified" => 1
        ]);


        $this->DB->where("token", $new_token);
        return $this->DB->getOne("users");
    }
    public function isAuth($token)
    {
        if(!$token = TextSecurity::shield_hard($token)){ return false; }

        $this->DB->where("token", $token);
        return $this->DB->getOne("users");
    }



    public function new_token()
    {
        return hash("md5", time().rand());
    }
}