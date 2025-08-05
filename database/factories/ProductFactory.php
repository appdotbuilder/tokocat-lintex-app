<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $priceRetail = fake()->numberBetween(50000, 500000);
        $priceWholesale = $priceRetail * 0.85; // 15% discount for wholesale

        return [
            'name' => fake()->words(2, true),
            'color' => fake()->randomElement(['Putih', 'Cream', 'Biru', 'Hijau', 'Merah', 'Kuning', 'Hitam', 'Abu-abu']),
            'size_kg' => fake()->randomElement([0.5, 1.0, 2.5, 5.0, 10.0, 20.0]),
            'price_retail' => $priceRetail,
            'price_wholesale' => $priceWholesale,
            'stock_current' => fake()->numberBetween(0, 100),
            'stock_minimum' => fake()->numberBetween(5, 20),
            'category_id' => Category::factory(),
        ];
    }
}