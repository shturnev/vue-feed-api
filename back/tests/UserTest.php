<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 14.03.2018
 * Time: 21:12
 */

namespace tests;

use classes\User;
use Nette\Http\UrlScript;
use PHPUnit\Framework\TestCase;


class UserTest extends TestCase
{

    public function test_login()
    {

        $P = new UrlScript();
        $tt =  $P->getBaseUrl();


        $res = (new User())->login(["email" => "sht_job@ukr.net", "pass" => 123]);

        $this->assertTrue(is_array($res) || is_bool($res));
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
