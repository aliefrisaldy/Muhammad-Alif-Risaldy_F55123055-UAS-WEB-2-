@extends('components.default_layout')

@section('title', 'Detail Produk')
@section('header', 'Detail Produk')

@section('content')
<div class="bg-gray-800 rounded-lg shadow p-6 w-full max-w-2xl mx-auto">

    <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Nama Produk -->
        <div>
            <label for="Nama_Produk" class="block text-gray-200 mb-1 font-bold">Nama Produk</label>
            <div class="w-full p-2 bg-gray-700 text-white rounded border">
                <p class="text-gray-200">{{ $produk->Nama_Produk }}</p>
            </div>
        </div>

        <!-- Harga -->
        <div>
            <label for="Harga" class="block text-gray-200 mb-1 font-bold">Harga</label>
            <div class="w-full p-2 bg-gray-700 text-white rounded border">
                <p class="text-gray-200">{{ number_format($produk->Harga, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Stok -->
        <div>
            <label for="Stok" class="block text-gray-200 mb-1 font-bold">Stok</label>
            <div class="w-full p-2 bg-gray-700 text-white rounded border">
                <p class="text-gray-200">{{ $produk->Stok }}</p>
            </div>
        </div>

        <div >
            <label for="Gambar" class="block text-gray-200 mb-2 font-bold">Gambar Produk</label>
            <div class="w-full p-2 bg-gray-700 text-white rounded border">
                @if($produk->Gambar)
                <p class="text-gray-200 truncate">{{ $produk->Gambar }}</p>
                @else
                <p class="text-gray-400 italic">Tidak ada gambar tersedia</p>
            @endif
        </div>
        </div>


        <!-- Deskripsi -->
        <div class="col-span-2">
            <label for="Deskripsi" class="block text-gray-200 mb-1 font-bold">Deskripsi</label>
            <div class="w-full p-2 bg-gray-700 text-white rounded border">
                <p class="text-gray-200">{{ $produk->Deskripsi }}</p>
            </div>
        </div>

        <!-- Petani -->
        <div>
            <label for="ID_Petani" class="block text-gray-200 mb-1 font-bold">Petani</label>
            <div class="w-full p-2 bg-gray-700 text-white rounded border">
                <p class="text-gray-200">{{ $produk->petani->Nama_Petani }}</p>
            </div>
        </div>

        <!-- Kategori -->
        <div>
            <label for="ID_Kategori" class="block text-gray-200 mb-1 font-bold">Kategori</label>
            <div class="w-full p-2 bg-gray-700 text-white rounded border">
                <p class="text-gray-200">{{ $produk->kategori->Nama_Kategori }}</p>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="col-span-2 text-right mt-4">
            <a href="{{ route('produk.index') }}" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded mr-2 transition duration-300 ease-in-out font-bold">Kembali</a>
        </div>
    </form>
</div>
@endsection
