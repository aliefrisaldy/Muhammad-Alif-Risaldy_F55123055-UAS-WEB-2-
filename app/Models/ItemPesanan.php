<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPesanan extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'item_pesanan';

    protected $fillable = [
        'pesanan_id',
        'nama_produk',
        'harga_satuan',
        'jumlah',
        'total_harga'
    ];

    protected $casts = [
        'harga_satuan' => 'decimal:2',
        'total_harga' => 'decimal:2'
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }
}