<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'product_name' => 'PAPAYA',
                'product_price' => '12000',
                'product_img' => 'smp-img-02.jpg',
                'product_description' => 'Papaya is a delicious tropical fruit native to northern Mexico, it is also known as the "sun orange".',
                'product_feature' => '1',
                'product_sale_amount' => '2',
                'stock' => '30',
                'sale_amount' => '12',
                'expire_date' => '2022-04-30',
                'discound_id' => '1',
                'manufacture_id' => '1',
                'type_id' => '1',
                'review_id' => '1'
            ],
            [
                'product_name' => 'SOLID FRUITS',
                'product_price' => '15000',
                'product_image' => 'trairan.jpg',
                'product_description' => 'The snake fruit is an exotic tropical plant belonging to the Palm family. The homeland of the Snake fruit is Southeast Asia.',
                'product_feature' => '1',
                'product_sale_amount' => '5',
                'stock' => '̀50',
                'sale_amount' => '17',
                'expire_date' => '2022-04-29',
                'discound_id' => '1',
                'manufacture_id' => '2',
                'type_id' => '2',
                'review_id' => '2'
            ],
            [
                'product_name' => 'MANGO',
                'product_price' => '20000',
                'product_image' => 'xoai.jpg',
                'product_description' => 'Mango is a tropical evergreen tree that grows up to 20 meters tall. The fruit is oval and yellow in color. The pulp of the fruit is dense and juicy, with a sweet taste',
                'product_feature' => '1',
                'product_sale_amount' => '3',
                'stock' => '20',
                'sale_amount' => '19',
                'expire_date' => '2022-04-24',
                'discound_id' => '2',
                'manufacture_id' => '2',
                'type_id' => '3',
                'review_id' => '3'
            ],
            [
                'product_name' => 'ORANGE',
                'product_price' => '9000',
                'product_image' => 'instagram-img-06.jpg',
                'product_description' => 'Orange (lat.Citrus sinensis) is a fruit tree of the genus Citrus of the Rute family, one of the most common citrus trees in the tropics and subtropics.',
                'product_feature' => '1',
                'product_sale_amount' => '6',
                'stock' => '80',
                'sale_amount' => '42',
                'expire_date' => '2022-04-22',
                'discound_id' => '4',
                'manufacture_id' => '2',
                'type_id' => '1',
                'review_id' => '1'
            ],
            [
                'product_name' => 'DILL',
                'product_price' => '5000',
                'product_image' => 'gallery-img-11.jpg',
                'product_description' => 'It is a perennial herb that belongs to the celery family. Stems are straight, slender, with white flowers. The tree can reach 3 meters in height.',
                'product_feature' => '1',
                'product_sale_amount' => '4',
                'stock' => '40',
                'sale_amount' => '22',
                'expire_date' => '2022-04-22',
                'discound_id' => '5',
                'manufacture_id' => '3',
                'type_id' => '2',
                'review_id' => '2'
            ],
            [
                'product_name' => 'CARROT',
                'product_price' => '10000',
                'product_image' => 'blog-img-01.jpg',
                'product_description' => 'Eating carrots contains vitamin A, vitamin C, carotenoids, potassium and antioxidants, not only good for eyes, but also gives you healthy skin,',
                'product_feature' => '1',
                'product_sale_amount' => '5',
                'stock' => '30',
                'sale_amount' => '32',
                'expire_date' => '2022-04-20',
                'discound_id' => '4',
                'manufacture_id' => '2',
                'type_id' => '1',
                'review_id' => '1'
            ],
            [
                'product_name' => 'GREEN BEAN',
                'product_price' => '20000',
                'product_image' => 'gallery-img-08.jpg',
                'product_description' => 'The bright green cylindrical seeds are 4 to 6 mm long, 3.5 to 4.5 mm in diameter. The seed umbilicus running along the length of the seed is bright white.',
                'product_feature' => '1',
                'product_sale_amount' => '3',
                'stock' => '100',
                'sale_amount' => '82',
                'expire_date' => '2022-04-26',
                'discound_id' => '6',
                'manufacture_id' => '2',
                'type_id' => '2',
                'review_id' => '1'
            ],
        ]);
    }
}
