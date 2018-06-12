<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 26.03.2018
 * Time: 22:21
 */

namespace tests;
require "../../settings.php";
use classes\Feed;
use Faker\Factory;
use PHPUnit\Framework\TestCase;


class FeedTest extends TestCase
{
    public function test_add()
    {
        $faker = Factory::create();

        $res = (new Feed())->add([
            "private_key" => "969a5d7a003e6ecaab166fb31bf625febbc4e510048b1bdb92c0ecd50de98e12",
            "title" => $faker->text(60),
            "text" => $faker->realText(),
            "protected" => array_rand([true, false], 1)
        ]);

        $this->assertTrue(is_array($res));
    }
    public function test_edit()
    {
        $faker = Factory::create();

        $res = (new Feed())->edit([
            "private_key" => "969a5d7a003e6ecaab166fb31bf625febbc4e510048b1bdb92c0ecd50de98e12",
            "title" => $faker->text(60),
            "text" => $faker->realText(),
            "protected" => array_rand([true, false], 1),
            "id" => 4
        ]);

        $this->assertTrue(is_bool($res));
    }
    public function test_delete()
    {

        $res = (new Feed())->delete([
            "private_key" => "969a5d7a003e6ecaab166fb31bf625febbc4e510048b1bdb92c0ecd50de98e12",
            "id" => 2,
        ]);

        $this->assertTrue(is_bool($res));
    }
    public function test_up()
    {
        $res = (new Feed())->up([
            "private_key" => "969a5d7a003e6ecaab166fb31bf625febbc4e510048b1bdb92c0ecd50de98e12",
            "id" => 3,
        ]);

        $this->assertTrue(is_bool($res));
    }

}
