<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        $farmers = Petani::with('produk')->paginate(12);
        return view('Main.farmer.index', compact('farmers'));
    }

    public function show($id)
    {
        $farmer = Petani::with('produk')->findOrFail($id);
        return view('Main.farmer.show', compact('farmer'));
    }

    // No updates needed for create method

    public function store(Request $request)
    {
        $request->validate([
            'Nama_Petani' => 'required|string|max:255',
            'Alamat' => 'required|string|max:500',
            'No_Hp' => 'required|string|max:20',
            'Email' => 'required|email|unique:petani,Email',
        ], [
            'Nama_Petani.required' => 'Farmer name is required',
            'Alamat.required' => 'Address is required',
            'No_Hp.required' => 'Phone number is required',
            'Email.required' => 'Email is required',
            'Email.email' => 'Invalid email format',
            'Email.unique' => 'Email is already registered',
        ]);

        try {
            Petani::create($request->all());
            return redirect()->route('farmers.index')
                           ->with('success', 'Farmer registered successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to register farmer: ' . $e->getMessage())
                           ->withInput();
        }
    }

    // No updates needed for edit method

    public function update(Request $request, $id)
    {
        $farmer = Petani::findOrFail($id);

        $request->validate([
            'Nama_Petani' => 'required|string|max:255',
            'Alamat' => 'required|string|max:500',
            'No_Hp' => 'required|string|max:20',
            'Email' => 'required|email|unique:petani,Email,' . $id . ',ID_Petani',
        ], [
            'Nama_Petani.required' => 'Farmer name is required',
            'Alamat.required' => 'Address is required',
            'No_Hp.required' => 'Phone number is required',
            'Email.required' => 'Email is required',
            'Email.email' => 'Invalid email format',
            'Email.unique' => 'Email is already registered',
        ]);

        try {
            $farmer->update($request->all());
            return redirect()->route('farmers.index')
                           ->with('success', 'Farmer information updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to update farmer: ' . $e->getMessage())
                           ->withInput();
        }
    }

    // No updates needed for destroy method
}
