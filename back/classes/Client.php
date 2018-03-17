<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 15.03.2018
 * Time: 20:07
 */

namespace classes;


use classes\helpers\DB;
use classes\helpers\TextSecurity;

class Client
{
    public $user;

    public function __construct($user = null)
    {
        $this->DB = DB::init();
        $this->user = $user;
    }

    public function create($array, $token)
    {
        $user = (new User())->isAuth($token);
        if(!$user){
            throw new \Exception("Access denied");}

        $title = TextSecurity::shield_hard($array['title'])?: time();

        $arr = [
            "user_id" => $user['id'],
            "date" => time(),
            "title" => $title,
            "public_key" => self::new_key(),
            "private_key" => self::new_key(),
        ];

        $resDb = $this->DB->insert("clients", $arr);

        return $resDb;

    }

    public function delete($array)
    {
        if(!$this->user or !is_numeric($array['id'])){
            throw new \Exception("Invalid parametrs `user` or `id`");}

        $this->DB->where("user_id", $this->user['id'])->where("id", $array['id']);
        $resDb = $this->DB->delete("clients");

        return $resDb;
    }

    public static function new_key()
    {
        return hash('sha256', time().rand().rand());
    }

    /**
     * проверить ключ
     * @param $key
     * @param string $type
     */
    public function check_key($key, $type = 'private')
    {
        $this->DB->where($type."_key", TextSecurity::shield_hard($key));
        return $this->DB->getOne("clients");

    }
}