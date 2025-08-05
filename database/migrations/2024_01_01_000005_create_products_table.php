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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama produk');
            $table->string('color')->nullable()->comment('Warna produk');
            $table->decimal('size_kg', 8, 2)->comment('Ukuran dalam Kilogram');
            $table->decimal('price_retail', 12, 2)->comment('Harga jual retail');
            $table->decimal('price_wholesale', 12, 2)->comment('Harga jual grosir');
            $table->integer('stock_current')->default(0)->comment('Stok tersedia saat ini');
            $table->integer('stock_minimum')->default(0)->comment('Stok minimum untuk notifikasi');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            $table->index('name');
            $table->index('stock_current');
            $table->index(['stock_current', 'stock_minimum']);
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};