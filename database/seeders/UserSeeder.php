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
            'user_name' => 'nguyenvana',
            'user_password' => '123421',
            'email' => 'nguyenvana@gmail.com',
            'role' => '1'
            ],
            [
                'user_name' => 'nguyenvanb',
                'user_password' => '123422',
                'email' => 'nguyenvanb@gmail.com',
                'role' => '2'
            ],
            [
                'user_name' => 'nguyenvanc',
                'user_password' => '123424',
                'email' => 'nguyenvanc@gmail.com',
                'role' => '2'
                ],
                [
                    'user_name' => 'nguyenvand',
                    'user_password' => '123428',
                    'email' => 'nguyenvand@gmail.com',
                    'role' => '2'
                    ]
        ]);
    }
}
