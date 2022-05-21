<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'nguyenvana',
            'email' => 'nguyenvana@gmail.com',
            'password' =>'123421',
            'role_id' => '1'
            ],
            [
                'name' => 'nguyenvanb',
                'email' => 'nguyenvanb@gmail.com',
                'password' => '123422',
                'role_id' => '2'
            ],
            [
                'name' => 'nguyenvanc',
                'email' => 'nguyenvanc@gmail.com',
                'password' => '123424',
                'role_id' => '2'
                ],
                [
                    'name' => 'nguyenvand',
                    'email' => 'nguyenvand@gmail.com',
                    'password' => '123428',
                    'role_id' => '2'
                    ]
        ]);
    }
}
