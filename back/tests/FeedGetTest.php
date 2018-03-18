<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 18.03.2018
 * Time: 15:45
 */

namespace tests;

use classes\getters\FeedGet;
use PHPUnit\Framework\TestCase;

class FeedGetTest extends TestCase
{
    public function test_m1()
    {
        $arr = [
            "m" => 1,
            "id" => 1,
            "public_key" => "bfdfd2f24526f3dbd7a6339297a640a54d00a2206ba26d818c9acce235280bd9",
            "private_key" => "c1d0920dc08e442e9fa8f8d4403bb917697f1b04597cee788c08fbe534bbac95",
        ];

        $res = (new FeedGet())->get($arr);

        $this->assertArrayHasKey("id", $res);
    }

    public function test_m2()
    {
        $arr = [
            "m" => 2,
//            "search" => "long text",
            "page" => 1,
            "limit" => 50,
            "public_key" => "bfdfd2f24526f3dbd7a6339297a640a54d00a2206ba26d818c9acce235280bd9",
            "private_key" => "c1d0920dc08e442e9fa8f8d4403bb917697f1b04597cee788c08fbe534bbac95",
        ];

        $res = (new FeedGet())->get($arr);

        $this->assertTrue(is_array($res));
    }
}
