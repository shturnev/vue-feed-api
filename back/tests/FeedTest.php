<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 18.03.2018
 * Time: 15:00
 */

namespace tests;

use classes\Feed;
use PHPUnit\Framework\TestCase;
use Faker;

class FeedTest extends TestCase
{

    public function testAdd()
    {
        $faker  = Faker\Factory::create();

        $arr = [
            "id" => 1,
            "private_key" => "c1d0920dc08e442e9fa8f8d4403bb917697f1b04597cee788c08fbe534bbac95",
            "protected" => 1,
            "title" => $faker->words(7, true),
            "text" => $faker->realText()
        ];

        $res = (new Feed())->add($arr);
        $this->assertTrue(is_array($res));
    }

    public function testEdit()
    {
        $faker  = Faker\Factory::create();

        $arr = [
            "id" => 1,
            "private_key" => "c1d0920dc08e442e9fa8f8d4403bb917697f1b04597cee788c08fbe534bbac95",
            "protected" => 1,
            "title" => $faker->words(7, true),
            "text" => $faker->realText()
        ];

        $res = (new Feed())->edit($arr);
        $this->assertTrue($res);
    }
    public function test_delete()
    {
        $arr = [
            "id" => 2,
            "private_key" => "c1d0920dc08e442e9fa8f8d4403bb917697f1b04597cee788c08fbe534bbac95"

        ];

        $res = (new Feed())->delete($arr);
        $this->assertTrue($res);
    }


}
