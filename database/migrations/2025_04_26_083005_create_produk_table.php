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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('ID_Produk');
            $table->string('Nama_Produk');
            $table->text('Deskripsi')->nullable();
            $table->float('Harga');
            $table->integer('Stok');
            $table->string('Gambar')->nullable();
            $table->foreignId('ID_Petani')->constrained('petani', 'ID_Petani')->onDelete('cascade');
            $table->foreignId('ID_Kategori')->constrained('kategori', 'ID_Kategori')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
