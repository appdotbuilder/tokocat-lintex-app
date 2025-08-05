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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama pelanggan');
            $table->string('phone')->nullable()->comment('Nomor telepon pelanggan');
            $table->string('email')->nullable()->comment('Email pelanggan');
            $table->text('address')->nullable()->comment('Alamat pelanggan');
            $table->enum('type', ['retail', 'grosir'])->default('retail')->comment('Tipe pelanggan');
            $table->timestamps();
            
            $table->index('name');
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};