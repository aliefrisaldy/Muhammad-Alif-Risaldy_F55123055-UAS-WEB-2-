@extends('components.main_layout')

@section('content')
<!-- Cart Header -->
<div class="bg-gradient-to-b from-gray-50 to-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10 max-w-lg mx-auto">
            <h6 class="text-orange-500 font-bold uppercase text-2xl mb-2">Your Shopping Cart</h6>
            <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">Manage Your Cart</h1>
        </div>
    </div>
</div>


<!-- Cart Content -->
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        @if($cartItems->isEmpty())
            <!-- Empty Cart -->
            <div class="bg-white rounded-xl shadow-md p-8 text-center max-w-2xl mx-auto">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-orange-50 rounded-full mb-6">
                    <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Your Cart is Empty</h2>
                <p class="text-gray-600 mb-8">
                    Looks like you haven't added any products to your cart yet.
                </p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Continue Shopping
                </a>
            </div>
        @else
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart Items -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <!-- Cart Header -->
                        <div class="bg-gray-50 px-6 py-4 border-b">
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold text-gray-800">Shopping Cart ({{ $totalItems }} items)</h2>
                                <button id="clear-cart" class="text-sm text-red-600 hover:text-red-800 transition-colors flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Clear Cart
                                </button>
                            </div>
                        </div>
                        
                        <!-- Cart Items List -->
                        <div class="divide-y divide-gray-200">
                            @foreach($cartItems as $item)
                                <div class="cart-item p-6" data-id="{{ $item->id }}">
                                    <div class="flex flex-col sm:flex-row items-center">
                                        <!-- Product Image -->
                                        <div class="sm:w-24 sm:h-24 mb-4 sm:mb-0">
                                            @if($item->produk->Gambar)
                                                <img src="{{ asset('storage/' . $item->produk->Gambar) }}" 
                                                     alt="{{ $item->produk->Nama_Produk }}" 
                                                     class="w-24 h-24 object-cover rounded-lg">
                                            @else
                                                <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <!-- Product Details -->
                                        <div class="sm:ml-6 flex-1">
                                            <div class="flex flex-col sm:flex-row sm:justify-between">
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-800">
                                                        {{ $item->produk->Nama_Produk }}
                                                    </h3>
                                                    @if($item->produk->kategori)
                                                        <p class="text-sm text-gray-500">
                                                            Category: {{ $item->produk->kategori->Nama_Kategori }}
                                                        </p>
                                                    @endif
                                                    @if($item->produk->petani)
                                                        <p class="text-sm text-gray-500">
                                                            Farmer: {{ $item->produk->petani->Nama_Petani }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="mt-2 sm:mt-0 text-right">
                                                    <p class="text-lg font-bold text-green-600">
                                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                                    </p>
                                                    <p class="text-sm text-gray-500">per unit</p>
                                                </div>
                                            </div>
                                            
                                            <!-- Quantity and Actions -->
                                            <div class="mt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                                <div class="flex items-center">
                                                    <span class="text-gray-600 mr-3">Quantity:</span>
                                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                                        <button class="quantity-decrease px-3 py-1 text-gray-600 hover:bg-gray-100 rounded-l-lg transition-colors">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                            </svg>
                                                        </button>
                                                        <input type="number" min="1" max="{{ $item->produk->Stok }}" value="{{ $item->quantity }}" 
                                                               class="quantity-input w-12 text-center border-0 focus:ring-0 focus:outline-none">
                                                        <button class="quantity-increase px-3 py-1 text-gray-600 hover:bg-gray-100 rounded-r-lg transition-colors">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-3 sm:mt-0 flex items-center space-x-4">
                                                    <span class="font-semibold text-gray-800">
                                                        Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                                    </span>
                                                    <button class="remove-item text-red-500 hover:text-red-700 transition-colors">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Continue Shopping -->
                    <div class="mt-6">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center text-green-600 hover:text-green-800 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Continue Shopping
                        </a>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-xl shadow-md p-6 sticky top-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6">Order Summary</h2>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal ({{ $totalItems }} items)</span>
                                <span class="font-semibold text-gray-800">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-semibold text-gray-800">Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tax</span>
                                <span class="font-semibold text-gray-800">Rp 0</span>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-4 mt-4">
                                <div class="flex justify-between">
                                    <span class="text-lg font-semibold text-gray-800">Total</span>
                                    <span class="text-xl font-bold text-green-600">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- Checkout Button -->
                                                
                        <div class="mt-6">
                            <a href="{{ route('checkout.index') }}" class="block w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl text-center">
                                Proceed to Checkout
                            </a>
                        </div>
                        
                        <!-- Payment Methods -->

                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quantity increase/decrease
    document.querySelectorAll('.quantity-decrease').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('.quantity-input');
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
                updateCartItem(this.closest('.cart-item'));
            }
        });
    });

    document.querySelectorAll('.quantity-increase').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('.quantity-input');
            const currentValue = parseInt(input.value);
            const maxValue = parseInt(input.getAttribute('max'));
            if (currentValue < maxValue) {
                input.value = currentValue + 1;
                updateCartItem(this.closest('.cart-item'));
            } else {
                showNotification(`Sorry, only ${maxValue} items available in stock.`, 'error');
            }
        });
    });

    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function() {
            const maxValue = parseInt(this.getAttribute('max'));
            let value = parseInt(this.value);
            
            if (isNaN(value) || value < 1) {
                value = 1;
            } else if (value > maxValue) {
                value = maxValue;
                showNotification(`Sorry, only ${maxValue} items available in stock.`, 'error');
            }
            
            this.value = value;
            updateCartItem(this.closest('.cart-item'));
        });
    });

    // Remove item
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function() {
            const cartItem = this.closest('.cart-item');
            const cartId = cartItem.getAttribute('data-id');
            
            if (confirm('Are you sure you want to remove this item from your cart?')) {
                removeCartItem(cartId, cartItem);
            }
        });
    });

    // Clear cart
    document.getElementById('clear-cart')?.addEventListener('click', function() {
        if (confirm('Are you sure you want to clear your entire cart?')) {
            clearCart();
        }
    });

    // Update cart item
    function updateCartItem(cartItem) {
        const cartId = cartItem.getAttribute('data-id');
        const quantityInput = cartItem.querySelector('.quantity-input');
        const quantity = parseInt(quantityInput.value);
        
        // Disable input during update
        quantityInput.disabled = true;
        
        fetch(`/cart/${cartId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update item total price
                const totalPriceElement = cartItem.querySelector('.font-semibold.text-gray-800');
                totalPriceElement.textContent = `Rp ${formatNumber(data.data.item_total)}`;
                
                // Update cart summary
                updateCartSummary(data.data.cart_items_count, data.data.cart_total);
                
                showNotification('Cart updated successfully', 'success');
            } else {
                showNotification(data.message, 'error');
                // Reset to previous value
                quantityInput.value = quantityInput.defaultValue;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Failed to update cart. Please try again.', 'error');
            // Reset to previous value
            quantityInput.value = quantityInput.defaultValue;
        })
        .finally(() => {
            // Re-enable input
            quantityInput.disabled = false;
        });
    }

    // Remove cart item
    function removeCartItem(cartId, cartItem) {
        fetch(`/cart/${cartId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove item from DOM with animation
                cartItem.style.opacity = '0';
                setTimeout(() => {
                    cartItem.remove();
                    
                    // If no items left, reload page to show empty cart
                    if (document.querySelectorAll('.cart-item').length === 0) {
                        location.reload();
                    }
                }, 300);
                
                // Update cart summary
                updateCartSummary(data.data.cart_items_count, data.data.cart_total);
                
                showNotification(data.message, 'success');
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Failed to remove item. Please try again.', 'error');
        });
    }

    // Clear cart
    function clearCart() {
        fetch('/cart', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');
                // Reload page to show empty cart
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Failed to clear cart. Please try again.', 'error');
        });
    }

    // Update cart summary
    function updateCartSummary(itemsCount, totalPrice) {
        // Update items count
        const itemsCountElements = document.querySelectorAll('.cart-count');
        itemsCountElements.forEach(el => {
            el.textContent = itemsCount;
        });
        
        // Update subtotal
        const subtotalElement = document.querySelector('.space-y-4 .flex:first-child .font-semibold');
        if (subtotalElement) {
            subtotalElement.textContent = `Rp ${formatNumber(totalPrice)}`;
        }
        
        // Update total
        const totalElement = document.querySelector('.border-t .flex .text-xl');
        if (totalElement) {
            totalElement.textContent = `Rp ${formatNumber(totalPrice)}`;
        }
        
        // Update header
        const headerElement = document.querySelector('.bg-gray-50 .text-xl');
        if (headerElement) {
            headerElement.textContent = `Shopping Cart (${itemsCount} items)`;
        }
    }

    // Format number to currency
    function formatNumber(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }

    // Show notification
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
});
</script>
@endsection