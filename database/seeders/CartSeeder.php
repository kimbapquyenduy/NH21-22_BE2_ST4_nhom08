<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart')->insert([
            [
                'user_id' => '2',
                'product_name' => 'GREEN BEAN',
                'product_price' => '20000',
                'product_image' => 'gallery-img-08.jpg',
                'descripstion' => 'The bright green cylindrical seeds are 4 to 6 mm long, 3.5 to 4.5 mm in diameter. The seed umbilicus running along the length of the seed is bright white.',
                'product_amount' => '1',
            ],
            [
                'user_id' => '3',
                'product_name' => 'CARROT',
                'product_price' => '10000',
                'product_image' => 'blog-img-01.jpg',
                'descripstion' => 'Eating carrots contains vitamin A, vitamin C, carotenoids, potassium and antioxidants, not only good for eyes, but also gives you healthy skin,',
                'product_amount' => '2',
            ],
            [
                'user_id' => '2',
                'product_name' => 'DILL',
                'product_price' => '5000',
                'product_image' => 'gallery-img-11.jpg',
                'descripstion' => 'It is a perennial herb that belongs to the celery family. Stems are straight, slender, with white flowers. The tree can reach 3 meters in height.',
                'product_amount' => '3',
            ],
            [
                'user_id' => '3',
                'product_name' => 'ORANGE',
                'product_price' => '9000',
                'product_image' => 'instagram-img-06.jpg',
                'descripstion' => 'Orange (lat.Citrus sinensis) is a fruit tree of the genus Citrus of the Rute family, one of the most common citrus trees in the tropics and subtropics.',
                'product_amount' => '4',
            ]
        ]);
    }
}
