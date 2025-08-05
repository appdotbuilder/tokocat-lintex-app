<?php

namespace Database\Seeders;

use App\Models\RawMaterial;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class RawMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = Supplier::all();
        
        $rawMaterials = [
            [
                'name' => 'Thinner A',
                'unit' => 'Liter',
                'stock_current' => 50.0,
                'stock_minimum' => 20.0,
                'price_per_unit' => 25000,
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Thinner B Premium',
                'unit' => 'Liter',
                'stock_current' => 15.0, // Low stock
                'stock_minimum' => 25.0,
                'price_per_unit' => 35000,
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Pigment Titanium Dioxide',
                'unit' => 'Kg',
                'stock_current' => 100.0,
                'stock_minimum' => 50.0,
                'price_per_unit' => 45000,
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Resin Acrylic',
                'unit' => 'Kg',
                'stock_current' => 30.0,
                'stock_minimum' => 40.0, // Low stock
                'price_per_unit' => 65000,
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Kuas Cat 2 inch',
                'unit' => 'Pcs',
                'stock_current' => 200.0,
                'stock_minimum' => 50.0,
                'price_per_unit' => 15000,
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Kuas Cat 4 inch',
                'unit' => 'Pcs',
                'stock_current' => 80.0,
                'stock_minimum' => 30.0,
                'price_per_unit' => 25000,
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Roller Cat Standard',
                'unit' => 'Pcs',
                'stock_current' => 25.0,
                'stock_minimum' => 40.0, // Low stock
                'price_per_unit' => 35000,
                'supplier_id' => $suppliers->random()->id,
            ],
        ];

        foreach ($rawMaterials as $material) {
            RawMaterial::create($material);
        }
    }
}