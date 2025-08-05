<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RawMaterial>
 */
class RawMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'unit' => fake()->randomElement(['Kg', 'Liter', 'Pcs', 'Meter']),
            'stock_current' => fake()->randomFloat(2, 0, 1000),
            'stock_minimum' => fake()->randomFloat(2, 10, 100),
            'price_per_unit' => fake()->numberBetween(1000, 100000),
            'supplier_id' => fake()->boolean(80) ? Supplier::factory() : null,
        ];
    }
}