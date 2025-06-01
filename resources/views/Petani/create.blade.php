@extends('components.default_layout')

@section('title', 'Add Farmer')
@section('header', 'Add Farmer')
@section('description', 'Add a new partner farmer to the system')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('petani.index') }}" 
           class="inline-flex items-center text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Farmer List
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 bg-green-50 border-b border-green-200">
            <h3 class="text-lg font-medium text-green-900 flex items-center">
                <i class="fas fa-user-plus mr-2"></i>
                Add Farmer Form
            </h3>
            <p class="text-sm text-green-700 mt-1">Complete the information for the new partner farmer</p>
        </div>

        <form action="{{ route('petani.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="space-y-6">
                <!-- Farmer Name -->
                <div>
                    <label for="Nama_Petani" class="block text-sm font-medium text-gray-700 mb-2">
                        Farmer Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="Nama_Petani" 
                           name="Nama_Petani" 
                           value="{{ old('Nama_Petani') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 bg-white placeholder-gray-500 @error('Nama_Petani') border-red-500 @enderror" 
                           placeholder="Enter the farmer's full name"
                           required>
                    @error('Nama_Petani')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="Alamat" class="block text-sm font-medium text-gray-700 mb-2">
                        Address <span class="text-red-500">*</span>
                    </label>
                    <textarea id="Alamat" 
                              name="Alamat" 
                              rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 bg-white placeholder-gray-500 @error('Alamat') border-red-500 @enderror" 
                              placeholder="Enter the farmer's full address"
                              required>{{ old('Alamat') }}</textarea>
                    @error('Alamat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="No_Hp" class="block text-sm font-medium text-gray-700 mb-2">
                        Phone Number <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" 
                           id="No_Hp" 
                           name="No_Hp" 
                           value="{{ old('No_Hp') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 bg-white placeholder-gray-500 @error('No_Hp') border-red-500 @enderror" 
                           placeholder="Example: 08123456789"
                           required>
                    @error('No_Hp')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="Email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                           id="Email" 
                           name="Email" 
                           value="{{ old('Email') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 bg-white placeholder-gray-500 @error('Email') border-red-500 @enderror" 
                           placeholder="example@gmail.com"
                           required>
                    @error('Email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Farmer Photo -->
                <div>
                    <label for="Gambar" class="block text-sm font-medium text-gray-700 mb-2">
                        Farmer Photo
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-green-400 transition-colors" id="dropZone">
                        <div class="space-y-1 text-center">
                            <div class="mx-auto h-12 w-12 text-gray-400">
                                <i class="fas fa-camera text-2xl"></i>
                            </div>
                            <div class="flex text-sm text-gray-600">
                                <label for="Gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-green-500">
                                    <span>Upload photo</span>
                                    <input id="Gambar" name="Gambar" type="file" class="sr-only" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        </div>
                    </div>
                    @error('Gambar')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Preview Image -->
                <div id="imagePreview" class="hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Photo Preview</label>
                    <div class="relative inline-block">
                        <img id="preview" src="/placeholder.svg" alt="Preview" class="w-32 h-32 object-cover rounded-lg border">
                        <button type="button" id="removeImage" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('petani.index') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Save Data
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('Gambar');
    const dropZone = document.getElementById('dropZone');
    const imagePreview = document.getElementById('imagePreview');
    const preview = document.getElementById('preview');
    const removeButton = document.getElementById('removeImage');

    // File input change event
    fileInput.addEventListener('change', function(e) {
        handleFile(e.target.files[0]);
    });

    // Remove image button
    removeButton.addEventListener('click', function() {
        fileInput.value = '';
        imagePreview.classList.add('hidden');
        dropZone.classList.remove('hidden');
    });

    // Drag and drop events
    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.classList.add('border-green-500', 'bg-green-50');
    });

    dropZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropZone.classList.remove('border-green-500', 'bg-green-50');
    });

    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.classList.remove('border-green-500', 'bg-green-50');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleFile(files[0]);
        }
    });

    function handleFile(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                imagePreview.classList.remove('hidden');
                dropZone.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        } else if (file) {
            alert('Please select a valid image file.');
            fileInput.value = '';
        }
    }
});
</script>
@endpush
@endsection
