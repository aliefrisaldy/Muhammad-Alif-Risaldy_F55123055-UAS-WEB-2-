@extends('components.default_layout')

@section('title', 'Farmers Data')
@section('header', 'Farmers Data')
@section('description', 'Manage FarmFresh Partner Farmers Data')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Farmers List</h2>
            <p class="mt-1 text-sm text-gray-600">Total: {{ $petani->count() }} registered farmers</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('petani.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Add Farmer
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-users text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Farmers</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $petani->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-user-check text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Active</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $petani->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-orange-100 rounded-lg">
                    <i class="fas fa-image text-orange-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">With Photos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $petani->whereNotNull('Gambar')->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-box text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Products</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $petani->sum('produk_count') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Farmers Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Farmers List</h3>
        </div>
        
        @if($petani->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Farmer Name</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Product Count</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($petani as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                                <td class=" text-center px-6 py-4 whitespace-nowrap">
                                    @if($item->Gambar && Storage::disk('public')->exists($item->Gambar))
                                        <img src="{{ asset('storage/' . $item->Gambar) }}" 
                                             alt="{{ $item->Nama_Petani }}" 
                                             class="w-12 h-12 rounded-full object-cover">
                                    @else
                                        <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-gray-500"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class=" text-center px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->Nama_Petani }}</div>
                                </td>
                                <td class="text-center px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ Str::limit($item->Alamat, 50) }}</div>
                                </td>
                                <td class=" text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->No_Hp }}</td>
                                <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->Email }}</td>
                                <td class="text-center px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $item->produk_count }} Products
                                    </span>
                                </td>
                                <td class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('petani.show', $item->ID_Petani) }}" 
                                           class="text-blue-600 hover:text-blue-900 p-1 rounded" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('petani.edit', $item->ID_Petani) }}" 
                                           class="text-yellow-600 hover:text-yellow-900 p-1 rounded" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('petani.destroy', $item->ID_Petani) }}" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this farmer data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900 p-1 rounded" 
                                                    title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                    <i class="fas fa-users text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No farmers data available yet</h3>
                <p class="text-gray-600 mb-4">Start adding FarmFresh partner farmers data</p>
                <a href="{{ route('petani.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg">
                    <i class="fas fa-plus mr-2"></i>
                    Add First Farmer
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
