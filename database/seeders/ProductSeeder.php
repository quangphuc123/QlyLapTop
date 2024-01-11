<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('products')->insert([
                'product_catalogue_id' => mt_rand(1, 7),
                'name' => 'Laptop' . Str::random(8),
                'price' => mt_rand(1000000, 99999999),
                'image' => '/userfiles/image/LapTopGaming/asus-tuf-gaming-f17-fx706hf-i5-hx390w-glr-1.jpg',
                'album' => '',
                'sale_price' => mt_rand(999999, 5999999),
                'description' => 'null',
                'brand_id' => mt_rand(1, 7),
                'product_code' => mt_rand(100000000, 999999999)
            ]);
        }
    }
}
