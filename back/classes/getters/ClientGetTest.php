<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 16.03.2018
 * Time: 14:28
 */

namespace tests;

use classes\getters\ClientGet;
use PHPUnit\Framework\TestCase;

class ClientGetTest extends TestCase
{

    public function test_m1()
    {
        $arr = [
            "m" => 1,
            "email" => "sht_job@ukr.net",
            "pass" => 1213,
//            "public_key" => "e5326bfe72b1dcd4a6a3ff6068c95ae73a141bb6dd08cbe95604e31584ec0489"
        ];

        $res = (new ClientGet())->get($arr);

        $this->assertTrue(is_array($res));
    }

}
