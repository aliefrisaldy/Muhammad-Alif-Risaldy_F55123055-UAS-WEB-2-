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
        'Nama_Produk', 'Deskripsi', 'Harga', 'Stok', 'Gambar', 'ID_Petani', 'ID_Kategori'
    ];
    
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'ID_Petani');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'ID_Kategori');
    }
}
