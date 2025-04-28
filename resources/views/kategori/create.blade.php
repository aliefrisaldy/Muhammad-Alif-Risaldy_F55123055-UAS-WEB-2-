@extends('components.default_layout')

@section('title', 'Tambah Kategori')
@section('header', 'Tambah Kategori')

@section('content')
@include('components.nontifikasi')
<div class="bg-gray-800 rounded-lg shadow p-6 w-full max-w-2xl mx-auto">
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 gap-6">
            <!-- Nama Kategori -->
            <div class="mb-4">
                <label for="Nama_Kategori" class="block text-gray-200 mb-1 font-bold">Nama Kategori:</label>
                <input type="text" name="Nama_Kategori" id="Nama_Kategori" class="w-full border rounded p-2 bg-gray-700 text-white" required>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <a href="{{ route('kategori.index') }}" class="bg-red-500 hover:bg-red-600 text-white-800 font-bold py-2 px-4 rounded mr-2">
                Kembali
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
