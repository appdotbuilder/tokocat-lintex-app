<?php

namespace Database\Factories;

use App\Models\RawMaterial;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RawMaterialTransaction>
 */
class RawMaterialTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = fake()->randomFloat(2, 1, 100);
        $pricePerUnit = fake()->numberBetween(1000, 50000);
        $totalCost = $quantity * $pricePerUnit;

        return [
            'raw_material_id' => RawMaterial::factory(),
            'type' => fake()->randomElement(['in', 'out']),
            'quantity' => $quantity,
            'price_per_unit' => $pricePerUnit,
            'total_cost' => $totalCost,
            'notes' => fake()->sentence(),
            'user_id' => User::factory(),
        ];
    }
}