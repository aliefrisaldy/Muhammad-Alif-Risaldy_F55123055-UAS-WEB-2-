@extends('components.default_layout') <!-- Sesuaikan dengan layout utama Anda -->

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold text-white mb-1">Ringkasan Data</h2>
    <!-- Dashboard Cards -->
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- Produk Card -->
        <div class="bg-gray-600 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
            <h2 class="text-2xl font-semibold text-white mb-2">Jumlah Produk</h2>
            <p class="text-4xl font-extrabold text-white">{{ $produkCount }}</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-sm text-white opacity-80">Jumlah produk yang tersedia di toko</span>
                <i class="fas fa-box-open text-white text-xl"></i>
            </div>
        </div>

        <!-- Kategori Card -->
        <div class="bg-gray-600 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
            <h2 class="text-2xl font-semibold text-white mb-2">Jumlah Kategori</h2>
            <p class="text-4xl font-extrabold text-white">{{ $kategoriCount }}</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-sm text-white opacity-80">Jumlah kategori produk yang tersedia</span>
                <i class="fas fa-list-ul text-white text-xl"></i>
            </div>
        </div>

        <!-- Petani Card -->
        <div class="bg-gray-600 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
            <h2 class="text-2xl font-semibold text-white mb-2">Jumlah Petani</h2>
            <p class="text-4xl font-extrabold text-white">{{ $petaniCount }}</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-sm text-white opacity-80">Jumlah petani yang terdaftar</span>
                <i class="fas fa-users text-white text-xl"></i>
            </div>
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-8 mt-10">

    <!-- Kategori Table -->
    <div class="bg-gray-800 rounded-lg shadow overflow-x-auto flex-1">
        <table class="min-w-full table-auto text-center text-gray-300">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-gray-200">Nama Kategori</th>
                    <th class="px-4 py-2 text-gray-200">Jumlah Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoriWithProdukCount as $kategori)
                    <tr class="border-t border-gray-600">
                        <td class="px-4 py-2">{{ $kategori->Nama_Kategori }}</td>
                        <td class="px-4 py-2">{{ $kategori->produk_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Petani Table -->
    <div class="bg-gray-800 rounded-lg shadow overflow-x-auto flex-1">
        <table class="min-w-full table-auto text-center text-gray-300">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-gray-200">Nama Petani</th>
                    <th class="px-4 py-2 text-gray-200">Jumlah Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petaniWithProdukCount as $petani)
                    <tr class="border-t border-gray-600">
                        <td class="px-4 py-2">{{ $petani->Nama_Petani }}</td>
                        <td class="px-4 py-2">{{ $petani->produk_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</div>
@endsection
