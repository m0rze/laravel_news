<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert($this->getData());
    }

    private function getData($count = 10)
    {
        $faker = Factory::create();
        $data = [];
        for($i = 0;$i<=$count;$i++){
            $title = $faker->sentence();
            $data[] = [
                "title" => $title,
                "description" => $faker->text(),
                "slug" => Str::slug($title),
                "created_at" => date('Y-m-d H:i:s',time()),
                "updated_at" => date('Y-m-d H:i:s',time())
            ];
        }
        return $data;
    }
}
