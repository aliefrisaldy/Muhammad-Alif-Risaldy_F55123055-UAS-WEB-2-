@extends('components.main_layout')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <!-- Success Message -->
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Order Placed Successfully!</h1>
                <p class="text-gray-600 mb-6">Thank you for your order. We will contact you shortly to confirm the delivery.</p>
                
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                    <div class="text-green-700 space-y-1">
                        <p><strong>Order Number:</strong> {{ $pesanan->nomor_pesanan }}</p>
                        <p><strong>Total Payment:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
                        <p><strong>Payment Method:</strong> {{ $pesanan->metode_pembayaran_text }}</p>
                        <p><strong>Status:</strong> {{ $pesanan->status_pesanan_text }}</p>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="text-left mb-6">
                    <h3 class="font-semibold text-gray-800 mb-4">Ordered Products:</h3>
                    <div class="space-y-2">
                        @foreach($pesanan->itemPesanan as $item)
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <div>
                                    <span class="font-medium">{{ $item->nama_produk }}</span>
                                    <span class="text-gray-500 text-sm">({{ $item->jumlah }}x)</span>
                                </div>
                                <span class="font-semibold">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="text-left mb-6 bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-800 mb-2">Shipping Information:</h3>
                    <div class="text-sm text-gray-600 space-y-1">
                        <p><strong>Name:</strong> {{ $pesanan->nama_pelanggan }}</p>
                        <p><strong>Phone:</strong> {{ $pesanan->nomor_telepon }}</p>
                        <p><strong>Address:</strong> {{ $pesanan->alamat_pengiriman }}</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('checkout.daftar-pesanan') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        View My Orders
                    </a>
                    <a href="{{ route('products.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition-colors">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
