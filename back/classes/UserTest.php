<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 20.03.2018
 * Time: 15:52
 */

namespace tests;
require_once "../../settings.php";

use classes\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test_login()
    {
        $res = (new User())->login([
            "email" => "user@test.com",
            "pass" => 123
        ]);

        $this->assertTrue(is_array($res) || is_bool($res));
    }
    public function test_confirm()
    {
        $res = (new User())->confirm("2153bf4355744d74f460b85195411828");

        $this->assertTrue(is_array($res) || is_null($res));
    }


}
