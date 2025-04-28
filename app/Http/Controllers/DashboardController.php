<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Petani;

class DashboardController extends Controller
{
    public function index()
    {
        $produkCount = Produk::count(); 
        $kategoriCount = Kategori::count();
        $petaniCount = Petani::count(); 

        $kategoriWithProdukCount = Kategori::withCount('produk')->get();

        $petaniWithProdukCount = Petani::withCount('produk')->get();
    
        return view('dashboard.index', compact('produkCount', 'kategoriCount', 'petaniCount', 'kategoriWithProdukCount', 'petaniWithProdukCount'));
    }
}

