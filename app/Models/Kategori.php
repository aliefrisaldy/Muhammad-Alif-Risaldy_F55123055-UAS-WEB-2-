<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'ID_Kategori';

    protected $fillable = ['Nama_Kategori'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'ID_Kategori');
    }
}


