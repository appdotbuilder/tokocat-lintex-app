<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SampleSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $customers = Customer::all();
        $users = User::all();

        if ($products->isEmpty() || $users->isEmpty()) {
            return;
        }

        // Create some sample sales for today and this month
        $salesData = [
            // Today's sales
            [
                'invoice_number' => 'INV-' . date('Ymd') . '-001',
                'customer_id' => $customers->random()->id ?? null,
                'sale_type' => 'retail',
                'subtotal' => 180000,
                'discount' => 0,
                'total' => 180000,
                'payment_received' => 200000,
                'change_amount' => 20000,
                'payment_method' => 'cash',
                'user_id' => $users->first()->id,
                'created_at' => Carbon::today()->addHours(9),
            ],
            [
                'invoice_number' => 'INV-' . date('Ymd') . '-002',
                'customer_id' => $customers->where('type', 'grosir')->first()->id ?? null,
                'sale_type' => 'grosir',
                'subtotal' => 800000,
                'discount' => 40000,
                'total' => 760000,
                'payment_received' => 760000,
                'change_amount' => 0,
                'payment_method' => 'transfer',
                'user_id' => $users->first()->id,
                'created_at' => Carbon::today()->addHours(14),
            ],
            [
                'invoice_number' => 'INV-' . date('Ymd') . '-003',
                'customer_id' => null, // Walk-in customer
                'sale_type' => 'retail',
                'subtotal' => 95000,
                'discount' => 0,
                'total' => 95000,
                'payment_received' => 100000,
                'change_amount' => 5000,
                'payment_method' => 'cash',
                'user_id' => $users->first()->id,
                'created_at' => Carbon::today()->addHours(16),
            ],
            
            // This month's sales (some previous days)
            [
                'invoice_number' => 'INV-' . date('Ym') . '01-001',
                'customer_id' => $customers->random()->id ?? null,
                'sale_type' => 'retail',
                'subtotal' => 370000,
                'discount' => 0,
                'total' => 370000,
                'payment_received' => 370000,
                'change_amount' => 0,
                'payment_method' => 'cash',
                'user_id' => $users->first()->id,
                'created_at' => Carbon::now()->subDays(3)->addHours(10),
            ],
            [
                'invoice_number' => 'INV-' . date('Ym') . '02-001',
                'customer_id' => $customers->where('type', 'grosir')->first()->id ?? null,
                'sale_type' => 'grosir',
                'subtotal' => 1200000,
                'discount' => 100000,
                'total' => 1100000,
                'payment_received' => 1100000,
                'change_amount' => 0,
                'payment_method' => 'transfer',
                'user_id' => $users->first()->id,
                'created_at' => Carbon::now()->subDays(5)->addHours(15),
            ],
        ];

        foreach ($salesData as $saleData) {
            $sale = Sale::create($saleData);

            // Create sale items
            $saleProducts = $products->random(random_int(1, 3));
            
            foreach ($saleProducts as $product) {
                $quantity = random_int(1, 3);
                $unitPrice = $sale->sale_type === 'retail' ? $product->price_retail : $product->price_wholesale;
                
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'total_price' => $unitPrice * $quantity,
                ]);
            }
        }
    }
}