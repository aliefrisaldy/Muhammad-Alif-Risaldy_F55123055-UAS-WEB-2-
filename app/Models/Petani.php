<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;

    protected $table = 'petani';
    protected $primaryKey = 'ID_Petani';

    protected $fillable = ['Nama_Petani', 'Alamat', 'No_Hp', 'Email'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'ID_Petani');
    }
}
