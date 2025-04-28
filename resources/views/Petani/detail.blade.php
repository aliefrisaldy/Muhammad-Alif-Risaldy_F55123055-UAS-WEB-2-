@extends('components.default_layout')

@section('title', 'Detail Petani')
@section('header', 'Detail Petani')

@section('content')
<div class="bg-gray-800 rounded-lg shadow p-6 w-full max-w-2xl mx-auto">

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
        <!-- Nama Petani -->
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2">Nama Petani:</label>
            <div class="p-4 border border-gray-700 rounded bg-gray-700">
                <p class="text-white">{{ $petani->Nama_Petani }}</p>
            </div>
        </div>

        <!-- Alamat -->
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2">Alamat:</label>
            <div class="p-4 border border-gray-700 rounded bg-gray-700">
                <p class="text-white">{{ $petani->Alamat }}</p>
            </div>
        </div>

        <!-- No HP -->
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2">No HP:</label>
            <div class="p-4 border border-gray-700 rounded bg-gray-700">
                <p class="text-white">{{ $petani->No_Hp }}</p>
            </div>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2">Email:</label>
            <div class="p-4 border border-gray-700 rounded bg-gray-700">
                <p class="text-white">{{ $petani->Email }}</p>
            </div>
        </div>
    </div>

    <div class="flex justify-end mt-6">
        <a href="{{ route('petani.index') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
            Kembali
        </a>
    </div>
</div>
@endsection
