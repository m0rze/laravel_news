<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getCategories($count = 5)
    {
        $faker = Factory::create();
        $categories = [];
        for ($i = 0; $i < $count; $i++) {
            $categories[] = [
                "id" => $i + 1,
                "name" => $faker->sentence(rand(3, 5)),
                "description" => $faker->realText()
            ];
        }
        return $categories;
    }

    protected function getNews($categories = [], $count = 15)
    {
        if (empty($categories)){
            $categories = $this->getCategories();
        }
        $faker = Factory::create();
        $news = [];
        for ($i = 0; $i < $count; $i++) {
            srand((float)microtime() * 1000000);
            shuffle($categories);
            $news[] = [
                "id" => $i + 1,
                "catId" => $categories[0]["id"],
                "title" => $faker->sentence(rand(3, 5)),
                "body" => $faker->realText(rand(500, 900)),
                "description" => $faker->realText(rand(200, 300)),
                "image" => $faker->imageUrl(300, 300)
            ];
        }
        return $news;
    }
}
