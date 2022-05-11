<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount')->insert([
            [
                'discount_amount' => '',
            ],
            [
                'discount_amount' => '10%',
            ],
            [
                'discount_amount' => '20%',
            ],
            [
                'discount_amount' => '30%',
            ],
            [
                'discount_amount' => '40%',
            ],
            [
                'discount_amount' => '50%',
            ],
            [
                'discount_amount' => '60%',
            ],
            [
                'discount_amount' => '70%',
            ],
        ]);
    }
}
