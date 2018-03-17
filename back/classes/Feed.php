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
     * @return array
     * @throws \Exception
     */
    public function add($array)
    {
        if(!$array['private_key']){
            throw new \Exception("Пропущен важный параметр `private_key`");}

        $client = (new Client())->check_key($array['private_key'], 'private');
        if (!$client){
            throw new \Exception("Client not found");}

        $arr = [
            "client_id" => $client['id'],
            "user_id" => $client['user_id'],
            "protected" => ($array['protected']) ? 1 :0,
            "date" => time(),
            "title" => TextSecurity::shield_hard($array['title']),
            "text" => TextSecurity::shield_light($array['text']),
        ];

        $res = $this->DB->insert("feed", $arr);
        $arr['id'] = $this->DB->getInsertId();

        return $arr;

    }
}