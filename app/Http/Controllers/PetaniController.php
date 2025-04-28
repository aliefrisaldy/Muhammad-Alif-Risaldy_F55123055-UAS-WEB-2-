<?php

namespace App\Http\Controllers;
use App\Models\Petani;
use Illuminate\Http\Request;

class PetaniController extends Controller
{
    public function index()
    {
        $petani = Petani::all();
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
        ]);

        Petani::create($request->all());

        return redirect()->route('petani.index')->with('success', 'Sukses Menambahkan Data Petani');
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
        ]);

        $petani = Petani::findOrFail($id);
        $petani->update($request->all());

        return redirect()->route('petani.index')->with('success', 'Sukses Memperbarui Data Petani');
    }
    public function show($id)
    {
        $petani = Petani::findOrFail($id);
        return view('petani.detail', compact('petani'));
    }
    public function destroy($id)
    {
        $petani = Petani::findOrFail($id);
        $petani->delete();

        return redirect()->route('petani.index')->with('success', 'Sukses Menghapus Data Petani');
    }
}
