<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 16.03.2018
 * Time: 12:18
 */

namespace classes\getters;

use classes\helpers\DB;
use classes\helpers\TextSecurity;
use classes\User;

class ClientGet
{
    use MainGet;

    public $user;

    public function __construct($user = null)
    {
        $this->DB = DB::init();

        $this->user = $user;
    }


    /**
     * вывод by полной инфо by public_key + email & pass
     * @param $array - [~public_key, email, pass]
     * @return array
     * @throws \Exception
     */
    private function m_1($array)
    {
        $user = (new User())->check_user_by_login($array);
        if(!$user['id']){
            throw new \Exception("Access denied (1)");}

        if($array['public_key'])
        {
            $this->DB->where("public_key", TextSecurity::shield_hard($array['public_key']));
        }
        $this->DB->where("user_id", $user['id']);

        return $this->DB->get("clients");
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