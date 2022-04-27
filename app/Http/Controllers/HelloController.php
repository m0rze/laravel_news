<?php

namespace App\Http\Controllers;

use Faker\Factory;

class HelloController extends Controller
{
    public function sayHello()
    {
        $faker = Factory::create();
        return view("hello", [
            "text" => $faker->realText(500)
        ]);
    }
}
