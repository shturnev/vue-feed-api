<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 16.03.2018
 * Time: 12:18
 */

namespace classes\getters;

use classes\Client;
use classes\helpers\Counter;
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
            throw new \Exception("Access dinied (1)");}

        if($resDB['client_id' != $client['id']]){
            throw new \Exception("Access dinied (2)");}

        $resDB['text'] = stripslashes($resDB['text']);
        return $resDB;
    }

    //вывод всех by (авторизованного) user_id
    private function m_2($array)
    {
        if($array['private_key']){
            $client = (new Client())->check_key($array['private_key'], "private");
            $tmp = null;
        }
        else
        {
            $client = (new Client())->check_key($array['public_key'], "public");
            $tmp = "AND protected = 0";
        }

        if(!$client){
            throw new \Exception("Wrong client key");}

        $limit  = (!is_numeric($array["limit"]))? 35 : $array["limit"];
        $page   = (!is_numeric($array["page"]))? 0 : $array["page"];

        $search = TextSecurity::shield_hard($array['search']);
        if($search){ $search = str_replace(' ', '**', $search);}
        $tmp2 = ($search)? " AND MATCH(title, text) AGAINST('*".$search."*' IN BOOLEAN MODE)" : null;

        $sql = "SELECT COUNT(*) as n FROM feed WHERE client_id = ".$client['id']." ".$tmp.$tmp2;
        $resCount = $this->DB->rawQueryOne($sql)["n"];
        if(!$resCount){ return false; }

        //nav
        $arr = [
            "limit" => $limit,
            "page"  => $page,
            "posts" => $resCount,
        ];

        $resNav = Counter::get_nav($arr);

        //делаем выборку
        $sql = "SELECT * FROM feed WHERE client_id = ".$client['id']." ".$tmp.$tmp2." ORDER BY date DESC LIMIT ".$resNav["start"].",".$resNav["limit"];
        $resDb = $this->DB->rawQuery($sql);

        $resDb = array_map(function ($item){
            $item["text"] = stripslashes($item["text"]);
            return $item;
        }, $resDb);

        //res
        $res = [
            "count_items" =>$resCount,
            "search" => ($array['search'])?: false,
            "items" => $resDb,
            "pages" => $resNav["stack"]
        ];
        return $res;
    }

    //Вывод инфо


}