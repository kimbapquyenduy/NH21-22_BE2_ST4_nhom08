<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wishlist')->insert([
            [
                'user_id' => '2',
                'product_name' => 'PAPAYA',
                'product_price' => '12000',
                'product_img' => 'big-img-02.jpg',
                'product_stock' => '3'
            ],
            [
                'user_id' => '3',
                'product_name' => 'SOLID FRUITS',
                'product_price' => '15000',
                'product_img' => 'trairan.jpg',
                'product_stock' => '5'
            ],
            [
                'user_id' => '2',
                'product_name' => 'MANGO',
                'product_price' => '20000',
                'product_img' => 'xoai.jpg',
                'product_stock' => '6'
            ],
            [
                'user_id' => '3',
                'product_name' => 'DILL',
                'product_price' => '5000',
                'product_img' => 'gallery-img-11.jpg',
                'product_stock' => '8'
            ]
        ]);
    }
}