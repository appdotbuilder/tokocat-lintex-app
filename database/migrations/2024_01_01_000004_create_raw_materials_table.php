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
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama bahan baku');
            $table->string('unit')->comment('Satuan bahan (Kg, Liter, dll)');
            $table->decimal('stock_current', 10, 2)->default(0)->comment('Stok saat ini');
            $table->decimal('stock_minimum', 10, 2)->default(0)->comment('Stok minimum untuk notifikasi');
            $table->decimal('price_per_unit', 12, 2)->comment('Harga per satuan');
            $table->foreignId('supplier_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
            
            $table->index('name');
            $table->index('stock_current');
            $table->index(['stock_current', 'stock_minimum']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_materials');
    }
};