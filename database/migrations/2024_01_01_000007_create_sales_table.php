<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique()->comment('Nomor invoice');
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('sale_type', ['retail', 'grosir'])->comment('Tipe penjualan');
            $table->decimal('subtotal', 15, 2)->comment('Subtotal sebelum diskon');
            $table->decimal('discount', 10, 2)->default(0)->comment('Diskon dalam persen atau nominal');
            $table->decimal('total', 15, 2)->comment('Total akhir');
            $table->decimal('payment_received', 15, 2)->comment('Pembayaran yang diterima');
            $table->decimal('change_amount', 15, 2)->default(0)->comment('Kembalian');
            $table->enum('payment_method', ['cash', 'transfer', 'credit'])->comment('Metode pembayaran');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            $table->index('invoice_number');
            $table->index('sale_type');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};