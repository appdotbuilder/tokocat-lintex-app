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
        Schema::create('raw_material_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raw_material_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['in', 'out'])->comment('Tipe transaksi: masuk atau keluar');
            $table->decimal('quantity', 10, 2)->comment('Jumlah bahan');
            $table->decimal('price_per_unit', 12, 2)->comment('Harga per satuan saat transaksi');
            $table->decimal('total_cost', 12, 2)->comment('Total biaya');
            $table->text('notes')->nullable()->comment('Catatan transaksi');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            $table->index('type');
            $table->index('created_at');
            $table->index(['raw_material_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_material_transactions');
    }
};