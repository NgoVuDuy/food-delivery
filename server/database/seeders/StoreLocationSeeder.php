<?php

namespace Database\Seeders;

use App\Models\StoreLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        StoreLocation::insert([
            [
                'name' => 'Chi nhánh Nguyễn Văn Linh',
                'open' => '9AM - 10PM',
                'address' => '334 Nguyễn Văn Linh, An Khánh, Ninh Kiều, Cần Thơ',
                'latitude' => 10.03202,
                'longitude' => 105.75005,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'name' => 'Chi nhánh Nguyễn Văn Cừ',
                'open' => '9AM - 10PM',
                'address' => '132 Đường Nguyễn Văn Cừ, Ninh Kiều, Cần Thơ',
                'latitude' => 10.03979,
                'longitude' => 105.76169,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'name' => 'Chi nhánh Trần Hoàng Na',
                'open' => '9AM - 10PM',
                'address' => '34 Trần Hoàng Na, Phường An Khánh, Ninh Kiều, Cần Thơ',
                'latitude' => 10.02501,
                'longitude' => 105.74947,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'name' => 'Chi nhánh 3 tháng 2',
                'open' => '9AM - 10PM',
                'address' => '146A 3 Tháng 2, Xuân Khánh, Ninh Kiều, Cần Thơ',
                'latitude' => 10.02732,
                'longitude' => 105.77019,
                'created_at' => now(),
                'updated_at' => now()

            ],
        ]);
    }
}
