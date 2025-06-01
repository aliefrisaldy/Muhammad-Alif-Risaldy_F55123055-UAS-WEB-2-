@extends('components.default_layout')

@section('title', 'Farmer Details')
@section('header', 'Farmer Details')
@section('description', 'Complete information about partner farmers')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('petani.index') }}" 
           class="inline-flex items-center text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Farmer List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-8 text-center">
                    @if($petani->Gambar && Storage::disk('public')->exists($petani->Gambar))
                        <img src="{{ asset('storage/' . $petani->Gambar) }}" 
                             alt="{{ $petani->Nama_Petani }}" 
                             class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-white shadow-lg object-cover">
                    @else
                        <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white">
                            <i class="fas fa-user text-white text-3xl"></i>
                        </div>
                    @endif
                    <h2 class="text-xl font-bold text-white">{{ $petani->Nama_Petani }}</h2>
                    <p class="text-green-100">FarmFresh Partner Farmer</p>
                </div>

                <!-- Contact Info -->
                <div class="p-6 space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-gray-400 mt-1"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Address</p>
                            <p class="text-gray-900">{{ $petani->Alamat }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-phone text-gray-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Phone Number</p>
                            <p class="text-gray-900">{{ $petani->No_Hp }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Email</p>
                            <p class="text-gray-900">{{ $petani->Email }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar text-gray-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Joined</p>
                            <p class="text-gray-900">{{ $petani->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t">
                    <div class="flex space-x-3">
                        <a href="{{ route('petani.edit', $petani->ID_Petani) }}" 
                           class="flex-1 bg-orange-600 hover:bg-orange-700 text-white text-center py-2 px-4 rounded-lg transition-colors">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <form action="{{ route('petani.destroy', $petani->ID_Petani) }}" 
                              method="POST" 
                              class="flex-1"
                              onsubmit="return confirm('Are you sure you want to delete this farmer?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class=" flex items-center justify-center w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition-colors">
                                <i class="fas fa-trash mr-2"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details & Statistics -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <i class="fas fa-seedling text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600"> Product</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalProduk }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Sales</p>
                            <p class="text-xl font-bold text-gray-900">Rp{{ number_format($totalPenjualan, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <i class="fas fa-star text-purple-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Rating</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $ratingRata }}</p>
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
                            <dt class="text-sm font-medium text-gray-500">Farmer ID</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $petani->ID_Petani }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Active
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Join Date</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $petani->created_at->format('d F Y, H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $petani->updated_at->format('d F Y, H:i') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Products Section -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Farmer Products</h3>
                        @if($petani->produk->count() > 0)
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                {{ $petani->produk->count() }} products
                            </span>
                        @endif
                    </div>
                </div>
                <div class="p-6">
                    @if($petani->produk->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($petani->produk as $produk)
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-800 mb-2">
                                                {{ $produk->Nama_Produk ?? 'Product Name' }}
                                            </h4>
                                            <p class="text-sm text-gray-600 mb-3">
                                                Stock: {{ $produk->Stok ?? 0 }}
                                            </p>
                                            <div class="flex items-center justify-between">
                                                <span class="text-green-600 font-bold text-lg">
                                                    Rp {{ number_format($produk->Harga ?? 0, 0, ',', '.') }}
                                                </span>
                                            </div>
                                            @if($produk->Kategori)
                                                <span class="inline-block mt-2 bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                                    {{ $produk->kategori->Nama_Kategori ?? 'Category' }}
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
                        
                        @if($petani->produk->count() > 4)
                            <div class="mt-4 text-center">
                                <button class="text-blue-600 hover:text-blue-800 font-medium">
                                    View All Products ({{ $petani->produk->count() }})
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                                <i class="fas fa-box text-gray-400 text-2xl"></i>
                            </div>
                            <h4 class="text-lg font-medium text-gray-900 mb-2">No Products Yet</h4>
                            <p class="text-gray-600 mb-4">This farmer hasn't added any products</p>
                            @if(Route::has('produk.create'))
                                <a href="{{ route('produk.create') }}?petani_id={{ $petani->ID_Petani }}" 
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
