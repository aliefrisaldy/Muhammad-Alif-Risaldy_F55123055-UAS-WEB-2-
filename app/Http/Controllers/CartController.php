<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Tampilkan halaman cart
     */
    public function index()
    {
        $cartItems = Cart::with('produk')
            ->forUser(Auth::id())
            ->get();

        $totalPrice = Cart::getTotalPriceForUser(Auth::id());
        $totalItems = Cart::getTotalItemsForUser(Auth::id());

        return view('Main.Cart.index', compact('cartItems', 'totalPrice', 'totalItems'));
    }

    /**
     * Tambah produk ke cart
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produk,ID_Produk',
            'quantity' => 'integer|min:1|max:99'
        ]);

        $productId = $request->product_id;
        $quantity = $request->quantity ?? 1;
        $userId = Auth::id();

        // Cek apakah user sudah login
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first to add items to cart.'
            ], 401);
        }

        try {
            DB::beginTransaction();

            // Ambil data produk
            $produk = Produk::findOrFail($productId);

            // Cek ketersediaan stok
            $existingCartItem = Cart::where('user_id', $userId)
                ->where('ID_Produk', $productId)
                ->first();

            $totalQuantityNeeded = $quantity;
            if ($existingCartItem) {
                $totalQuantityNeeded += $existingCartItem->quantity;
            }

            if (!$produk->isAvailable($totalQuantityNeeded)) {
                return response()->json([
                    'success' => false,
                    'message' => "Sorry, only {$produk->Stok} items available in stock."
                ], 400);
            }

            // Tambah atau update cart
            if ($existingCartItem) {
                $existingCartItem->increment('quantity', $quantity);
                $cartItem = $existingCartItem;
            } else {
                $cartItem = Cart::create([
                    'user_id' => $userId,
                    'ID_Produk' => $productId,
                    'quantity' => $quantity,
                    'price' => $produk->Harga
                ]);
            }

            DB::commit();

            // Hitung ulang total cart
            $totalItems = Cart::getTotalItemsForUser($userId);
            $totalPrice = Cart::getTotalPriceForUser($userId);

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully!',
                'data' => [
                    'cart_items_count' => $totalItems,
                    'cart_total' => $totalPrice,
                    'product_name' => $produk->Nama_Produk
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to add product to cart. Please try again.'
            ], 500);
        }
    }

    /**
     * Update quantity item di cart
     */
    public function update(Request $request, $cartId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:99'
        ]);

        try {
            $cartItem = Cart::where('id', $cartId)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            $produk = $cartItem->produk;
            $newQuantity = $request->quantity;

            // Cek stok
            if (!$produk->isAvailable($newQuantity)) {
                return response()->json([
                    'success' => false,
                    'message' => "Sorry, only {$produk->Stok} items available in stock."
                ], 400);
            }

            $cartItem->update(['quantity' => $newQuantity]);

            $totalItems = Cart::getTotalItemsForUser(Auth::id());
            $totalPrice = Cart::getTotalPriceForUser(Auth::id());

            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully!',
                'data' => [
                    'cart_items_count' => $totalItems,
                    'cart_total' => $totalPrice,
                    'item_total' => $cartItem->total_price
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update cart. Please try again.'
            ], 500);
        }
    }

    /**
     * Hapus item dari cart
     */
    public function remove($cartId)
    {
        try {
            $cartItem = Cart::where('id', $cartId)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            $productName = $cartItem->produk->Nama_Produk;
            $cartItem->delete();

            $totalItems = Cart::getTotalItemsForUser(Auth::id());
            $totalPrice = Cart::getTotalPriceForUser(Auth::id());

            return response()->json([
                'success' => true,
                'message' => "{$productName} removed from cart successfully!",
                'data' => [
                    'cart_items_count' => $totalItems,
                    'cart_total' => $totalPrice
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove item from cart. Please try again.'
            ], 500);
        }
    }

    /**
     * Kosongkan seluruh cart
     */
    public function clear()
    {
        try {
            Cart::where('user_id', Auth::id())->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cart cleared successfully!',
                'data' => [
                    'cart_items_count' => 0,
                    'cart_total' => 0
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to clear cart. Please try again.'
            ], 500);
        }
    }

    /**
     * Get cart count untuk navbar
     */
    public function getCartCount()
    {
        if (!Auth::check()) {
            return response()->json(['count' => 0]);
        }

        $count = Cart::getTotalItemsForUser(Auth::id());
        
        return response()->json(['count' => $count]);
    }
}