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

    /**
     * @param $array - [token, id]
     * @return bool
     * @throws \Exception
     */
    public function delete($array)
    {
        if(!$u = (new User())->isAuth($array['token'])){
            throw new \Exception("Отказано в доступе");}

        if(!is_numeric($array['id'])){
            throw new \Exception("Не корректный параметр id");}

        $this->DB->where("id", $array['id'])->where("user_id", $u['id']);
        $resDb = $this->DB->getOne("clients", 'id');
        if(!$resDb){
            throw new \Exception("Нет доступа, или запись не найдена");}

        $this->DB->where("id", $array['id']);
        $this->DB->delete("clients");

        return true;
    }

    public function check_key(string $key, $type = 'private')
    {
        $type = ($type == 'private')? 'private_key' : 'public_key';

        $this->DB->where($type, TextSecurity::shield_hard($key));
        return $this->DB->getOne("clients");
    }

    public function new_key()
    {
        return hash("sha256", time().rand());
    }
}