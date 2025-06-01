@extends('components.main_layout')

@section('content')
<!-- Farmer Profile Header -->
<div class="bg-gradient-to-r from-green-600 to-green-700 py-16 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.1"><circle cx="30" cy="30" r="2"/></g></svg>');"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            @if($farmer->Gambar && file_exists(public_path('storage/' . $farmer->Gambar)))
                <!-- Farmer Photo -->
                <div class="w-32 h-32 mx-auto mb-6 rounded-full overflow-hidden border-4 border-white border-opacity-30 shadow-2xl">
                    <img src="{{ asset('storage/' . $farmer->Gambar) }}" 
                         alt="{{ $farmer->Nama_Petani }}" 
                         class="w-full h-full object-cover">
                </div>
            @else
                <!-- Default Avatar -->
                <div class="w-32 h-32 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-white border-opacity-30">
                    <span class="text-white text-5xl font-bold">
                        {{ strtoupper(substr($farmer->Nama_Petani, 0, 1)) }}
                    </span>
                </div>
            @endif
            
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $farmer->Nama_Petani }}</h1>
            <div class="inline-flex items-center bg-orange-500 bg-opacity-20 rounded-full px-4 py-2">
                <svg class="w-4 h-4 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="text-white font-medium">Trusted Local Farmer</span>
            </div>
        </div>
    </div>
</div>

<!-- Farmer Details -->
<div class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Contact Information -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Contact Information
                        </h3>
                        
                        <!-- Farmer Image in Contact Card -->
                        @if($farmer->Gambar && file_exists(public_path('storage/' . $farmer->Gambar)))
                            <div class="mb-6">
                                <img src="{{ asset('storage/' . $farmer->Gambar) }}" 
                                     alt="{{ $farmer->Nama_Petani }}" 
                                     class="w-full h-48 object-cover rounded-lg shadow-md">
                            </div>
                        @endif
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-gray-500 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Address</p>
                                    <p class="text-gray-800">{{ $farmer->Alamat }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Phone</p>
                                    <p class="text-gray-800">{{ $farmer->No_Hp }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Email</p>
                                    <p class="text-gray-800">{{ $farmer->Email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Available Products ({{ $farmer->produk->count() }})
                        </h3>
                        
                        @if($farmer->produk->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($farmer->produk as $product)
                                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <h4 class="font-semibold text-gray-800 mb-2">{{ $product->Nama_Produk ?? 'Product Name' }}</h4>
                                        <div class="flex items-center justify-between">
                                            <span class="text-green-600 font-bold">
                                                Rp {{ number_format($product->Harga, 0, ',', '.') }}
                                            </span>
                                            <span class="text-sm text-gray-500">
                                                Stock: {{ $product->Stok ?? 0 }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <p class="text-gray-500">No products available at the moment</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('farmers.index') }}" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to All Farmers
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
