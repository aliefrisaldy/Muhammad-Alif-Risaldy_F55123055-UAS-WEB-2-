@extends('components.default_layout')

@section('title', 'Tambah Produk')
@section('header', 'Tambah Produk')

@section('content')
@include('components.nontifikasi')
    <div class="bg-gray-800 rounded-lg shadow p-6 w-full max-w-2xl mx-auto relative">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="Nama_Produk" class="block text-gray-200 mb-1 font-bold">Nama Produk</label>
                    <input type="text" name="Nama_Produk" id="Nama_Produk" autocomplete="off" class="w-full border rounded p-2 bg-gray-700 text-white" required>
                </div>

                <div>
                    <label for="Harga" class="block text-gray-200 mb-1 font-bold">Harga</label>
                    <input type="number" name="Harga" id="Harga" class="w-full border rounded p-2 bg-gray-700 text-white" required>
                </div>

                <div>
                    <label for="Stok" class="block text-gray-200 mb-1 font-bold">Stok</label>
                    <input type="number" name="Stok" id="Stok" class="w-full border rounded p-2 bg-gray-700 text-white" required>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-gray-200 mb-1 font-bold">Gambar Produk</label>
                    <input type="file" name="gambar" id="gambar" class="w-full border rounded p-2 bg-gray-700 text-white">
                </div>

                <div class="col-span-2">
                    <label for="Deskripsi" class="block text-gray-200 mb-1 font-bold">Deskripsi</label>
                    <textarea name="Deskripsi" id="Deskripsi" class="w-full border rounded p-2 bg-gray-700 text-white" required></textarea>
                </div>

                <div>
                    <label for="ID_Petani" class="block text-gray-200 mb-1 font-bold">Petani</label>
                    <select name="ID_Petani" id="ID_Petani" class="w-full border rounded p-2 bg-gray-700 text-white" required>
                        <option value="" disabled selected>Pilih Petani</option>
                        @foreach ($petani as $p)
                            <option value="{{ $p->ID_Petani }}">{{ $p->Nama_Petani }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="ID_Kategori" class="block text-gray-200 mb-1 font-bold">Kategori</label>
                    <select name="ID_Kategori" id="ID_Kategori" class="w-full border rounded p-2 bg-gray-700 text-white" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->ID_Kategori }}">{{ $k->Nama_Kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end mt-6">
                <a href="{{ route('produk.index') }}" class="w-32 text-center bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded mr-2 transition duration-300 ease-in-out font-bold">Kembali</a>
                <button type="submit" class="w-32 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded transition duration-300 ease-in-out font-bold">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
