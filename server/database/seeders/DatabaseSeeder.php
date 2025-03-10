<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Option;
use App\Models\OptionCategory;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductOption;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // ProductCategory::factory(10)->create();
        // Product::factory(10)->create();
        $this->call([

            ProductCategorySeeder::class,
            ProductSeeder::class,
            OptionCategorySeeder::class,
            OptionSeeder::class,
            ProductOptionSeeder::class,
            CartSeeder::class,
        ]);

        // OptionCategory::factory(10)->create();
        // Option::factory(10)->create();

        // ProductOption::factory(10)->create();
        // Cart::factory(10)->create();
        
        // Order::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
