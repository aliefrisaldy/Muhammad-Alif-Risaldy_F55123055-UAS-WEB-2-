<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Petani;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view-dashboard');
    }
    public function index()
    {
        // Basic counts
        $produkCount = Produk::count(); 
        $kategoriCount = Kategori::count();
        $petaniCount = Petani::count();

        // Stock statistics
        $totalStock = Produk::sum('Stok');
        $lowStockProducts = Produk::where('Stok', '<=', 10)->count();
        $outOfStockProducts = Produk::where('Stok', 0)->count();
        $activeProducts = Produk::where('Stok', '>', 0)->count();

        // Financial statistics
        $totalInventoryValue = Produk::selectRaw('SUM(Harga * Stok) as total')->value('total') ?? 0;
        $averageProductPrice = Produk::avg('Harga') ?? 0;

        // Categories with product counts
        $kategoriWithProdukCount = Kategori::withCount('produk')
            ->orderBy('produk_count', 'desc')
            ->get();

        // Farmers with product counts
        $petaniWithProdukCount = Petani::withCount('produk')
            ->orderBy('produk_count', 'desc')
            ->get();

        // Recent products (last 5)
        $recentProducts = Produk::with(['kategori', 'petani'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Low stock alerts
        $lowStockAlerts = Produk::with(['kategori', 'petani'])
            ->where('Stok', '<=', 10)
            ->where('Stok', '>', 0)
            ->orderBy('Stok', 'asc')
            ->limit(5)
            ->get();

        // Top categories by product count
        $topCategories = Kategori::withCount('produk')
            ->having('produk_count', '>', 0)
            ->orderBy('produk_count', 'desc')
            ->limit(5)
            ->get();

        // Monthly product additions (last 6 months)
        $monthlyData = Produk::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as count')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('dashboard.index', compact(
            'produkCount', 
            'kategoriCount', 
            'petaniCount',
            'totalStock',
            'lowStockProducts',
            'outOfStockProducts',
            'activeProducts',
            'totalInventoryValue',
            'averageProductPrice',
            'kategoriWithProdukCount', 
            'petaniWithProdukCount',
            'recentProducts',
            'lowStockAlerts',
            'topCategories',
            'monthlyData'
        ));
    }
}