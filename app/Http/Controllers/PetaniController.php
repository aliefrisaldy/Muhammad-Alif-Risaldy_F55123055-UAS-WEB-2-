<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PetaniController extends Controller
{
    public function __construct()
    {
    $this->middleware('can:manage-farmers');
    }

    public function index()
    {
        // Load relation produk to count products per farmer
        $petani = Petani::withCount('produk')->get();
        return view('petani.index', compact('petani'));
    }

    public function create()
    {
        return view('petani.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama_Petani' => 'required|string|max:255',
            'Alamat' => 'required|string',
            'No_Hp' => 'required|string|max:20',
            'Email' => 'required|email|max:255',
            'Gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $data = $request->only(['Nama_Petani', 'Alamat', 'No_Hp', 'Email']);

        if ($request->hasFile('Gambar')) {
            $gambarPath = $request->file('Gambar')->store('petani_images', 'public');
            $data['Gambar'] = $gambarPath;
        }

        Petani::create($data);

        return redirect()->route('petani.index')->with('success', 'Successfully added farmer data');
    }

    public function edit($id)
    {
        $petani = Petani::findOrFail($id);
        return view('petani.edit', compact('petani'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_Petani' => 'required|string|max:255',
            'Alamat' => 'required|string',
            'No_Hp' => 'required|string|max:20',
            'Email' => 'required|email|max:255',
            'Gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $petani = Petani::findOrFail($id);
        $data = $request->only(['Nama_Petani', 'Alamat', 'No_Hp', 'Email']);

        if ($request->hasFile('Gambar')) {
            // Delete old image if exists
            if ($petani->Gambar && Storage::disk('public')->exists($petani->Gambar)) {
                Storage::disk('public')->delete($petani->Gambar);
            }

            // Save new image
            $gambarPath = $request->file('Gambar')->store('petani_images', 'public');
            $data['Gambar'] = $gambarPath;
        }

        $petani->update($data);

        return redirect()->route('petani.index')->with('success', 'Successfully updated farmer data');
    }

    public function show($id)
    {
        // Load farmer with related products and calculate stats
        $petani = Petani::with(['produk' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);
        
        // Calculate statistics
        $totalProduk = $petani->produk->count();
        $totalPenjualan = $petani->produk->sum('Harga') ?? 0; // Adjust with your field
        $ratingRata = 5.0; // Placeholder, adjust according to your rating system
        
        return view('petani.detail', compact('petani', 'totalProduk', 'totalPenjualan', 'ratingRata'));
    }

    public function destroy($id)
    {
        $petani = Petani::findOrFail($id);

        // Delete image from storage if exists
        if ($petani->Gambar && Storage::disk('public')->exists($petani->Gambar)) {
            Storage::disk('public')->delete($petani->Gambar);
        }

        $petani->delete();

        return redirect()->route('petani.index')->with('success', 'Successfully deleted farmer data');
    }
}
