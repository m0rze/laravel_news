<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("news")->insert($this->getData(50));
    }

    private function getData($count = 10)
    {
        $faker = Factory::create();
        $data = [];
        for($i = 0;$i<=$count;$i++){
            $data[] = [
                "category_id" => $faker->numberBetween(1, 10),
                "source_id" => $faker->numberBetween(1,20),
                "title" => $faker->sentence(),
                "body" => $faker->text(500),
                "description" => $faker->text(),
                "image" => $faker->imageUrl(200, 200),
                "created_at" => date('Y-m-d H:i:s',time()),
                "updated_at" => date('Y-m-d H:i:s',time())
            ];
        }
        return $data;
    }
}
