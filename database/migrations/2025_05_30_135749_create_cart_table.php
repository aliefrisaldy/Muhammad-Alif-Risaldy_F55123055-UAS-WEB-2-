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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ID_Produk')->constrained('produk', 'ID_Produk')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2); // Harga saat ditambahkan ke cart
            $table->timestamps();
            
            // Pastikan satu user tidak bisa menambahkan produk yang sama lebih dari sekali
            $table->unique(['user_id', 'ID_Produk']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};