<?php

namespace Database\Seeders;

use App\Models\OptionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OptionCategory::insert([
            [
                'name' => 'Kích Cỡ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Đế Bánh',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Viền Bánh',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
