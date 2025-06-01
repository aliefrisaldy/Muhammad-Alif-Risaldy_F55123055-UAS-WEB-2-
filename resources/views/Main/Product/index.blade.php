@extends('components.main_layout')

@section('content')

<!-- Products Section -->
<div class="bg-gradient-to-b from-gray-50 to-white py-16">
    <div class="container mx-auto px-4">
    <div class="text-center mb-10 max-w-lg mx-auto">
      <h6 class="text-orange-500 font-bold uppercase text-2xl mb-2">Products</h6>
      <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">Our Fresh & Organic Products</h1>
    </div>


        @if($products->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No Products Available</h3>
                <p class="text-gray-600 mb-6">We're currently updating our inventory. Please check back soon!</p>
                <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                    Notify Me
                </button>
            </div>
        @else
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden border border-gray-100">
                        <!-- Product Image Container -->
                        <div class="relative bg-gradient-to-br from-green-50 to-orange-50 p-6 h-64 flex items-center justify-center overflow-hidden">
                            @if($product->Gambar)
                                <img src="{{ asset('storage/' . $product->Gambar) }}" 
                                     alt="{{ $product->Nama_Produk }}" 
                                     class="w-40 h-40 object-cover rounded-full shadow-lg group-hover:scale-110 transition-transform duration-500 border-4 border-white">
                            @else
                                <div class="w-40 h-40 bg-gray-200 rounded-full flex items-center justify-center border-4 border-white shadow-lg">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Organic Badge -->
                            <div class="absolute top-4 left-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                ORGANIC
                            </div>
                            
                            <!-- Category Badge -->
                            @if($product->kategori)
                            <div class="absolute top-4 right-4 bg-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                {{ $product->kategori->Nama_Kategori ?? 'FRESH' }}
                            </div>
                            @endif
                        </div>

                        <!-- Product Info -->
                        <div class="p-6 space-y-4">
                            <!-- Product Name -->
                            <div class="text-center">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors duration-300">
                                    {{ $product->Nama_Produk }}
                                </h3>
                                
                                <!-- Farmer Info -->
                                @if($product->petani)
                                <p class="text-sm text-gray-500 mb-3">
                                    by {{ $product->petani->Nama_Petani ?? 'Local Farmer' }}
                                </p>
                                @endif
                                
                                <!-- Rating Stars (Static for demo) -->
                                <div class="flex justify-center items-center space-x-1 mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                    <span class="text-sm text-gray-500 ml-2">(4.0)</span>
                                </div>
                            </div>

                            <!-- Price and Stock -->
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-2xl font-bold text-green-600">
                                        Rp {{ number_format($product->Harga, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-orange-600">
                                            {{ $product->Stok }} in stock
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Stock Status Bar -->
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full transition-all duration-500" 
                                     style="width: {{ min(($product->Stok / 100) * 100, 100) }}%"></div>
                            </div>

                            <!-- Add to Cart Button -->
                            <button class="add-to-cart w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2 group"
                                    data-id="{{ $product->ID_Produk }}">
                                    <svg class="w-5 h-5 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                                    </svg>

                                <span>Add To Cart</span>
                            </button>

                            <!-- Quick Actions -->
                            <div class="flex justify-center space-x-4 pt-2">
                                <button class="p-2 text-gray-400 hover:text-green-600 transition-colors duration-300" title="Add to Wishlist">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="p-2 text-gray-400 hover:text-orange-600 transition-colors duration-300" title="Quick View">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                                <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors duration-300" title="Share">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<script>
// Add to cart functionality dengan AJAX
document.querySelectorAll('.add-to-cart').forEach(function(button) {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-id');
        const quantity = 1;
        
        // Add loading state
        const originalText = this.innerHTML;
        this.innerHTML = `
            <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Adding...</span>
        `;
        this.disabled = true;
        
        // AJAX request
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Success state
                this.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Added!</span>
                `;
                this.classList.remove('from-green-600', 'to-green-700');
                this.classList.add('from-green-500', 'to-green-600');
                
                // Update cart count di navbar jika ada
                updateCartCount(data.data.cart_items_count);
                
                // Show success notification
                showNotification(data.message, 'success');
                
                // Reset button setelah 2 detik
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                    this.classList.remove('from-green-500', 'to-green-600');
                    this.classList.add('from-green-600', 'to-green-700');
                }, 2000);
                
            } else {
                // Error state
                this.innerHTML = originalText;
                this.disabled = false;
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            this.innerHTML = originalText;
            this.disabled = false;
            showNotification('Something went wrong. Please try again.', 'error');
        });
    });
});

// Function untuk update cart count di navbar
function updateCartCount(count) {
    const cartCountElement = document.querySelector('.cart-count');
    if (cartCountElement) {
        cartCountElement.textContent = count;
        if (count > 0) {
            cartCountElement.classList.remove('hidden');
        } else {
            cartCountElement.classList.add('hidden');
        }
    }
}

// Function untuk show notification
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
        type === 'success' ? 'bg-green-500 text-white' : 
        type === 'error' ? 'bg-red-500 text-white' : 
        'bg-blue-500 text-white'
    }`;
    notification.innerHTML = `
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                ${type === 'success' ? 
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>' :
                    type === 'error' ?
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>' :
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                }
            </svg>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}
</script>
@endsection