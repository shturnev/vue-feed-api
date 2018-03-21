<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 21.03.2018
 * Time: 17:16
 */

namespace tests;
require "../../settings.php";
use classes\getters\ClientGet;
use PHPUnit\Framework\TestCase;

class ClientGetTest extends TestCase
{

    public function test_m_1()
    {
        $arr = [
            "m" => 1,
            "token" => "49f8cb80ba6b24a56cf4693c50e0203a"
        ];

        $res = (new ClientGet())->get($arr);
        $this->assertTrue(is_array($res) || is_bool($res));

    }
}
