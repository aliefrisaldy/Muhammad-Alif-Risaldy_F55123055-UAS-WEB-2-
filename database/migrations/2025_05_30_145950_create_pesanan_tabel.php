<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pesanan')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_pelanggan');
            $table->string('nomor_telepon');
            $table->text('alamat_pengiriman');
            $table->decimal('total_harga', 10, 2);
            $table->enum('metode_pembayaran', ['cod', 'transfer_bank', 'e_wallet'])->default('cod');
            $table->enum('status_pesanan', ['menunggu', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};