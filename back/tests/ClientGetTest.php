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
    public function test_m_2()
    {
        $arr = [
            "m" => 2,
            "email" => "sht_job@ukr.net",
            "pass" => 123,
//            "public_key" => "6215b5e6aa8518fbc9d3842b22522492bdc526422f848eba6d532e1562eb6df9"
        ];

        $res = (new ClientGet())->get($arr);
        $this->assertTrue(is_array($res) || is_bool($res));
    }
}
