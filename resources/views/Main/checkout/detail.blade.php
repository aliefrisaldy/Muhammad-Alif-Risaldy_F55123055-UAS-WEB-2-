@extends('components.main_layout')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-r from-green-600 to-green-700 py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-white text-center">Order Details</h1>
        <p class="text-green-100 text-center mt-2">Order #{{ $pesanan->nomor_pesanan }}</p>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Back Navigation -->
            <div class="mb-6">
                <a href="{{ route('checkout.daftar-pesanan') }}" class="inline-flex items-center text-green-600 hover:text-green-700">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Back to Orders</span>
                </a>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif
            
            <!-- Order Info -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
                <div class="p-6">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Order #{{ $pesanan->nomor_pesanan }}</h2>
                            <p class="text-sm text-gray-500">Created on {{ $pesanan->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $pesanan->status_badge }}">
                                {{ $pesanan->status_pesanan_text }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Shipping Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-800 mb-3">Shipping Information</h3>
                            <div class="text-sm text-gray-600 space-y-2">
                                <p><strong>Name:</strong> {{ $pesanan->nama_pelanggan }}</p>
                                <p><strong>Phone:</strong> {{ $pesanan->nomor_telepon }}</p>
                                <p><strong>Address:</strong> {{ $pesanan->alamat_pengiriman }}</p>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-800 mb-3">Payment Information</h3>
                            <div class="text-sm text-gray-600 space-y-2">
                                <p><strong>Payment Method:</strong> {{ $pesanan->metode_pembayaran_text }}</p>
                                <p><strong>Payment Status:</strong> 
                                    @if($pesanan->status_pesanan == 'menunggu')
                                        <span class="text-yellow-600">Awaiting Payment</span>
                                    @else
                                        <span class="text-green-600">Payment Received</span>
                                    @endif
                                </p>
                                <p><strong>Total Payment:</strong> <span class="font-medium text-gray-800">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span></p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Order Items</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="px-4 py-3 text-left font-medium text-gray-700">Product</th>
                                        <th class="px-4 py-3 text-center font-medium text-gray-700">Unit Price</th>
                                        <th class="px-4 py-3 text-center font-medium text-gray-700">Quantity</th>
                                        <th class="px-4 py-3 text-right font-medium text-gray-700">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($pesanan->itemPesanan as $item)
                                        <tr>
                                            <td class="px-4 py-4">
                                                <div class="font-medium text-gray-800">{{ $item->nama_produk }}</div>
                                            </td>
                                            <td class="px-4 py-4 text-center text-gray-600">
                                                Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                                            </td>
                                            <td class="px-4 py-4 text-center text-gray-600">
                                                {{ $item->jumlah }}
                                            </td>
                                            <td class="px-4 py-4 text-right font-medium text-gray-800">
                                                Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-gray-50">
                                        <td colspan="3" class="px-4 py-3 text-right font-medium text-gray-700">Total</td>
                                        <td class="px-4 py-3 text-right font-bold text-green-600">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('products.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                    Continue Shopping
                </a>
                
                @if($pesanan->status_pesanan == 'menunggu' && $pesanan->metode_pembayaran != 'cod')
                    <!-- Confirm Payment Button -->
                    <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        Confirm Payment
                    </button>
                @elseif($pesanan->status_pesanan == 'menunggu')
                    <!-- Cancel Order Button -->
                    <button onclick="showCancelModal()" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        Cancel Order
                    </button>
                @elseif($pesanan->status_pesanan == 'diproses')
                    <!-- Cancel Order Button for 'processing' status -->
                    <button onclick="showCancelModal()" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        Cancel Order
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Cancel Confirmation Modal -->
<div id="cancelModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mt-4">Cancel Order</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    Are you sure you want to cancel this order? 
                    <br><br>
                    <strong>Order #{{ $pesanan->nomor_pesanan }}</strong>
                    <br>
                    Total: <strong>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
                    <br><br>
                    <span class="text-red-600 font-medium">Product stock will be restored and the order will be permanently deleted.</span>
                </p>
            </div>
            <div class="items-center px-4 py-3">
                <form action="{{ route('checkout.batalkan-pesanan', $pesanan->nomor_pesanan) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-auto mr-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition-colors">
                        Yes, Cancel
                    </button>
                </form>
                <button onclick="hideCancelModal()" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-auto hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors">
                    No, Keep It
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function showCancelModal() {
    document.getElementById('cancelModal').classList.remove('hidden');
}

function hideCancelModal() {
    document.getElementById('cancelModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('cancelModal').addEventListener('click', function(e) {
    if (e.target === this) {
        hideCancelModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        hideCancelModal();
    }
});
</script>
@endsection
