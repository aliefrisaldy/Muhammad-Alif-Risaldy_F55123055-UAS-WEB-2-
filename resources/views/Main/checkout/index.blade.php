@extends('components.main_layout')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10 max-w-lg mx-auto">
            <h6 class="text-orange-500 font-bold uppercase text-2xl mb-2">Checkout</h6>
            <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">Complete Your Rrder</h1>
        </div>
    </div>
</div>


<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <form action="{{ route('checkout.store') }}" method="POST" class="max-w-4xl mx-auto">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Customer Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Customer Information</h2>

                    <div class="space-y-4">
                        <div>
                            <label for="nama_pelanggan" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan', Auth::user()->name) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('nama_pelanggan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                            placeholder="Example: 08123456789"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            @error('nomor_telepon')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="alamat_pengiriman" class="block text-sm font-medium text-gray-700 mb-2">Shipping Address</label>
                            <textarea id="alamat_pengiriman" name="alamat_pengiriman" rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                      placeholder="Enter your full address..." required>{{ old('alamat_pengiriman') }}</textarea>
                            @error('alamat_pengiriman')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Payment Method -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-4">Payment Method</label>
                            <div class="space-y-3">
                                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                    <input type="radio" name="metode_pembayaran" value="cod" class="text-green-600 focus:ring-green-500" checked>
                                    <div class="ml-3">
                                        <div class="font-medium text-gray-800">Cash on Delivery (COD)</div>
                                        <div class="text-sm text-gray-500">Pay when your order arrives</div>
                                    </div>
                                    <div class="ml-auto">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                </label>

                                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                    <input type="radio" name="metode_pembayaran" value="transfer_bank" class="text-green-600 focus:ring-green-500">
                                    <div class="ml-3">
                                        <div class="font-medium text-gray-800">Bank Transfer</div>
                                        <div class="text-sm text-gray-500">Transfer to our account</div>
                                    </div>
                                    <div class="ml-auto">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                        </svg>
                                    </div>
                                </label>

                                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                    <input type="radio" name="metode_pembayaran" value="e_wallet" class="text-green-600 focus:ring-green-500">
                                    <div class="ml-3">
                                        <div class="font-medium text-gray-800">E-Wallet</div>
                                        <div class="text-sm text-gray-500">GoPay, OVO, DANA, etc.</div>
                                    </div>
                                    <div class="ml-auto">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </label>
                            </div>
                            @error('metode_pembayaran')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="bg-white rounded-xl shadow-md p-6 h-fit">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Order Summary</h2>

                    <!-- Cart Items -->
                    <div class="space-y-4 mb-6 max-h-96 overflow-y-auto">
                        @foreach($cartItems as $item)
                            <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex-shrink-0 overflow-hidden">
                                    @if($item->produk->Gambar)
                                        <img src="{{ asset('storage/' . $item->produk->Gambar) }}" 
                                             alt="{{ $item->produk->Nama_Produk }}" 
                                             class="w-16 h-16 object-cover">
                                    @else
                                        <div class="w-16 h-16 bg-gray-300 flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-medium text-gray-800 truncate">{{ $item->produk->Nama_Produk }}</h4>
                                    <p class="text-sm text-gray-500">{{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-800">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Cost Summary -->
                    <div class="border-t border-gray-200 pt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal ({{ $cartItems->sum('quantity') }} items)</span>
                            <span class="text-gray-800">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Shipping</span>
                            <span class="text-green-600">Free</span>
                        </div>
                        <div class="border-t border-gray-200 pt-2">
                            <div class="flex justify-between">
                                <span class="text-xl font-bold text-gray-800">Total Payment</span>
                                <span class="text-2xl font-bold text-green-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full mt-6 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-[1.02] shadow-lg">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Place Order
                        </span>
                    </button>

                    <!-- Security Note -->
                    <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-blue-700 font-medium">Secure Transaction</p>
                                <p class="text-xs text-blue-600">Your data is protected with SSL encryption</p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="mt-4 p-3 bg-yellow-50 rounded-lg">
                        <p class="text-sm text-yellow-700">
                            <strong>Note:</strong> Your order will be processed after payment confirmation. Estimated delivery: 1–3 business days.
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript Interaction -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentMethods = document.querySelectorAll('input[name="metode_pembayaran"]');
    
    paymentMethods.forEach(method => {
        method.addEventListener('change', function() {
            paymentMethods.forEach(m => {
                m.closest('label').classList.remove('border-green-500', 'bg-green-50');
                m.closest('label').classList.add('border-gray-300');
            });

            if (this.checked) {
                this.closest('label').classList.remove('border-gray-300');
                this.closest('label').classList.add('border-green-500', 'bg-green-50');
            }
        });
    });

    const defaultSelected = document.querySelector('input[name="metode_pembayaran"]:checked');
    if (defaultSelected) {
        defaultSelected.closest('label').classList.remove('border-gray-300');
        defaultSelected.closest('label').classList.add('border-green-500', 'bg-green-50');
    }
});
</script>
@endsection
