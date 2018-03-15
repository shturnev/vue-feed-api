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

    public function __construct()
    {
        $this->DB = DB::init();
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

    public static function new_key()
    {
        return hash('sha256', time().rand().rand());
    }
}