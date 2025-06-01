@extends('components.default_layout')

@section('title', 'Category Data')
@section('header', 'Category Data')
@section('description', 'Manage FarmFresh product categories')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Category List</h2>
            <p class="mt-1 text-sm text-gray-600">Total: {{ $kategori->count() }} categories available</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('kategori.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Add Category
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-tags text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Categories</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $kategori->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-box text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Products</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $kategori->sum('produk_count') }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-orange-100 rounded-lg">
                    <i class="fas fa-chart-bar text-orange-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Active Categories</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $kategori->where('produk_count', '>', 0)->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-archive text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Empty Categories</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $kategori->where('produk_count', 0)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Category List</h3>
        </div>
        
        @if($kategori->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Product Count</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($kategori as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                                <td class="text-center px-6 py-4 whitespace-nowrap">
                                    <div class="text-center text-sm font-medium text-gray-900">{{ $item->Nama_Kategori }}</div>
                                </td>
                                <td class="text-center px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->produk_count > 0 ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $item->produk_count }} products
                                    </span>
                                </td>
                                <td class="text-center px-6 py-4 whitespace-nowrap">
                                    @if($item->produk_count > 0)
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
                                </td>
                                <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->created_at->format('d M Y') }}
                                </td>
                                <td class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="justify-center flex items-center space-x-2">
                                        <a href="{{ route('kategori.show', $item->ID_Kategori) }}" 
                                           class="text-blue-600 hover:text-blue-900 p-1 rounded" title="Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('kategori.edit', $item->ID_Kategori) }}" 
                                           class="text-yellow-600 hover:text-yellow-900 p-1 rounded" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('kategori.destroy', $item->ID_Kategori) }}" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this category?{{ $item->produk_count > 0 ? ' This category contains ' . $item->produk_count . ' products.' : '' }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900 p-1 rounded {{ $item->produk_count > 0 ? 'opacity-50 cursor-not-allowed' : '' }}" 
                                                    title="{{ $item->produk_count > 0 ? 'Cannot delete (still in use)' : 'Delete' }}"
                                                    {{ $item->produk_count > 0 ? 'disabled' : '' }}>
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
                    <i class="fas fa-tags text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No categories yet</h3>
                <p class="text-gray-600 mb-4">Start adding categories to organize your products</p>
                <a href="{{ route('kategori.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg">
                    <i class="fas fa-plus mr-2"></i>
                    Add First Category
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
