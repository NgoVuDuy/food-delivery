<?php

namespace Database\Seeders;

use App\Models\ProductOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProductOption::insert([
            [
                'product_id' => 1,
                'option_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 1,
                'option_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 1,
                'option_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 1,
                'option_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 1,
                'option_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 1,
                'option_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 1,
                'option_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 1,
                'option_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
