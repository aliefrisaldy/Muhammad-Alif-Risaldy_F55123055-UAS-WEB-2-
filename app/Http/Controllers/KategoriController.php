<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama_Kategori' => 'required|string|max:255',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Sukses Menambahkan Data Kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_Kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Sukses Memperbarui Data Kategori');
    }
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.detail', compact('kategori'));
    }
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Sukses Menghapus Data Kategori');
    }
}
