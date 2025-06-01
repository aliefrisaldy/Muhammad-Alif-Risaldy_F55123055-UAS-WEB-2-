@extends('components.default_layout')

@section('title', 'Product Data - FarmFresh Admin')
@section('header', 'Product Data')
@section('description', 'Manage FarmFresh products')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row items-start md:items-center gap-4 md:gap-8">
        <div class="grid gap-1">
            <h1 class="text-2xl font-bold tracking-tight">Product List</h1>
            <p class="text-gray-600">Total: {{ $produks->count() }} products available</p>
        </div>
        <div class="ml-auto">
            <a href="{{ route('produk.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Add Product
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-box text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Products</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $produks->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-warehouse text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Stock</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $produks->sum('Stok') }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-check-circle text-orange-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Active Products</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $produks->where('Stok', '>', 0)->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-exclamation-triangle text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Out of Stock</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $produks->where('Stok', 0)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900">Product List</h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">NO</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">IMAGE</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">PRODUCT NAME</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">CATEGORY</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">FARMER</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">PRICE</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">STOCK</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">STATUS</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">ACTION</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($produks as $index => $produk)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="text-center px-6 py-4 whitespace-nowrap">
                            <div  class="flex justify-center items-center">
                            @if($produk->Gambar)
                                <img src="{{ asset('storage/' . $produk->Gambar) }}" 
                                     alt="{{ $produk->Nama_Produk }}" 
                                     class="w-12 h-12 rounded-lg object-cover border border-gray-200">
                            @else
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                            </div>
                        </td>
                        <td class="text-center px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $produk->Nama_Produk }}</div>
                        
                        </td>
                        <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $produk->kategori->Nama_Kategori ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->petani->Nama_Petani ?? 'N/A' }}</td>
                        <td class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rp {{ number_format($produk->Harga, 0, ',', '.') }}</td>
                        <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->Stok }}</td>
                        <td class="text-center px-6 py-4 whitespace-nowrap">
                            @if($produk->Stok > 0)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Available
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    Out of Stock
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center align-middle">
                            <div class="flex justify-center items-center space-x-2">
                                <a href="{{ route('produk.show', $produk->ID_Produk) }}" 
                                   class="text-blue-600 hover:text-blue-900 p-1 rounded transition-colors"
                                   title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('produk.edit', $produk->ID_Produk) }}" 
                                   class="text-orange-600 hover:text-orange-900 p-1 rounded transition-colors"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('produk.destroy', $produk->ID_Produk) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 p-1 rounded transition-colors"
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-box-open text-gray-400 text-4xl mb-4"></i>
                                <p class="text-gray-500 text-lg font-medium">No products yet</p>
                                <p class="text-gray-400 text-sm">Add your first product</p>
                                <a href="{{ route('produk.create') }}" 
                                   class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add Product
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
