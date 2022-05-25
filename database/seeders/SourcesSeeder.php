<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sources")->insert($this->getData(20));
    }

    private function getData($count = 10)
    {
        $faker = Factory::create();
        $data = [];
        for($i = 0;$i<=$count;$i++){
            $data[] = [
                "source_url" => $faker->url(),
                "created_at" => date('Y-m-d H:i:s',time()),
                "updated_at" => date('Y-m-d H:i:s',time())
            ];
        }
        return $data;
    }
}
