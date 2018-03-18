<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 16.03.2018
 * Time: 12:18
 */

namespace classes\getters;

use classes\Client;
use classes\helpers\DB;
use classes\helpers\TextSecurity;
//use classes\User;

class FeedGet
{
    use MainGet;

//    public $user;

    public function __construct($user = null)
    {
        $this->DB = DB::init();

//        $this->user = $user;
    }


    /**
     * вывод by id
     * @param $array - [public_key, ~private_key, id]
     * @return array
     * @throws \Exception
     */
    private function m_1($array)
    {
        if(!is_numeric($array['id'])){
            throw new \Exception("Invalid parametr `id`");}

        //узнаем инфо про эту запись
        $this->DB->where("id", $array['id']);
        $resDB = $this->DB->getOne("feed");
        if(!$resDB){
            throw new \Exception("Item not found");}

        //если запись защищённая
        $client = ($resDB['protected'])?
            (new Client())->check_key($array['private_key'], "private") :
            (new Client())->check_key($array['public_key'], "public");

        if (!$client){
            throw new \Exception("Client not found");}

        if($resDB['client_id' != $client['id']]){
            throw new \Exception("Access dinied");}

        return $resDB;
    }

    //вывод всех by (авторизованного) user_id
    private function m_2($array)
    {
        if(!$this->user){
            throw new \Exception("Access denied");}

//        if(!)

        $this->DB->where("user_id", $this->user['id'])->orderBy("id", "DESC");
        $resDb = $this->DB->get("clients");

        return $resDb;
    }

    //Вывод инфо


}