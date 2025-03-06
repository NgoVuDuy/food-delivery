<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProductCategory::insert([

            [
                'name' => 'Pizza',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gà Rán',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hamburger',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Khoai Tây Chiên',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hot dog',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Salad',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Nước Uống',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // [
            //     'name' => 'Pizza Thịt',
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ],
            // [
            //     'name' => 'Pizza Rau Củ',
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ],
            // [
            //     'name' => 'Pizza Hải Sản',
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ],
            // [
            //     'name' => 'Pizza Phô Mai',
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ]
        ]

    
    
    );
    }
}
