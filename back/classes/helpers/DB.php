<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 07.03.2018
 * Time: 23:36
 */

namespace classes\helpers;

use MysqliDb; //https://packagist.org/packages/joshcam/mysqli-database-class

class DB
{
    public static function init()
    {
        return new MysqliDb ('127.0.0.1', 'root', null, 'xxx');
    }

}