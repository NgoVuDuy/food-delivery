<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::insert([
            [
                'name' => 'Pizza Thịt Heo Xông Khói',
                'price' => 129000,
                'description' => 'Thịt heo xông khói nhập khẩu mang hương vị tuyệt vời',
                'image' => 'images/products/pizzas/pizza-thit-xong-khoi.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Rau Củ',
                'price' => 89123,
                'description' => 'Pizza rau củ tươi mới, có thể dùng chay',
                'image' => 'images/products/pizzas/pizza-rau-cu.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Phô Mai',
                'price' => 159000,
                'description' => 'Pizza phô mai tươi nhập khẩu từ Pháp',
                'image' => 'images/products/pizzas/pizza-pho-mai.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Xúc Xích',
                'price' => 99000,
                'description' => 'Pizza xúc xích nhập khẩu từ Đức',
                'image' => 'images/products/pizzas/pizza-xuc-xich.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Tôm',
                'price' => 119000,
                'description' => 'Pizza tôm tươi được chế biến trong ngày',
                'image' => 'images/products/pizzas/pizza-tom.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Thịt Cừu',
                'price' => 189000,
                'description' => 'Pizza thịt cừu mang hương vị đặc trưng',
                'image' => 'images/products/pizzas/pizza-thit-cuu.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Xúc Xích Phô Mai Tươi',
                'price' => 189000,
                'description' => 'Pizza xúc xích phô mai dễ ăn, phù hợp cho nhiều lứa tuổi',
                'image' => 'images/products/pizzas/pizza-xuc-xich-pho-mai-tuoi.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            //mix
            [
                'name' => 'Pizza Phô Mai Xúc Xích',
                'price' => 139000,
                'description' => '',
                'image' => 'images/products/pizzas/mix/pizza-pho-mai-xuc-xich.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Rau Củ Phô Mai',
                'price' => 189000,
                'description' => '',
                'image' => 'images/products/pizzas/mix/pizza-rau-cu-pho-mai.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Rau Củ Tôm',
                'price' => 189000,
                'description' => '',
                'image' => 'images/products/pizzas/mix/pizza-rau-cu-tom.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Rau Củ Xúc Xích',
                'price' => 189000,
                'description' => '',
                'image' => 'images/products/pizzas/mix/pizza-rau-cu-xuc-xich.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Tôm Phô Mai',
                'price' => 189000,
                'description' => '',
                'image' => 'images/products/pizzas/mix/pizza-tom-pho-mai.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Tôm Xúc Xích',
                'price' => 189000,
                'description' => '',
                'image' => 'images/products/pizzas/mix/pizza-tom-xuc-xich.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
