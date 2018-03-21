<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 21.03.2018
 * Time: 17:10
 */

namespace classes\getters;


use classes\helpers\DB;
use classes\User;

class ClientGet
{
    use MainGet;

    public function __construct()
    {
        $this->DB = DB::init();
    }

    /**
     * Вывод всех, внутренний api
     * @param $array
     * @return array
     * @throws \Exception
     */
    private function m_1($array)
    {
        if(!$u = (new User())->isAuth($array['token'])){ return false; }

        $this->DB->where("user_id", $u['id']);
        return $this->DB->get("clients");
    }

}