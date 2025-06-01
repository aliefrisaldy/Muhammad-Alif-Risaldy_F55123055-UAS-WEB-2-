<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Petani;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-products');
    }    

    // Display all products
    public function index()
    {
        $produks = Produk::with(['petani', 'kategori'])->get();
        return view('produk.index', compact('produks'));
    }

    // Display the form to add a new product
    public function create()
    {
        $petani = Petani::all();
        $kategori = Kategori::all();
        return view('produk.create', compact('petani', 'kategori'));
    }

    // Store a new product
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Produk' => 'required',
            'Deskripsi' => 'required',
            'Harga' => 'required|numeric',
            'Stok' => 'required|numeric',
            'ID_Petani' => 'required|exists:petani,ID_Petani',
            'ID_Kategori' => 'required|exists:kategori,ID_Kategori',
            'Gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Save the image if uploaded
        $gambarPath = null;
        if ($request->hasFile('Gambar')) {
            $gambarPath = $request->file('Gambar')->store('produk_images', 'public');
        }

        // Save the product with the image (if any)
        Produk::create([
            'Nama_Produk' => $request->Nama_Produk,
            'Deskripsi' => $request->Deskripsi,
            'Harga' => $request->Harga,
            'Stok' => $request->Stok,
            'ID_Petani' => $request->ID_Petani,
            'ID_Kategori' => $request->ID_Kategori,
            'Gambar' => $gambarPath,
        ]);

        return redirect()->route('produk.index')->with('success', 'Successfully added product data.');
    }

    public function show($id)
    {
        $produk = Produk::with(['petani', 'kategori'])->findOrFail($id);
        return view('produk.detail', compact('produk'));
    }

    // Display the form to edit a product
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $petani = Petani::all();
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'petani', 'kategori'));
    }

    // Update product data
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
            // Delete the old image
            if ($produk->Gambar && Storage::disk('public')->exists($produk->Gambar)) {
                Storage::disk('public')->delete($produk->Gambar);
            }

            // Save the new image
            $path = $request->file('Gambar')->store('produk_images', 'public');
            $data['Gambar'] = $path;
        } else {
            $data['Gambar'] = $request->old_gambar;
        }

        $produk->update($data);

        return redirect()->route('produk.index')->with('success', 'Successfully updated product data.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->Gambar && Storage::disk('public')->exists($produk->Gambar)) {
            Storage::disk('public')->delete($produk->Gambar);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Successfully deleted product data.');
    }
}
