<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin Toko Cat',
            'email' => 'admin@tokocat.com',
            'role' => 'admin',
        ]);

        // Create kasir user
        User::factory()->create([
            'name' => 'Kasir Toko Cat',
            'email' => 'kasir@tokocat.com',
            'role' => 'kasir',
        ]);

        // Create gudang user
        User::factory()->create([
            'name' => 'Staff Gudang',
            'email' => 'gudang@tokocat.com',
            'role' => 'gudang',
        ]);

        // Seed master data
        $this->call([
            CategorySeeder::class,
            SupplierSeeder::class,
            CustomerSeeder::class,
            RawMaterialSeeder::class,
            ProductSeeder::class,
            SampleSalesSeeder::class,
        ]);
    }
}
