<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'PT Dulux Indonesia',
                'phone' => '021-12345678',
                'email' => 'sales@dulux.co.id',
                'address' => 'Jakarta Pusat, DKI Jakarta',
            ],
            [
                'name' => 'CV Nippon Paint',
                'phone' => '021-87654321',
                'email' => 'info@nipponpaint.co.id',
                'address' => 'Tangerang, Banten',
            ],
            [
                'name' => 'Toko Bahan Kimia Sejahtera',
                'phone' => '021-11223344',
                'email' => 'bahan@sejahtera.com',
                'address' => 'Bekasi, Jawa Barat',
            ],
            [
                'name' => 'PT Avian Brands',
                'phone' => '021-99887766',
                'email' => 'distributor@avian.co.id',
                'address' => 'Surabaya, Jawa Timur',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}