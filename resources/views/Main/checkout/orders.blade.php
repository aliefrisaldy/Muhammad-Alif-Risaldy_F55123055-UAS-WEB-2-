@extends('components.main_layout')

@section('content')


<div class="bg-gradient-to-b from-gray-50 to-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10 max-w-lg mx-auto">
            <h6 class="text-orange-500 font-bold uppercase text-2xl mb-2">My Orders</h6>
            <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">A List Of All Your Orders</h1>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            @if($pesanan->isEmpty())
                <div class="bg-white rounded-xl shadow-md p-8 text-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">No Orders Yet</h2>
                    <p class="text-gray-600 mb-6">You don’t have any orders yet. Start shopping now!</p>
                    
                    <a href="{{ route('products.index') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        Start Shopping
                    </a>
                </div>
            @else
                <!-- Orders List -->
                <div class="space-y-6">
                    @foreach($pesanan as $p)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden">
                            <div class="p-6">
                                <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800">Order #{{ $p->nomor_pesanan }}</h3>
                                        <p class="text-sm text-gray-500">{{ $p->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                    <div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $p->status_badge }}">
                                            {{ $p->status_pesanan_text }}
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="border-t border-gray-100 pt-4">
                                    <div class="flex flex-wrap justify-between gap-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Total Items: <span class="font-medium text-gray-800">{{ $p->itemPesanan->count() }}</span></p>
                                            <p class="text-sm text-gray-500">Payment Method: <span class="font-medium text-gray-800">{{ $p->metode_pembayaran_text }}</span></p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm text-gray-500">Total:</p>
                                            <p class="text-lg font-bold text-green-600">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4 flex flex-wrap justify-end gap-3">
                                    <a href="{{ route('checkout.detail-pesanan', $p->nomor_pesanan) }}" class="inline-flex items-center px-4 py-2 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition-colors">
                                        <span>View Details</span>
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $pesanan->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
