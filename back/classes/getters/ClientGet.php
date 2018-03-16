<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 16.03.2018
 * Time: 12:18
 */

namespace classes\getters;

use classes\helpers\DB;

class ClientGet
{
    use MainGet;

    public $user;

    public function __construct($user = null)
    {
        $this->DB = DB::init();

        $this->user = $user;
    }

    //вывод by id
    private function m_1($array)
    {

    }

    //вывод всех by user_id
    private function m_2($array)
    {
        if(!$this->user){
            throw new \Exception("Access denied");}

//        if(!)

        $this->DB->where("user_id", $this->user['id'])->orderBy("id", "DESC");
        $resDb = $this->DB->get("clients");

        return $resDb;
    }

}