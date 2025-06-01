@extends('components.default_layout')

@section('title', 'Add Category')
@section('header', 'Add Category')
@section('description', 'Add a new product category')

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
        <div class="px-6 py-4 bg-green-50 border-b border-green-200">
            <h3 class="text-lg font-medium text-green-900 flex items-center">
                <i class="fas fa-tag mr-2"></i>
                Add Category Form
            </h3>
            <p class="text-sm text-green-700 mt-1">Create a new category to organize your products</p>
        </div>

        <form action="{{ route('kategori.store') }}" method="POST" class="p-6">
            @csrf
            
            <div class="space-y-6">
                <!-- Category Name -->
                <div>
                    <label for="Nama_Kategori" class="block text-sm font-medium text-gray-700 mb-2">
                        Category Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="Nama_Kategori" 
                           name="Nama_Kategori" 
                           value="{{ old('Nama_Kategori') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 bg-white placeholder-gray-500 @error('Nama_Kategori') border-red-500 @enderror" 
                           placeholder="e.g., Vegetables, Fruits, Grains"
                           required>
                    @error('Nama_Kategori')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-gray-500 mt-1">Category name should be unique and easy to understand</p>
                </div>

                <!-- Preview Section -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Category Preview</h4>
                    <div class="flex items-center p-3 bg-white rounded-lg border">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-tag text-white"></i>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900" id="preview-name">
                                <span class="text-gray-400">Category name will appear here</span>
                            </div>
                            <div class="text-sm text-gray-500">Product Category</div>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Tips for Creating a Category</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Use clear and understandable names</li>
                                    <li>Avoid overly long names</li>
                                    <li>Ensure the name is not already in use</li>
                                    <li>Use capital letters at the beginning of each word</li>
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
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Save Category
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
            previewName.innerHTML = value;
            previewName.classList.remove('text-gray-400');
            previewName.classList.add('text-gray-900');
        } else {
            previewName.innerHTML = '<span class="text-gray-400">Category name will appear here</span>';
        }
    });
});
</script>
@endpush
@endsection
