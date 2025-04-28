@extends('components.default_layout')

@section('title', 'Edit Petani')
@section('header', 'Edit Petani')

@section('content')
@include('components.nontifikasi')
<div class="bg-gray-800 rounded-lg shadow p-6 w-full max-w-2xl mx-auto">
    <form action="{{ route('petani.update', $petani->ID_Petani) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf
        @method('PUT')

        <!-- Nama Petani -->
        <div>
            <label for="Nama_Petani" class="block text-gray-200 mb-1 font-bold">Nama Petani</label>
            <input type="text" name="Nama_Petani" id="Nama_Petani" class="w-full border rounded p-2 bg-gray-700 text-white" value="{{ old('Nama_Petani', $petani->Nama_Petani) }}" required>
        </div>

        <!-- Alamat -->
        <div>
            <label for="Alamat" class="block text-gray-200 mb-1 font-bold">Alamat</label>
            <input type="text" name="Alamat" id="Alamat" class="w-full border rounded p-2 bg-gray-700 text-white" value="{{ old('Alamat', $petani->Alamat) }}" required>
        </div>

        <!-- No HP -->
        <div>
            <label for="No_Hp" class="block text-gray-200 mb-1 font-bold">No HP</label>
            <input type="text" name="No_Hp" id="No_Hp" class="w-full border rounded p-2 bg-gray-700 text-white" value="{{ old('No_Hp', $petani->No_Hp) }}" required>
        </div>

        <!-- Email -->
        <div>
            <label for="Email" class="block text-gray-200 mb-1 font-bold">Email</label>
            <input type="email" name="Email" id="Email" class="w-full border rounded p-2 bg-gray-700 text-white" value="{{ old('Email', $petani->Email) }}" required>
        </div>

        <!-- Tombol Aksi -->
        <div class="col-span-2 flex justify-end mt-6">
            <a href="{{ route('petani.index') }}" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded mr-2 transition duration-300 ease-in-out font-bold">
                Kembali
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded transition duration-300 ease-in-out font-bold">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
