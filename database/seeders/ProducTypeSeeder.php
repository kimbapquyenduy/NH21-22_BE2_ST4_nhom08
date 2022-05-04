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
            ],
            [
                'type_name' => 'Fruit',
            ],
            [
                'product_name' => 'Juice',
            ]
        ]);
    }
}