<?php

namespace Database\Factories;

use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReturnItem>
 */
class ReturnItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = fake()->numberBetween(1, 5);
        $refundAmount = fake()->numberBetween(10000, 200000);

        return [
            'sale_id' => Sale::factory(),
            'product_id' => Product::factory(),
            'quantity' => $quantity,
            'reason' => fake()->randomElement([
                'Produk rusak/cacat',
                'Warna tidak sesuai',
                'Ukuran salah',
                'Tidak sesuai pesanan',
                'Kualitas tidak memuaskan'
            ]),
            'refund_amount' => $refundAmount,
            'user_id' => User::factory(),
        ];
    }
}