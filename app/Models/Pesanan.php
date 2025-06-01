<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'pesanan';

    protected $fillable = [
        'nomor_pesanan',
        'user_id',
        'nama_pelanggan',
        'nomor_telepon',
        'alamat_pengiriman',
        'total_harga',
        'metode_pembayaran',
        'status_pesanan'
    ];

    protected $casts = [
        'total_harga' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itemPesanan()
    {
        return $this->hasMany(ItemPesanan::class, 'pesanan_id');
    }

    public function getMetodePembayaranTextAttribute()
    {
        $metode = [
            'cod' => 'Cash on Delivery (COD)',
            'transfer' => 'Bank Transfer',
            'e_wallet' => 'E-Wallet (GoPay, OVO, DANA)'
        ];

        return $metode[$this->metode_pembayaran] ?? 'Tidak Diketahui';
    }

    public function getStatusPesananTextAttribute()
    {
        $status = [
            'menunggu' => 'Waiting for Confirmation',
            'diproses' => 'Processing',
            'dikirim' => 'Shipped',
            'selesai' => 'Completed',
            'dibatalkan' => 'Cancelled',
        ];

        return $status[$this->status_pesanan] ?? 'Status Tidak Diketahui';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'menunggu' => 'bg-yellow-100 text-yellow-800',
            'diproses' => 'bg-blue-100 text-blue-800',
            'dikirim' => 'bg-purple-100 text-purple-800',
            'selesai' => 'bg-green-100 text-green-800',
            'dibatalkan' => 'bg-red-100 text-red-800'
        ];

        return $badges[$this->status_pesanan] ?? 'bg-gray-100 text-gray-800';
    }

    public static function generateNomorPesanan()
    {
        do {
            $nomorPesanan = 'PSN-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
        } while (self::where('nomor_pesanan', $nomorPesanan)->exists());

        return $nomorPesanan;
    }

    
}