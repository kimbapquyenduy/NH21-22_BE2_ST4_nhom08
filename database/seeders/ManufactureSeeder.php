<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacture')->insert([
            [
                'manufacture_name' => 'Savifood – a professional food supplier',
            ],
            [
                'manufacture_name' => 'Trần Gia',
            ],
            [
                'manufacture_name' => 'Thuc Pham Xanh',
            ]
        ]);
    }
}
