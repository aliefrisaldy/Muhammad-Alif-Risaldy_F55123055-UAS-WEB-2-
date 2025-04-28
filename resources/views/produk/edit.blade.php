@extends('components.default_layout')

@section('title', 'Edit Produk')
@section('header', 'Edit Produk')

@section('content')
@include('components.nontifikasi')
<div class="bg-gray-800 rounded-lg shadow p-6 w-full max-w-2xl mx-auto relative">
    <form action="{{ route('produk.update', $produk->ID_Produk) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf
        @method('PUT')

        <!-- Nama Produk -->
        <div>
            <label for="Nama_Produk" class="block text-gray-200 mb-1 font-bold">Nama Produk</label>
            <input type="text" name="Nama_Produk" id="Nama_Produk" class="w-full border rounded p-2 bg-gray-700 text-white" value="{{ old('Nama_Produk', $produk->Nama_Produk) }}" required>
        </div>

        <!-- Harga -->
        <div>
            <label for="Harga" class="block text-gray-200 mb-1 font-bold">Harga</label>
            <input type="number" name="Harga" id="Harga" class="w-full border rounded p-2 bg-gray-700 text-white" value="{{ old('Harga', $produk->Harga) }}" required>
        </div>

        <!-- Stok -->
        <div>
            <label for="Stok" class="block text-gray-200 mb-1 font-bold">Stok</label>
            <input type="number" name="Stok" id="Stok" class="w-full border rounded p-2 bg-gray-700 text-white" value="{{ old('Stok', $produk->Stok) }}" required>
        </div>

        <!-- Gambar Produk -->
        <div>
            <label for="gambar_path" class="block text-gray-200 mb-1 font-bold">Gambar Lama</label>
            <input type="text" name="gambar_path" id="gambar_path" 
                class="w-full border rounded p-2 mb-2 bg-gray-700 text-white" 
                value="{{ old('gambar_path', $produk->Gambar) }}" readonly>
            
            <label for="Gambar" class="block text-gray-200 mb-1 font-bold mt-2">Upload Gambar Baru</label>
            <input type="file" name="Gambar" id="Gambar" 
                class="w-full border rounded p-2 bg-gray-700 text-white">
            
            <input type="hidden" name="old_gambar" value="{{ $produk->Gambar }}">
        </div>

        <!-- Deskripsi -->
        <div class="col-span-2">
            <label for="Deskripsi" class="block text-gray-200 mb-1 font-bold">Deskripsi</label>
            <textarea name="Deskripsi" id="Deskripsi" class="w-full border rounded p-2 bg-gray-700 text-white" required>{{ old('Deskripsi', $produk->Deskripsi) }}</textarea>
        </div>

        <!-- Petani -->
        <div>
            <label for="ID_Petani" class="block text-gray-200 mb-1 font-bold">Petani</label>
            <select name="ID_Petani" id="ID_Petani" class="w-full border rounded p-2 bg-gray-700 text-white" required>
                @foreach($petani as $p)
                    <option value="{{ $p->ID_Petani }}" {{ $p->ID_Petani == $produk->ID_Petani ? 'selected' : '' }}>
                        {{ $p->Nama_Petani }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Kategori -->
        <div>
            <label for="ID_Kategori" class="block text-gray-200 mb-1 font-bold">Kategori</label>
            <select name="ID_Kategori" id="ID_Kategori" class="w-full border rounded p-2 bg-gray-700 text-white" required>
                @foreach($kategori as $k)
                    <option value="{{ $k->ID_Kategori }}" {{ $k->ID_Kategori == $produk->ID_Kategori ? 'selected' : '' }}>
                        {{ $k->Nama_Kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol -->
        <div class="col-span-2 flex justify-end mt-6">
            <a href="{{ route('produk.index') }}" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded mr-2 transition duration-300 ease-in-out font-bold">Kembali</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded transition duration-300 ease-in-out font-bold">Update</button>
        </div>
    </form>
</div>
@endsection
