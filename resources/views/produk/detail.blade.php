@extends('components.default_layout')

@section('title', 'Product Details - FarmFresh Admin')
@section('header', 'Product Details')
@section('description', 'Complete product information')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('produk.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600">
                    <i class="fas fa-box mr-2"></i>
                    Products
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                    <span class="text-sm font-medium text-gray-500">{{ $produk->Nama_Produk }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Action Buttons -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ $produk->Nama_Produk }}</h1>
        <div class="flex items-center space-x-3">
            <a href="{{ route('produk.edit', $produk->ID_Produk) }}" 
               class="inline-flex items-center px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                <i class="fas fa-edit mr-2"></i>
                Edit Product
            </a>
            <form action="{{ route('produk.destroy', $produk->ID_Produk) }}" 
                  method="POST" 
                  class="inline"
                  onsubmit="return confirm('Are you sure you want to delete this product?')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                    <i class="fas fa-trash mr-2"></i>
                    Delete Product
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Product Image -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="aspect-square">
                    @if($produk->Gambar)
                        <img src="{{ asset('storage/' . $produk->Gambar) }}" 
                             alt="{{ $produk->Nama_Produk }}" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-image text-gray-400 text-6xl mb-4"></i>
                                <p class="text-gray-500">No image available</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Product Name</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $produk->Nama_Produk }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Category</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            <i class="fas fa-tag mr-1"></i>
                            {{ $produk->kategori->Nama_Kategori ?? 'N/A' }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Farmer</label>
                        <p class="text-lg font-semibold text-gray-900">
                            <i class="fas fa-user mr-2 text-gray-400"></i>
                            {{ $produk->petani->Nama_Petani ?? 'N/A' }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                        @if($produk->Stok > 0)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Available
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <i class="fas fa-times-circle mr-1"></i>
                                Out of Stock
                            </span>
                        @endif
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-500 mb-2">Description</label>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-700 leading-relaxed">{{ $produk->Deskripsi }}</p>
                    </div>
                </div>
            </div>

            <!-- Price and Stock -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Price</p>
                            <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($produk->Harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-warehouse text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Available Stock</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $produk->Stok }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Additional Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Product ID</label>
                        <p class="text-gray-900 font-mono">{{ $produk->ID_Produk }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Created At</label>
                        <p class="text-gray-900">{{ $produk->created_at ? $produk->created_at->format('d M Y, H:i') : 'N/A' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                        <p class="text-gray-900">{{ $produk->updated_at ? $produk->updated_at->format('d M Y, H:i') : 'N/A' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Total Stock Value</label>
                        <p class="text-gray-900 font-semibold">Rp {{ number_format($produk->Harga * $produk->Stok, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('produk.edit', $produk->ID_Produk) }}" 
                       class="inline-flex items-center px-4 py-2 bg-orange-100 hover:bg-orange-200 text-orange-700 font-medium rounded-lg transition-colors">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Product
                    </a>
                    
                    <a href="{{ route('produk.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to List
                    </a>
                    
                    <a href="{{ route('produk.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-green-100 hover:bg-green-200 text-green-700 font-medium rounded-lg transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Add New Product
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
