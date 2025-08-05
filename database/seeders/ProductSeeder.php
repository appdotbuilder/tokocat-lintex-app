<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        
        $products = [
            // Cat Tembok
            [
                'name' => 'Dulux EasyClean',
                'color' => 'Putih',
                'size_kg' => 5.0,
                'price_retail' => 180000,
                'price_wholesale' => 160000,
                'stock_current' => 25,
                'stock_minimum' => 10,
                'category_id' => $categories->where('name', 'Cat Tembok')->first()->id,
            ],
            [
                'name' => 'Dulux EasyClean',
                'color' => 'Cream',
                'size_kg' => 5.0,
                'price_retail' => 185000,
                'price_wholesale' => 165000,
                'stock_current' => 8, // Low stock
                'stock_minimum' => 10,
                'category_id' => $categories->where('name', 'Cat Tembok')->first()->id,
            ],
            [
                'name' => 'Nippon Pylox',
                'color' => 'Biru',
                'size_kg' => 2.5,
                'price_retail' => 95000,
                'price_wholesale' => 85000,
                'stock_current' => 40,
                'stock_minimum' => 15,
                'category_id' => $categories->where('name', 'Cat Tembok')->first()->id,
            ],
            
            // Cat Kayu
            [
                'name' => 'Avian Wood Stain',
                'color' => 'Natural',
                'size_kg' => 1.0,
                'price_retail' => 75000,
                'price_wholesale' => 65000,
                'stock_current' => 5, // Low stock
                'stock_minimum' => 8,
                'category_id' => $categories->where('name', 'Cat Kayu')->first()->id,
            ],
            [
                'name' => 'Dulux Weathershield',
                'color' => 'Coklat Tua',
                'size_kg' => 2.5,
                'price_retail' => 145000,
                'price_wholesale' => 125000,
                'stock_current' => 20,
                'stock_minimum' => 10,
                'category_id' => $categories->where('name', 'Cat Kayu')->first()->id,
            ],
            
            // Cat Besi
            [
                'name' => 'Nippon Anti Karat',
                'color' => 'Merah',
                'size_kg' => 1.0,
                'price_retail' => 85000,
                'price_wholesale' => 75000,
                'stock_current' => 30,
                'stock_minimum' => 12,
                'category_id' => $categories->where('name', 'Cat Besi')->first()->id,
            ],
            [
                'name' => 'Avian Iron Paint',
                'color' => 'Hitam',
                'size_kg' => 2.5,
                'price_retail' => 195000,
                'price_wholesale' => 175000,
                'stock_current' => 15,
                'stock_minimum' => 8,
                'category_id' => $categories->where('name', 'Cat Besi')->first()->id,
            ],
            
            // Cat Lantai
            [
                'name' => 'Dulux Floor Paint',
                'color' => 'Abu-abu',
                'size_kg' => 4.0,
                'price_retail' => 225000,
                'price_wholesale' => 200000,
                'stock_current' => 3, // Low stock
                'stock_minimum' => 5,
                'category_id' => $categories->where('name', 'Cat Lantai')->first()->id,
            ],
            
            // Primer
            [
                'name' => 'Nippon Primer Sealer',
                'color' => 'Putih',
                'size_kg' => 5.0,
                'price_retail' => 120000,
                'price_wholesale' => 105000,
                'stock_current' => 18,
                'stock_minimum' => 10,
                'category_id' => $categories->where('name', 'Primer')->first()->id,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}