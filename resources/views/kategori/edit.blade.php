@extends('components.default_layout')

@section('title', 'Edit Category')
@section('header', 'Edit Category')
@section('description', 'Update category information')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('kategori.index') }}" 
           class="inline-flex items-center text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Category List
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 bg-orange-50 border-b border-orange-200">
            <h3 class="text-lg font-medium text-orange-900 flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit Category Form
            </h3>
            <p class="text-sm text-orange-700 mt-1">Update category information for "{{ $kategori->Nama_Kategori }}"</p>
        </div>

        <form action="{{ route('kategori.update', $kategori->ID_Kategori) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Current Info -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Current Information</h4>
                    <div class="flex items-center p-3 bg-white rounded-lg border">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-tag text-white"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm font-medium text-gray-900">{{ $kategori->Nama_Kategori }}</div>
                            <div class="text-sm text-gray-500">
                                ID: {{ $kategori->ID_Kategori }} | 
                                Created: {{ $kategori->created_at->format('d M Y') }} |
                                Products: {{ $kategori->produk()->count() }} items
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Name -->
                <div>
                    <label for="Nama_Kategori" class="block text-sm font-medium text-gray-700 mb-2">
                        Category Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="Nama_Kategori" 
                           name="Nama_Kategori" 
                           value="{{ old('Nama_Kategori', $kategori->Nama_Kategori) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 bg-white placeholder-gray-500 @error('Nama_Kategori') border-red-500 @enderror" 
                           placeholder="Example: Vegetables, Fruits, Grains"
                           required>
                    @error('Nama_Kategori')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-gray-500 mt-1">Category name must be unique and easy to understand</p>
                </div>

                <!-- Preview Section -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Preview Changes</h4>
                    <div class="flex items-center p-3 bg-white rounded-lg border">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-tag text-white"></i>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900" id="preview-name">
                                {{ $kategori->Nama_Kategori }}
                            </div>
                            <div class="text-sm text-gray-500">Product Category</div>
                        </div>
                    </div>
                </div>

                <!-- Warning if has products -->
                @if($kategori->produk()->count() > 0)
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800">Attention</h3>
                                <div class="mt-2 text-sm text-yellow-700">
                                    <p>This category contains <strong>{{ $kategori->produk()->count() }} products</strong>. 
                                    Changing the category name will affect all products assigned to this category.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Info Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Category Editing Tips</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Ensure the new name is still relevant to existing products</li>
                                    <li>Avoid drastic changes</li>
                                    <li>Category name must remain unique</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('kategori.index') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('Nama_Kategori');
    const previewName = document.getElementById('preview-name');

    nameInput.addEventListener('input', function() {
        const value = this.value.trim();
        if (value) {
            previewName.textContent = value;
        } else {
            previewName.textContent = '{{ $kategori->Nama_Kategori }}';
        }
    });
});
</script>
@endpush
@endsection
