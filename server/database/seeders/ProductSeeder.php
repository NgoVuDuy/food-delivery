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
                'description' => 'Sự kết hợp giữa vị tôm và xúc xích',
                'image' => 'images/products/pizzas/mix/pizza-pho-mai-xuc-xich.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Rau Củ Phô Mai',
                'price' => 189000,
                'description' => 'Sự kết hợp giữa rau củ và phô mai',
                'image' => 'images/products/pizzas/mix/pizza-rau-cu-pho-mai.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Rau Củ Tôm',
                'price' => 189000,
                'description' => 'Sự kết hợp giữa rau củ và tôm',
                'image' => 'images/products/pizzas/mix/pizza-rau-cu-tom.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Rau Củ Xúc Xích',
                'price' => 189000,
                'description' => 'Sự kết hợp giữa rau củ và xúc xích',
                'image' => 'images/products/pizzas/mix/pizza-rau-cu-xuc-xich.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Tôm Phô Mai',
                'price' => 189000,
                'description' => 'Sự kết hợp giữa tôm và phô mai',
                'image' => 'images/products/pizzas/mix/pizza-tom-pho-mai.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pizza Tôm Xúc Xích',
                'price' => 189000,
                'description' => 'Sự kết hợp giữa tôm và xúc xích',
                'image' => 'images/products/pizzas/mix/pizza-tom-xuc-xich.jpg',
                'product_categories_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
            // chicken
            ,
            [
                'name' => 'Gà Chiên Bơ Tỏi',
                'price' => 99000,
                'description' => 'Gà chiên bở tỏi thơm ngon đậm vị',
                'image' => 'images/products/chickens/ga-chien-bo-toi.jpg',
                'product_categories_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gà Chiên Giòn',
                'price' => 69000,
                'description' => 'Gà chiên giòn giòn tan trong từng miếng cắn',
                'image' => 'images/products/chickens/ga-chien-gion.jpg',
                'product_categories_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gà Chiên Nước Mắm',
                'price' => 59000,
                'description' => 'Gà chiên nước mắm đậm vị thơm ngon',
                'image' => 'images/products/chickens/ga-chien-nuoc-mam.jpg',
                'product_categories_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gà Chiên Xù',
                'price' => 49000,
                'description' => 'Gà chiên xù với hương vị tươi mới',
                'image' => 'images/products/chickens/ga-chien-xu.jpg',
                'product_categories_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
            // Khoai tây chiên
            ,
            [
                'name' => 'Khoai Tây Chiên',
                'price' => 49000,
                'description' => 'Khoai tây chiên giòn thơm',
                'image' => 'images/products/frenchfries/khoai-tay-chien.jpg',
                'product_categories_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]
            //hamburger
            ,
            [
                'name' => 'Hamburger Thịt Bò 2 Lớp',
                'price' => 179000,
                'description' => 'Hamburger thịt bò thơm ngon đậm vị',
                'image' => 'images/products/hamburgers/thit-bo-2-lop.jpg',
                'product_categories_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hamburger Thịt Bò',
                'price' => 109000,
                'description' => 'Hamburger thịt bò thơm ngon đậm vị',
                'image' => 'images/products/hamburgers/thit-bo.jpg',
                'product_categories_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hamburger Thịt Cừu',
                'price' => 159000,
                'description' => 'Hamburger thịt cừu thơm ngon đậm vị',
                'image' => 'images/products/hamburgers/thit-cuu.jpg',
                'product_categories_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]

            // hotdog
            ,
            [
                'name' => 'Hotdog Bò Mỹ Phô Mai',
                'price' => 149000,
                'description' => 'Hotdog bò mỹ phô mai thơm ngon đậm vị',
                'image' => 'images/products/hotdogs/hot-dog-bo-my-pho-mai.jpg',
                'product_categories_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hogdog Xúc Xích',
                'price' => 129000,
                'description' => 'Hamburger thịt cừu thơm ngon đậm vị',
                'image' => 'images/products/hotdogs/hot-dog-xuc-xich.jpg',
                'product_categories_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
            //drinks
            ,
            [
                'name' => 'Pepsi Không Đường',
                'price' => 12000,
                'description' => '',
                'image' => 'images/products/drinks/pepsi-khong-duong.jpg',
                'product_categories_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pepsi',
                'price' => 12000,
                'description' => '',
                'image' => 'images/products/drinks/pepsi.jpg',
                'product_categories_id' =>7,
                'created_at' => now(),
                'updated_at' => now()
            ]
            //salad
            ,
            [
                'name' => 'Salad Ức Gà',
                'price' => 99000,
                'description' => 'Salad ức gà phù hợp cho người giảm cân',
                'image' => 'images/products/salads/salad-uc-ga.jpg',
                'product_categories_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
