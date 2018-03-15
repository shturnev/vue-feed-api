<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 14.03.2018
 * Time: 21:10
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
        $this->url = "http://vue-feed-api/";
    }

    /**
     * Авторизация / регистрация
     * @param array $array
     * @return array - [email, pass]
     * @throws \Exception
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function login(array $array)
    {
        if(!filter_var($array['email'], FILTER_VALIDATE_EMAIL)){
            throw new \Exception('Invalid parametr `email`');}

        if(!$array['pass']){
            throw new \Exception("Password should not be empty ");}


        //проверим есть ли такой пользователь
        $this->DB->where("email", strtolower($array['email']));
        $resDb = $this->DB->getOne("users");

        if($resDb)
        {
            if(!password_verify($array['pass'], $resDb['pass'])){
                throw new \Exception("Access Denied");}

            if(!$resDb['verified']){
                throw new \Exception("You need to confirm your email");}

            //ну и на конец если все ок то авторизовывем
            self::auth($resDb["token"]);
            return $resDb;
        }

        //если пользователь новый то отправим ему письмо с прозьбой подтвердить email
        $code = $this->new_token();

        $mail = new PHPMailer(true);
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->isMail();
        $mail->addAddress($array['email']);
        $mail->isHTML(true);
        $mail->Subject = 'Confirm your email';
        $mail->Body    = '
            <h2>Welcome to API!</h2>
            <p>For continue you need to confirm your email by this link 
              <a href="'.$this->url.'api.php?method_name=confirm_email&code='.$code.'">
                '.$this->url.'api.php?method_name=confirm_email&code='.$code.'
              </a>
            </p>
        ';
        $mail->send();

        //добавим в бд
        $arr = [
            "email" => strtolower($array['email']),
            "pass"  => password_hash($array['pass'], PASSWORD_DEFAULT ),
            "token" => $code,
            "date"  => time()
        ];
        $this->DB->insert("users", $arr);
        setcookie("need_email_confirm", 1, strtotime("+1 year"));

        return true;
    }

    public function confirm_email(string $token)
    {
        $token = TextSecurity::shield_hard($token);
        $new_token = $this->new_token();
        $this->DB->where("token", $token);
        $resDb = $this->DB->getOne("users");
        if(!$resDb){
            throw new \Exception("Access denied");}

        $this->DB->where("token", $token);
        $this->DB->update("users", ["verified" => 1, 'token' => $new_token]);

        $resDb["verified"] = 1;
        self::auth($new_token);
        return $resDb;
    }
    public static function auth($token)
    {
        setcookie("need_email_confirm", 1, time() - 5);
        setcookie("token", $token, strtotime("+1 year"));
    }
    public function isAuth($token)
    {
        $token = TextSecurity::shield_hard($token);
        $this->DB->where("token", $token)->where("verified", 1);
        return $this->DB->getOne("users");
    }
    private function new_token()
    {
        return md5(time().rand());
    }
}