<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RawMaterial;
use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the main dashboard.
     */
    public function index()
    {
        // Get low stock alerts
        $lowStockProducts = Product::lowStock()->with('category')->limit(5)->get();
        $lowStockRawMaterials = RawMaterial::lowStock()->with('supplier')->limit(5)->get();

        // Get today's sales statistics
        $todaySales = Sale::whereDate('created_at', Carbon::today())
            ->sum('total');

        $todaySalesCount = Sale::whereDate('created_at', Carbon::today())
            ->count();

        // Get this month's statistics
        $monthSales = Sale::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total');

        // Get recent sales
        $recentSales = Sale::with(['customer', 'user'])
            ->latest()
            ->limit(5)
            ->get();

        // Get inventory summary
        $totalProducts = Product::sum('stock_current');
        $totalProductTypes = Product::count();
        $totalCustomers = Customer::count();

        return Inertia::render('dashboard', [
            'stats' => [
                'todaySales' => $todaySales,
                'todaySalesCount' => $todaySalesCount,
                'monthSales' => $monthSales,
                'totalProducts' => $totalProducts,
                'totalProductTypes' => $totalProductTypes,
                'totalCustomers' => $totalCustomers,
            ],
            'lowStockProducts' => $lowStockProducts,
            'lowStockRawMaterials' => $lowStockRawMaterials,
            'recentSales' => $recentSales,
        ]);
    }
}