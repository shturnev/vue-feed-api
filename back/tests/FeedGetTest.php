<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 29.03.2018
 * Time: 16:32
 */

namespace tests;
require "../../settings.php";
use classes\getters\FeedGet;
use PHPUnit\Framework\TestCase;

class FeedGetTest extends TestCase
{
    public function test_m1()
    {
        $res = (new FeedGet())->get([
            "m"             => 1,
            "public_key"    => "bd18fd90e8db01359ca21f682499abd8c1f4845dc849bb7167e14ca9944e7a21",
            "private_key"   => "969a5d7a003e6ecaab166fb31bf625febbc4e510048b1bdb92c0ecd50de98e12",
            "id"            => 7
        ]);

        $this->assertTrue(is_array($res));
    }
    public function test_m2()
    {
        $res = (new FeedGet())->get([
            "m"             => 2,
            "public_key"    => "bd18fd90e8db01359ca21f682499abd8c1f4845dc849bb7167e14ca9944e7a21",
//            "private_key"   => "969a5d7a003e6ecaab166fb31bf625febbc4e510048b1bdb92c0ecd50de98e12",
            "limit"         => 2,
            "page"          => 1,
//            "search"        => "Drawling",
        ]);

        $this->assertTrue(is_array($res) || is_bool($res));
    }
}
