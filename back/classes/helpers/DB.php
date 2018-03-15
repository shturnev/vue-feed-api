<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 15.03.2018
 * Time: 9:00
 */

namespace classes\helpers;

use MysqliDb;
class DB
{

    public static function init()
    {
        return new MysqliDb("127.0.0.1", "root", null, "vue-api");
    }
}