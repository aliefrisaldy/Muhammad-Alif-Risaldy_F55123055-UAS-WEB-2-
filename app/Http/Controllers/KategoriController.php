<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
    $this->middleware('can:manage-categories');
    }

    public function index()
    {
        // Load relation with products to count the number of products per category
        $kategori = Kategori::withCount('produk')->orderBy('created_at', 'desc')->get();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama_Kategori' => 'required|string|max:255|unique:kategori,Nama_Kategori',
        ], [
            'Nama_Kategori.required' => 'Category name is required',
            'Nama_Kategori.string' => 'Category name must be a text',
            'Nama_Kategori.max' => 'Category name must not exceed 255 characters',
            'Nama_Kategori.unique' => 'Category name already exists, please use a different name',
        ]);

        try {
            Kategori::create($request->all());
            return redirect()->route('kategori.index')
                           ->with('success', 'Category added successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to add category: ' . $e->getMessage())
                           ->withInput();
        }
    }

    public function show($id)
    {
        // Load category with relation to products and calculate statistics
        $kategori = Kategori::with(['produk' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);
        
        // Calculate statistics
        $totalProduk = $kategori->produk->count();
        $totalNilai = $kategori->produk->sum('Harga') ?? 0;
        $rataRataHarga = $totalProduk > 0 ? $totalNilai / $totalProduk : 0;
        
        return view('kategori.detail', compact('kategori', 'totalProduk', 'totalNilai', 'rataRataHarga'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        
        $request->validate([
            'Nama_Kategori' => 'required|string|max:255|unique:kategori,Nama_Kategori,' . $id . ',ID_Kategori',
        ], [
            'Nama_Kategori.required' => 'Category name is required',
            'Nama_Kategori.string' => 'Category name must be a text',
            'Nama_Kategori.max' => 'Category name must not exceed 255 characters',
            'Nama_Kategori.unique' => 'Category name already exists, please use a different name',
        ]);

        try {
            $kategori->update($request->all());
            return redirect()->route('kategori.index')
                           ->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to update category: ' . $e->getMessage())
                           ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            
            // Check if the category is still used by products
            if ($kategori->produk()->count() > 0) {
                return redirect()->back()
                               ->with('error', 'Category cannot be deleted because it is still used by ' . $kategori->produk()->count() . ' products');
            }
            
            $kategori->delete();
            return redirect()->route('kategori.index')
                           ->with('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }
}
