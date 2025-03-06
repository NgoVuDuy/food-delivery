<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Option::insert([

            // Kích cỡ
            [
                'name' => 'Nhỏ (20 cm)',
                'price_modifier' => '0',
                'option_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Vừa (25 cm)',
                'price_modifier' => '79.000',
                'option_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Lớn (30 cm)',
                'price_modifier' => '158.000',
                'option_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Đế bánh

            [
                'name' => 'Mỏng',
                'price_modifier' => '0',
                'option_categories_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Vừa',
                'price_modifier' => '0',
                'option_categories_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Dày',
                'price_modifier' => '0',
                'option_categories_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Viền bánh

            [
                'name' => 'Viền Không Nhân',
                'price_modifier' => '0',
                'option_categories_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Viền Phô Mai',
                'price_modifier' => '39.000',
                'option_categories_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Viền Xúc Xích',
                'price_modifier' => '39.000',
                'option_categories_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
