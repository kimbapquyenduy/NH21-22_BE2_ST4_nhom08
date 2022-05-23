<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\Manufacture;
use App\Models\Product_type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ManufactureSeeder::class,
            ProductSeeder::class,
            ProducTypeSeeder::class,
            ReviewSeeder::class,
            WishlistSeeder::class,
            LaratrustSeeder::class

        ]);
    }
}
