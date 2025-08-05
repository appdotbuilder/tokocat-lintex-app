<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'name' => 'Budi Santoso',
                'phone' => '081234567890',
                'email' => 'budi@gmail.com',
                'address' => 'Jl. Merdeka No. 123, Jakarta',
                'type' => 'retail',
            ],
            [
                'name' => 'PT Konstruksi Sejahtera',
                'phone' => '021-55667788',
                'email' => 'procurement@konstruksi.com',
                'address' => 'Jl. Sudirman No. 456, Jakarta',
                'type' => 'grosir',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'phone' => '087654321098',
                'email' => 'siti@yahoo.com',
                'address' => 'Jl. Gatot Subroto No. 789, Bandung',
                'type' => 'retail',
            ],
            [
                'name' => 'CV Bangun Indah',
                'phone' => '022-11223344',
                'email' => 'admin@bangunindah.co.id',
                'address' => 'Jl. Asia Afrika No. 321, Bandung',
                'type' => 'grosir',
            ],
            [
                'name' => 'Ahmad Wijaya',
                'phone' => '085555666777',
                'email' => 'ahmad.wijaya@gmail.com',
                'address' => 'Jl. Diponegoro No. 654, Surabaya',
                'type' => 'retail',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}