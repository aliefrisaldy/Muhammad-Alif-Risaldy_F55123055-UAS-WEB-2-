@extends('components.main_layout')

@section('content')
<!-- Farmers Header -->
<div class="bg-gradient-to-b from-gray-50 to-white py-16 pb-4">
    <div class="container mx-auto px-4">
        <div class="text-center mb-3 max-w-lg mx-auto">
            <h6 class="text-orange-500 font-bold uppercase text-2xl mb-2">Our Farmers</h6>
            <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">Meet Our Partners</h1>
            <p class="text-gray-600 text-lg">Discover the dedicated farmers who bring you the freshest produce directly from their farms</p>
        </div>
    </div>
</div>

<!-- Farmers Content -->
<div class="py-0">
    <div class="container mx-auto px-4">
        <!-- Stats Section -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center bg-white rounded-full px-6 py-3 shadow-lg">
                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-gray-800 font-semibold">{{ $farmers->total() }} Trusted Farmers</span>
            </div>
        </div>

        <!-- Farmers Grid -->
        @if($farmers->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                @foreach($farmers as $farmer)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                        <!-- Farmer Avatar -->
                      <div class="bg-gradient-to-r from-green-600 to-green-700 p-6 text-center relative overflow-hidden">
                        <div class="relative z-10">
                        <!-- Circular Avatar -->
                        <div class="w-20 h-20 rounded-full overflow-hidden mx-auto mb-3 border-2 border-white shadow-md group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('storage/' . $farmer->Gambar) }}" alt="{{ $farmer->Nama_Petani }}" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-white font-bold text-lg mb-1">{{ $farmer->Nama_Petani }}</h3>
                        <div class="inline-flex items-center bg-orange-500 bg-opacity-20 rounded-full px-3 py-1">
                            <svg class="w-3 h-3 text-white mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-white text-xs font-medium">Local Farmer</span>
                    </div>
                    </div>
                        </div>

                        <!-- Farmer Info -->
                        <div class="p-6">
                            <div class="space-y-3 mb-4">
                                <div class="flex items-start">
                                    <svg class="w-4 h-4 text-gray-500 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($farmer->Alamat, 40) }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span class="text-gray-600 text-sm">{{ $farmer->No_Hp }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-gray-600 text-sm">{{ Str::limit($farmer->Email, 25) }}</span>
                                </div>
                            </div>

                            <!-- Products Info -->
                            <div class="bg-gradient-to-r from-green-50 to-orange-50 rounded-lg p-4 mb-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        <span class="text-gray-700 text-sm font-medium">Products Available</span>
                                    </div>
                                    <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">
                                        {{ $farmer->produk->count() }} items
                                    </span>
                                </div>
                            </div>

                            <!-- View Details Button -->
                            <a href="{{ route('farmers.show', $farmer->ID_Petani) }}" 
                               class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg text-center block group">
                                <span class="flex items-center justify-center">
                                    View Farmer Profile
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $farmers->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No Farmers Available</h3>
                <p class="text-gray-600 text-lg max-w-md mx-auto">We're currently building our network of trusted farmers. Check back soon for updates!</p>
            </div>
        @endif
    </div>
</div>

@endsection