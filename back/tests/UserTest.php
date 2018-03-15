<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 14.03.2018
 * Time: 21:12
 */

namespace tests;

use classes\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function test_login()
    {
        $token = "0cb9f74047c8bfa06fb458d8a49cda2b";
        $res = (new User())->login($token);

        $this->assertTrue(is_array($res));
    }

    public function test_delete()
    {
        $token = "xxxx";
        $res = (new User())->delete($token);

        $this->assertTrue($res);
    }



    //add
    //login
    //delete

}
