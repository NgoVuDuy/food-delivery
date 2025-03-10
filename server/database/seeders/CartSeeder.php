<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cart::insert([
            [
                'product_id' => 1,
                'user_id' => 1,
                'quantity' => 2,
                'size' => '12 CM',
                'base' => 'Mỏng',
                'border' => 'Viền Không Nhân',
                'total' => 178000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'product_id' => 1,
                'user_id' => 1,
                'quantity' => 2,
                'size' => '12 CM',
                'base' => 'Mỏng',
                'border' => 'Viền Không Nhân',
                'total' => 178000,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
