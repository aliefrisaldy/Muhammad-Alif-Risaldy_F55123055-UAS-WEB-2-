@extends('components.default_layout')

@section('title', 'Category Details')
@section('header', 'Category Details')
@section('description', 'Complete information about the product category')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('kategori.index') }}" 
           class="inline-flex items-center text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Category List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-6 py-8 text-center">
                    <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tag text-orange-500 text-3xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-white">{{ $kategori->Nama_Kategori }}</h2>
                    <p class="text-green-100">Product Category</p>
                </div>

                <!-- Info -->
                <div class="p-6 space-y-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-hashtag text-gray-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Category ID</p>
                            <p class="text-gray-900">{{ $kategori->ID_Kategori }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar text-gray-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Created At</p>
                            <p class="text-gray-900">{{ $kategori->created_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-clock text-gray-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Last Updated</p>
                            <p class="text-gray-900">{{ $kategori->updated_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-gray-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            @if($totalProduk > 0)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    Empty
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t">
                    <div class="flex space-x-3">
                        <a href="{{ route('kategori.edit', $kategori->ID_Kategori) }}" 
                           class="flex items-center justify-center flex-1 bg-orange-600 hover:bg-orange-700 text-white text-center py-2 px-4 rounded-lg transition-colors">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        @if($totalProduk == 0)
                            <form action="{{ route('kategori.destroy', $kategori->ID_Kategori) }}" 
                                  method="POST" 
                                  class="flex-1"
                                  onsubmit="return confirm('Are you sure you want to delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition-colors">
                                    <i class="fas fa-trash mr-2"></i>Delete
                                </button>
                            </form>
                        @else
                            <button disabled 
                                    class="flex-1 bg-gray-400 text-white py-2 px-4 rounded-lg cursor-not-allowed"
                                    title="Cannot be deleted because it is still in use">
                                <i class="fas fa-lock mr-2"></i>Locked
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Details & Statistics -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <i class="fas fa-box text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Products</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalProduk }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Value</p>
                            <p class="text-xl font-bold text-gray-900">Rp{{ number_format($totalNilai, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <i class="fas fa-chart-line text-purple-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Average Price</p>
                            <p class="text-xl font-bold text-gray-900">Rp{{ number_format($rataRataHarga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Details -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Detailed Information</h3>
                </div>
                <div class="p-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Category Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-semibold">{{ $kategori->Nama_Kategori }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Category ID</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $kategori->ID_Kategori }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Created At</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $kategori->created_at->format('d F Y, H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $kategori->updated_at->format('d F Y, H:i') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Products Section -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Products in Category</h3>
                        @if($kategori->produk->count() > 0)
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                {{ $kategori->produk->count() }} products
                            </span>
                        @endif
                    </div>
                </div>
                <div class="p-6">
                    @if($kategori->produk->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($kategori->produk as $produk)
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-800 mb-2">
                                                {{ $produk->Nama_Produk ?? 'Product Name' }}
                                            </h4>
                                            <p class="text-sm text-gray-600 mb-3">
                                                Rp {{ number_format($produk->Harga ?? 0, 0, ',', '.') }}
                                            </p>
                                            <div class="flex items-center justify-between">
                                                <span class="text-sm text-gray-500">
                                                    Stock: {{ $produk->Stok ?? 0 }}
                                                </span>
                                            </div>
                                            @if($produk->petani)
                                                <span class="inline-block mt-2 bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                                    {{ $produk->petani->Nama_Petani ?? 'Farmer' }}
                                                </span>
                                            @endif
                                        </div>
                                        @if($produk->Gambar && Storage::disk('public')->exists($produk->Gambar))
                                            <img src="{{ asset('storage/' . $produk->Gambar) }}" 
                                                 alt="{{ $produk->Nama_Produk }}" 
                                                 class="w-16 h-16 object-cover rounded-lg ml-4">
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center ml-4">
                                                <i class="fas fa-image text-gray-400"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        @if($kategori->produk->count() > 4)
                            <div class="mt-4 text-center">
                                <button class="text-blue-600 hover:text-blue-800 font-medium">
                                    View All Products ({{ $kategori->produk->count() }})
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                                <i class="fas fa-box text-gray-400 text-2xl"></i>
                            </div>
                            <h4 class="text-lg font-medium text-gray-900 mb-2">No products yet</h4>
                            <p class="text-gray-600 mb-4">This category does not contain any products yet</p>
                            @if(Route::has('produk.create'))
                                <a href="{{ route('produk.create') }}?kategori_id={{ $kategori->ID_Kategori }}" 
                                   class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add Product
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
