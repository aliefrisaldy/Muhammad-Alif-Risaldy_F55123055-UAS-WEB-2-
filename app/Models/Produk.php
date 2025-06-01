<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'ID_Produk';

    protected $fillable = [
        'Nama_Produk',
        'Deskripsi',
        'Harga',
        'Stok',
        'Gambar',
        'ID_Petani',
        'ID_Kategori'
    ];

    protected $casts = [
        'Harga' => 'decimal:2',
        'Stok' => 'integer'
    ];

    /**
     * Relasi ke Cart
     */
    public function carts()
    {
        return $this->hasMany(Cart::class, 'ID_Produk', 'ID_Produk');
    }

    /**
     * Relasi ke Petani
     */
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'ID_Petani', 'ID_Petani');
    }

    /**
     * Relasi ke Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'ID_Kategori', 'ID_Kategori');
    }

    /**
     * Check apakah produk masih tersedia
     */
    public function isAvailable($quantity = 1)
    {
        return $this->Stok >= $quantity;
    }

    /**
     * Kurangi stok produk
     */
    public function decreaseStock($quantity)
    {
        if ($this->isAvailable($quantity)) {
            $this->decrement('Stok', $quantity);
            return true;
        }
        return false;
    }
}
