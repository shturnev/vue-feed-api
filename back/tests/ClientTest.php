<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 21.03.2018
 * Time: 12:54
 */

namespace tests;
require "../../settings.php";
use classes\Client;
use PHPUnit\Framework\TestCase;
use Faker\Factory;

class ClientTest extends TestCase
{

    public function test_create()
    {
        $faker = Factory::create();
        $res = (new Client())->create([
            "token" => "49f8cb80ba6b24a56cf4693c50e0203a",
            "title" => $faker->words(3, true),
        ]);

        $this->assertTrue(is_array($res));
    }
    public function test_delete()
    {

        $res = (new Client())->delete([
            "token" => "49f8cb80ba6b24a56cf4693c50e0203a",
            "id" => 11,
        ]);

        $this->assertTrue($res);
    }
}
