@extends('components.default_layout')

@section('title', 'Petani')
@section('header', 'Petani')

@section('content')
@include('components.nontifikasi')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-white">Daftar Petani</h2>
    <a href="{{ route('petani.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded shadow">
        + Tambah Petani
    </a>
</div>

<div class="bg-gray-800 rounded-lg shadow overflow-x-auto">
    <table class="min-w-full table-auto text-center text-gray-300">
        <thead class="bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-gray-200">Nama Petani</th>
                <th class="px-4 py-2 text-gray-200">Alamat</th>
                <th class="px-4 py-2 text-gray-200">No HP</th>
                <th class="px-4 py-2 text-gray-200">Email</th>
                <th class="px-4 py-2 text-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petani as $petani)
                <tr class="border-t border-gray-600">
                    <td class="px-4 py-2">{{ $petani->Nama_Petani }}</td>
                    <td class="px-4 py-2">{{ $petani->Alamat }}</td>
                    <td class="px-4 py-2">{{ $petani->No_Hp }}</td>
                    <td class="px-4 py-2">{{ $petani->Email }}</td>
                    <td class="px-4 py-2">
                        <div class="flex justify-center items-center space-x-2">
                            <!-- Detail button -->
                            <a href="{{ route('petani.show', $petani->ID_Petani) }}" class="bg-white rounded-full p-2 hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4 h-4 text-green-500 hover:text-green-600">
                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                </svg>
                            </a>

                            <!-- Edit button -->
                            <a href="{{ route('petani.edit', $petani->ID_Petani) }}" class="bg-white rounded-full p-2 hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 text-blue-500 hover:text-blue-600">
                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                                </svg>
                            </a>

                            <!-- Delete button -->
                            <form action="{{ route('petani.destroy', $petani->ID_Petani) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-white rounded-full p-2 hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 text-red-500 hover:text-red-600">
                                        <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
