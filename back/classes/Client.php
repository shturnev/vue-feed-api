<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 21.03.2018
 * Time: 12:54
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

    public function create($array)
    {
        if(!$u = (new User())->isAuth($array['token'])){
            throw new \Exception("Отказано в доступе");}

        $arr = [
            "user_id" => $u['id'],
            "date" => time(),
            "title" => TextSecurity::shield_hard($array['title']) ?: time(),
            "public_key" => $this->new_key(),
            "private_key" => $this->new_key()
        ];

        $resDb = $this->DB->insert("clients", $arr);
        $arr['id'] = $resDb;
        return $arr;
    }

    public function new_key()
    {
        return hash("sha256", time().rand());
    }
}