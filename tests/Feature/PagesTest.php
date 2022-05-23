<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMainPage()
    {
        $response = $this->get(route("index"));

        $response->assertStatus(200);
    }

    public function testOneNews()
    {
        $response = $this->get(route("onenews", 1));

        $response->assertStatus(200);
    }

    public function testOneCatNews()
    {
        $response = $this->get(route("newslistbycat", 1));

        $response->assertStatus(200);
    }

    public function testFeedbackPage()
    {
        $response = $this->get(route("feedback"));

        $response->assertStatus(200);
    }

    public function testOrderPage()
    {
        $response = $this->get(route("order"));

        $response->assertStatus(200);
    }

    public function testNewOrder()
    {
        $faker = Factory::create();
        $data = [
            "name" => $faker->name(),
            "phone" => $faker->phoneNumber(),
            "email" => $faker->email(),
            "order_info" => $faker->sentence(10)
        ];
        $response = $this->post(route("storeorder"), $data);
        $response->assertJson(["status" => true]);
    }

    public function testFeedback()
    {
        $faker = Factory::create();
        $data = [
            "name" => $faker->name(),
            "message" => $faker->sentence(10)
        ];
        $response = $this->post(route("sendfeedback"), $data);
        $response->assertJson(["status" => true]);
    }
}
