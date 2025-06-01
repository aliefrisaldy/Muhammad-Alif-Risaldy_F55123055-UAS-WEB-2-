@extends('components.default_layout')

@section('title', 'Dashboard - FarmFresh Admin')
@section('header', 'Dashboard')
@section('description', 'Overview of your farm business')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-green-600 to-orange-500 rounded-xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Welcome back, {{ Auth::user()->name ?? 'Admin' }}!</h1>
                <p class="text-green-100">Here's what's happening with your farm business today.</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-leaf text-6xl text-white opacity-20"></i>
            </div>
        </div>
    </div>

    <!-- Main Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Products -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-box text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Products</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($produkCount) }}</p>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium">{{ $activeProducts }} active</span>
                <span class="text-gray-400 mx-2">•</span>
                <span class="text-red-600 font-medium">{{ $outOfStockProducts }} out of stock</span>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-tags text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Categories</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($kategoriCount) }}</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-gray-600 text-sm">Product categories available</span>
            </div>
        </div>

        <!-- Total Farmers -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-users text-orange-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Farmers</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($petaniCount) }}</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-gray-600 text-sm">Registered farmers</span>
            </div>
        </div>

        <!-- Total Stock -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-warehouse text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Stock</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($totalStock) }}</p>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                @if($lowStockProducts > 0)
                    <span class="text-yellow-600 font-medium">{{ $lowStockProducts }} low stock</span>
                @else
                    <span class="text-green-600 font-medium">All products well stocked</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Financial Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Financial Overview</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Inventory Value</p>
                        <p class="text-xl font-bold text-green-600">Rp {{ number_format($totalInventoryValue, 0, ',', '.') }}</p>
                    </div>
                    <i class="fas fa-money-bill-wave text-green-500 text-2xl"></i>
                </div>
                <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Average Product Price</p>
                        <p class="text-xl font-bold text-blue-600">Rp {{ number_format($averageProductPrice, 0, ',', '.') }}</p>
                    </div>
                    <i class="fas fa-chart-line text-blue-500 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('produk.create') }}" 
                   class="flex items-center justify-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors group">
                    <div class="text-center">
                        <i class="fas fa-plus text-green-600 text-xl mb-2 group-hover:scale-110 transition-transform"></i>
                        <p class="text-sm font-medium text-green-700">Add Product</p>
                    </div>
                </a>
                <a href="{{ route('kategori.create') }}" 
                   class="flex items-center justify-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors group">
                    <div class="text-center">
                        <i class="fas fa-tag text-blue-600 text-xl mb-2 group-hover:scale-110 transition-transform"></i>
                        <p class="text-sm font-medium text-blue-700">Add Category</p>
                    </div>
                </a>
                <a href="{{ route('petani.create') }}" 
                   class="flex items-center justify-center p-4 bg-orange-50 hover:bg-orange-100 rounded-lg transition-colors group">
                    <div class="text-center">
                        <i class="fas fa-user-plus text-orange-600 text-xl mb-2 group-hover:scale-110 transition-transform"></i>
                        <p class="text-sm font-medium text-orange-700">Add Farmer</p>
                    </div>
                </a>
                <a href="{{ route('produk.index') }}" 
                   class="flex items-center justify-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors group">
                    <div class="text-center">
                        <i class="fas fa-list text-purple-600 text-xl mb-2 group-hover:scale-110 transition-transform"></i>
                        <p class="text-sm font-medium text-purple-700">View Products</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Products -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Products</h3>
                    <a href="{{ route('produk.index') }}" class="text-green-600 hover:text-green-700 text-sm font-medium">View All</a>
                </div>
            </div>
            <div class="p-6">
                @if($recentProducts->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentProducts as $product)
                        <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            @if($product->Gambar)
                                <img src="{{ asset('storage/' . $product->Gambar) }}" 
                                     alt="{{ $product->Nama_Produk }}" 
                                     class="w-12 h-12 rounded-lg object-cover border border-gray-200">
                            @else
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $product->Nama_Produk }}</p>
                                <p class="text-sm text-gray-500">{{ $product->kategori->Nama_Kategori ?? 'No Category' }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900">Rp {{ number_format($product->Harga, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500">Stock: {{ $product->Stok }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-box-open text-gray-400 text-3xl mb-3"></i>
                        <p class="text-gray-500">No products added yet</p>
                        <a href="{{ route('produk.create') }}" 
                           class="inline-flex items-center mt-3 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Add First Product
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Low Stock Alerts -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Low Stock Alerts</h3>
            </div>
            <div class="p-6">
                @if($lowStockAlerts->count() > 0)
                    <div class="space-y-3">
                        @foreach($lowStockAlerts as $product)
                        <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $product->Nama_Produk }}</p>
                                <p class="text-xs text-gray-500">{{ $product->kategori->Nama_Kategori ?? 'No Category' }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    {{ $product->Stok }} left
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6">
                        <i class="fas fa-check-circle text-green-500 text-2xl mb-2"></i>
                        <p class="text-sm text-gray-600">All products are well stocked!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Categories and Farmers Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Top Categories -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Top Categories</h3>
                    <a href="{{ route('kategori.index') }}" class="text-green-600 hover:text-green-700 text-sm font-medium">View All</a>
                </div>
            </div>
            <div class="p-6">
                @if($topCategories->count() > 0)
                    <div class="space-y-3">
                        @foreach($topCategories as $category)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-tag text-blue-600 text-sm"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-900">{{ $category->Nama_Kategori }}</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $category->produk_count }} products
                            </span>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6">
                        <i class="fas fa-tags text-gray-400 text-2xl mb-2"></i>
                        <p class="text-sm text-gray-600">No categories with products yet</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Top Farmers -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Top Farmers</h3>
                    <a href="{{ route('petani.index') }}" class="text-green-600 hover:text-green-700 text-sm font-medium">View All</a>
                </div>
            </div>
            <div class="p-6">
                @if($petaniWithProdukCount->where('produk_count', '>', 0)->count() > 0)
                    <div class="space-y-3">
                        @foreach($petaniWithProdukCount->where('produk_count', '>', 0)->take(5) as $farmer)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-green-600 text-sm"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-900">{{ $farmer->Nama_Petani }}</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ $farmer->produk_count }} products
                            </span>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6">
                        <i class="fas fa-users text-gray-400 text-2xl mb-2"></i>
                        <p class="text-sm text-gray-600">No farmers with products yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Add any dashboard-specific JavaScript here
document.addEventListener('DOMContentLoaded', function() {
    // Auto-refresh dashboard every 5 minutes
    setTimeout(function() {
        location.reload();
    }, 300000); // 5 minutes
});
</script>
@endpush
@endsection