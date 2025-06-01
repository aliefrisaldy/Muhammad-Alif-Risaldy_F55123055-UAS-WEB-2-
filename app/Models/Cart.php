<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ID_Produk',
        'quantity',
        'price'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer'
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Produk
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'ID_Produk', 'ID_Produk');
    }

    /**
     * Accessor untuk total harga item
     */
    public function getTotalPriceAttribute()
    {
        return $this->price * $this->quantity;
    }

    /**
     * Scope untuk mendapatkan cart berdasarkan user
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Static method untuk mendapatkan total items di cart user
     */
    public static function getTotalItemsForUser($userId)
    {
        return static::where('user_id', $userId)->sum('quantity');
    }

    /**
     * Static method untuk mendapatkan total harga cart user
     */
    public static function getTotalPriceForUser($userId)
    {
        return static::where('user_id', $userId)
            ->get()
            ->sum(function ($item) {
                return $item->total_price;
            });
    }
}