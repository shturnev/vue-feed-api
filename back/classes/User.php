<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 14.03.2018
 * Time: 21:10
 */

namespace classes;


class User
{

    public function __construct()
    {

    }

    public function login(string $token)
    {
        $s = file_get_contents('http://ulogin.ru/token.php?token=' .$token .
            '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($s, true);

        $tt = 1;


    }
}