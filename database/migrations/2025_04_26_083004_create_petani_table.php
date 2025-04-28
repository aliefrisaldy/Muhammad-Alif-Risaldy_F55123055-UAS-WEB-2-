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
        Schema::create('petani', function (Blueprint $table) {
            $table->id('ID_Petani');
            $table->string('Nama_Petani');
            $table->string('Alamat');
            $table->string('No_Hp');
            $table->string('Email');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petani');
    }
};
