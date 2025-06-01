@extends('components.default_layout')

@section('title', 'Edit Product - FarmFresh Admin')
@section('header', 'Edit Product')
@section('description', 'Update product information')

@section('content')
<div class="max-w-4xl mx-auto">
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
                    <span class="text-sm font-medium text-gray-500">Edit Product</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-900">Edit Product Form</h3>
            <p class="text-sm text-gray-600 mt-1">Update product information: {{ $produk->Nama_Produk }}</p>
        </div>

        <form action="{{ route('produk.update', $produk->ID_Produk) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Product Name -->
                    <div>
                        <label for="Nama_Produk" class="block text-sm font-medium text-gray-700 mb-2">
                            Product Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="Nama_Produk" 
                               name="Nama_Produk" 
                               value="{{ old('Nama_Produk', $produk->Nama_Produk) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('Nama_Produk') border-red-500 @enderror"
                               placeholder="Enter product name"
                               required>
                        @error('Nama_Produk')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="ID_Kategori" class="block text-sm font-medium text-gray-700 mb-2">
                            Category <span class="text-red-500">*</span>
                        </label>
                        <select id="ID_Kategori" 
                                name="ID_Kategori" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('ID_Kategori') border-red-500 @enderror"
                                required>
                            <option value="">Select Category</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->ID_Kategori }}" 
                                        {{ old('ID_Kategori', $produk->ID_Kategori) == $kat->ID_Kategori ? 'selected' : '' }}>
                                    {{ $kat->Nama_Kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('ID_Kategori')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Farmer -->
                    <div>
                        <label for="ID_Petani" class="block text-sm font-medium text-gray-700 mb-2">
                            Farmer <span class="text-red-500">*</span>
                        </label>
                        <select id="ID_Petani" 
                                name="ID_Petani" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('ID_Petani') border-red-500 @enderror"
                                required>
                            <option value="">Select Farmer</option>
                            @foreach($petani as $pet)
                                <option value="{{ $pet->ID_Petani }}" 
                                        {{ old('ID_Petani', $produk->ID_Petani) == $pet->ID_Petani ? 'selected' : '' }}>
                                    {{ $pet->Nama_Petani }}
                                </option>
                            @endforeach
                        </select>
                        @error('ID_Petani')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price and Stock -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="Harga" class="block text-sm font-medium text-gray-700 mb-2">
                                Price (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                   id="Harga" 
                                   name="Harga" 
                                   value="{{ old('Harga', $produk->Harga) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('Harga') border-red-500 @enderror"
                                   placeholder="0"
                                   min="0"
                                   required>
                            @error('Harga')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="Stok" class="block text-sm font-medium text-gray-700 mb-2">
                                Stock <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                   id="Stok" 
                                   name="Stok" 
                                   value="{{ old('Stok', $produk->Stok) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('Stok') border-red-500 @enderror"
                                   placeholder="0"
                                   min="0"
                                   required>
                            @error('Stok')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Description -->
                    <div>
                        <label for="Deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="Deskripsi" 
                                  name="Deskripsi" 
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors @error('Deskripsi') border-red-500 @enderror"
                                  placeholder="Enter product description"
                                  required>{{ old('Deskripsi', $produk->Deskripsi) }}</textarea>
                        @error('Deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="Gambar" class="block text-sm font-medium text-gray-700 mb-2">
                            Product Image
                        </label>

                        <!-- Current Image -->
                        @if($produk->Gambar)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Current image:</p>
                            <img src="{{ asset('storage/' . $produk->Gambar) }}" 
                                 alt="{{ $produk->Nama_Produk }}" 
                                 class="h-32 w-32 object-cover rounded-lg border border-gray-200">
                            <input type="hidden" name="old_gambar" value="{{ $produk->Gambar }}">
                        </div>
                        @endif

                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-green-400 transition-colors">
                            <div class="space-y-1 text-center">
                                <div id="image-preview" class="hidden">
                                    <img id="preview-img" src="/placeholder.svg" alt="Preview" class="mx-auto h-32 w-32 object-cover rounded-lg">
                                </div>
                                <div id="upload-placeholder">
                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl"></i>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="Gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                            <span>Upload new image</span>
                                            <input id="Gambar" 
                                                   name="Gambar" 
                                                   type="file" 
                                                   class="sr-only" 
                                                   accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB (optional)</p>
                                </div>
                            </div>
                        </div>
                        @error('Gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('produk.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Update Product
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('Gambar').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
            document.getElementById('upload-placeholder').classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
@endsection
