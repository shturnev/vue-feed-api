<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 16.03.2018
 * Time: 21:31
 */

namespace classes;


use classes\helpers\DB;
use classes\helpers\TextSecurity;

class Feed
{

    public function __construct()
    {
        $this->DB = DB::init();
    }

    /**
     * Создать запись в ленте
     * @param $array - [private_key, protected, title, text]
     * @throws \Exception
     */
    public function add($array)
    {
        if(!$array['private_key']){
            throw new \Exception("Пропущен важный параметр `private_key`");}

        $this->DB->where("private_key", TextSecurity::shield_hard($array['private_key']));
        $client = $this->DB->getOne("clients");
        //todo продолжить здесь
    }
}