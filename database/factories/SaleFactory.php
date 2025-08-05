<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subtotal = fake()->numberBetween(50000, 1000000);
        $discount = fake()->numberBetween(0, $subtotal * 0.1);
        $total = $subtotal - $discount;
        $paymentReceived = $total + fake()->numberBetween(0, 50000);
        $changeAmount = $paymentReceived - $total;

        return [
            'invoice_number' => 'INV-' . fake()->unique()->numerify('########'),
            'customer_id' => fake()->boolean(70) ? Customer::factory() : null,
            'sale_type' => fake()->randomElement(['retail', 'grosir']),
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
            'payment_received' => $paymentReceived,
            'change_amount' => $changeAmount,
            'payment_method' => fake()->randomElement(['cash', 'transfer', 'credit']),
            'user_id' => User::factory(),
        ];
    }
}