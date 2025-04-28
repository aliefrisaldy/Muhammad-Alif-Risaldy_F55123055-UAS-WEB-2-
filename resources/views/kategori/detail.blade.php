@extends('components.default_layout')

@section('title', 'Detail Kategori')
@section('header', 'Detail Kategori')

@section('content')
<div class="bg-gray-800 rounded-lg shadow p-6 w-full max-w-2xl mx-auto">

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
        <!-- Nama Kategori -->
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2">Nama Kategori:</label>
            <div class="p-4 border border-gray-700 rounded bg-gray-700">
                <p class="text-white">{{ $kategori->Nama_Kategori }}</p>
            </div>
        </div>

        <!-- Produk terkait -->
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2">Produk terkait:</label>
            <div class="p-4 border border-gray-700 rounded bg-gray-700">
                <ul class="text-white">
                    @foreach($kategori->produk as $produk)
                        <li>{{ $produk->Nama_Produk }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="flex justify-end mt-6">
        <a href="{{ route('kategori.index') }}" class="bg-red-500 hover:bg-red-600 text-white-800 font-bold py-2 px-4 rounded">
            Kembali
        </a>
    </div>
</div>
@endsection
