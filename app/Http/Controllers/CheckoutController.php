<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\ItemPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('produk')->where('user_id', Auth::id())->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your shopping cart is empty!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('Main.checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'alamat_pengiriman' => 'required|string',
            'metode_pembayaran' => 'required|in:cod,transfer_bank,e_wallet'
        ], [
            'nama_pelanggan.required' => 'Customer name is required',
            'nomor_telepon.required' => 'Phone number is required',
            'alamat_pengiriman.required' => 'Shipping address is required',
            'metode_pembayaran.required' => 'Payment method must be selected'
        ]);

        try {
            DB::beginTransaction();

            // Get cart items
            $cartItems = Cart::with('produk')->where('user_id', Auth::id())->get();
            
            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Your shopping cart is empty!');
            }

            // Calculate total
            $total = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            // Create order
            $pesanan = Pesanan::create([
                'nomor_pesanan' => Pesanan::generateNomorPesanan(),
                'user_id' => Auth::id(),
                'nama_pelanggan' => $request->nama_pelanggan,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'total_harga' => $total,
                'metode_pembayaran' => $request->metode_pembayaran
            ]);

            // Create order items
            foreach ($cartItems as $cartItem) {
                ItemPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'nama_produk' => $cartItem->produk->Nama_Produk,
                    'harga_satuan' => $cartItem->price,
                    'jumlah' => $cartItem->quantity,
                    'total_harga' => $cartItem->price * $cartItem->quantity
                ]);

                // Decrease product stock
                $cartItem->produk->decrement('Stok', $cartItem->quantity);
            }

            // Clear cart
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('checkout.success', $pesanan->nomor_pesanan);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to process the order. Please try again.');
        }
    }

    public function success($nomorPesanan)
    {
        $pesanan = Pesanan::with('itemPesanan')
            ->where('nomor_pesanan', $nomorPesanan)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('Main.checkout.success', compact('pesanan'));
    }

    public function daftarPesanan()
    {
        $pesanan = Pesanan::with('itemPesanan')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Main.checkout.orders', compact('pesanan'));
    }

    public function detailPesanan($nomorPesanan)
    {
        $pesanan = Pesanan::with('itemPesanan')
            ->where('nomor_pesanan', $nomorPesanan)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('Main.checkout.detail', compact('pesanan'));
    }

    public function batalkanPesanan($nomorPesanan)
    {
        try {
            DB::beginTransaction();

            // Find order
            $pesanan = Pesanan::with('itemPesanan')
                ->where('nomor_pesanan', $nomorPesanan)
                ->where('user_id', Auth::id())
                ->first();

            if (!$pesanan) {
                return redirect()->route('checkout.daftar-pesanan')
                    ->with('error', 'Order not found.');
            }

            // Check if order can be cancelled
            if (!in_array($pesanan->status_pesanan, ['menunggu', 'diproses'])) {
                return redirect()->back()
                    ->with('error', 'Order cannot be cancelled because it is already being shipped or completed.');
            }

            Log::info('Cancelling order', [
                'nomor_pesanan' => $nomorPesanan,
                'user_id' => Auth::id(),
                'status' => $pesanan->status_pesanan
            ]);

            // Restore product stock
            foreach ($pesanan->itemPesanan as $item) {
                // Find product by name (since we save product name in order item)
                $produk = Produk::where('Nama_Produk', $item->nama_produk)->first();
                
                if ($produk && isset($produk->Stok)) {
                    $produk->increment('Stok', $item->jumlah);
                    Log::info('Stock restored', [
                        'product_id' => $produk->id,
                        'product_name' => $produk->Nama_Produk,
                        'quantity_restored' => $item->jumlah,
                        'new_stock' => $produk->Stok
                    ]);
                }
            }

            // Delete order items
            ItemPesanan::where('pesanan_id', $pesanan->id)->delete();
            
            // Delete order
            $pesanan->delete();

            DB::commit();

            Log::info('Order cancelled successfully', [
                'nomor_pesanan' => $nomorPesanan,
                'user_id' => Auth::id()
            ]);

            return redirect()->route('checkout.daftar-pesanan')
                ->with('success', 'Order has been successfully cancelled and product stock has been restored.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error cancelling order', [
                'message' => $e->getMessage(),
                'nomor_pesanan' => $nomorPesanan,
                'user_id' => Auth::id(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()
                ->with('error', 'Failed to cancel order: ' . $e->getMessage());
        }
    }
}
