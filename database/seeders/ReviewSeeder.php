<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review')->insert([
            [
            'ratting' => '2',
            'user_id' => '2',
            'comment' => 'Very bad',
            'datetime' => '2022-04-15'
            ],
            [
                'ratting' => '1',
                'user_id' => '3',
                'comment' => 'Vegetables not fresh',
                'datetime' => '2022-04-15'
            ],
            [
                'ratting' => '2',
                'user_id' => '2',
                'comment' => 'Crushed fruit',
                'datetime' => '2022-04-15'
            ],
            [
                'ratting' => '1',
                'user_id' => '2',
                'comment' => 'moldy seeds',
                'datetime' => '2022-04-15'
            ]
        ]);
    }
}
