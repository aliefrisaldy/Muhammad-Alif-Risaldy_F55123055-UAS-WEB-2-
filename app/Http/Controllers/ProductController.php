<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Petani;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $produks = Produk::with(['petani', 'kategori'])->get();
        return view('produk.index', compact('produks'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $petani = Petani::all();
        $kategori = Kategori::all();
        return view('produk.create', compact('petani', 'kategori'));
    }

    // Menyimpan data produk baru
    public function store(Request $request)
{
    $request->validate([
        'Nama_Produk' => 'required',
        'Deskripsi' => 'required',
        'Harga' => 'required|numeric',
        'Stok' => 'required|numeric',
        'ID_Petani' => 'required|exists:petani,ID_Petani',
        'ID_Kategori' => 'required|exists:kategori,ID_Kategori',
        'Gambar' => 'requaired|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
    ]);

    // Jika ada gambar yang diupload, simpan gambar
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('produk_images', 'public'); // Menyimpan gambar di storage/app/public/produk_images
    }

    // Simpan produk dengan gambar (jika ada)
    Produk::create([
        'Nama_Produk' => $request->Nama_Produk,
        'Deskripsi' => $request->Deskripsi,
        'Harga' => $request->Harga,
        'Stok' => $request->Stok,
        'ID_Petani' => $request->ID_Petani,
        'ID_Kategori' => $request->ID_Kategori,
        'Gambar' => $gambarPath, // Menyimpan path gambar
    ]);

    return redirect()->route('produk.index')->with('success', 'Sukses Menambahkan Data Produk');
    }

    public function show($id)
    {
        $produk = Produk::with(['petani', 'kategori'])->findOrFail($id);
        return view('produk.detail', compact('produk'));
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $petani = Petani::all();
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'petani', 'kategori'));
    }

    // Memperbarui data produk

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_Produk' => 'required',
            'Deskripsi' => 'required',
            'Harga' => 'required|numeric',
            'Stok' => 'required|numeric',
            'ID_Petani' => 'required|exists:petani,ID_Petani',
            'ID_Kategori' => 'required|exists:kategori,ID_Kategori',
            'Gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $produk = Produk::findOrFail($id);
    
        $data = $request->except(['gambar_path', 'old_gambar']); 
        if ($request->hasFile('Gambar')) {
            // Hapus gambar lama
            if ($produk->Gambar && Storage::disk('public')->exists($produk->Gambar)) {
                Storage::disk('public')->delete($produk->Gambar);
            }
    
            // Simpan gambar baru
            $path = $request->file('Gambar')->store('produk_images', 'public');
            $data['Gambar'] = $path; // Simpan path lengkap
        } else {
            $data['Gambar'] = $request->old_gambar; // Kalau tidak upload, tetap pakai gambar lama
        }
    
        $produk->update($data);
    
        return redirect()->route('produk.index')->with('success', 'Sukses Memperbarui Data Produk');
    }
    

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
    
        if ($produk->Gambar && Storage::disk('public')->exists($produk->Gambar)) {
            Storage::disk('public')->delete($produk->Gambar);
        }
    
        $produk->delete();
    
        return redirect()->route('produk.index')->with('success', 'Sukses Menghapus Data Produk');
    }
    
}
