<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProducTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_type')->insert([
            [
            'type_name' => 'Vegetable',
            'type_img' => 'categories_img_01.jpg'
            ],
            [
                'type_name' => 'Fruit',
                'type_img' => 'categories_img_02.jpg'
            ],
            [
                'type_name' => 'Juice',
                'type_img' => 'categories_img_04.jpg'
            ]
        ]);
    }
}