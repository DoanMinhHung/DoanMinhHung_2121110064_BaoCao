<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Product::insert([
                'category_id' => 01,
                'brand_id' =>  28,
                'name' =>  'product ' . $i,
                'slug' => 'hưng',
                'price' => 100,
                'price_sale' => 800,
                'image' => 'hinhanh.jpg',
                'qty' => 10,
                'detail' => 'shf',
                'metakey' => 'acaca',
                'metadesc' => 'acac',
                'created_by' => 1,
                'updated_by' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
