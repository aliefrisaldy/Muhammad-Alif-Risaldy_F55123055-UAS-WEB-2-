<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Petani;
use App\Models\Kategori;

class MainProductsController extends Controller
{

    public function index()
    {
        $products = Produk::with(['kategori', 'petani'])
        ->where('Stok', '>', 0) // Hanya tampilkan produk yang masih ada stoknya
        ->orderBy('created_at', 'desc')
        ->get();
    
    return view('Main.Product.index', compact('products'));
    }
}