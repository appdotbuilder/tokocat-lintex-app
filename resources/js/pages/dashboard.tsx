import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

interface DashboardProps {
    stats: {
        todaySales: number;
        todaySalesCount: number;
        monthSales: number;
        totalProducts: number;
        totalProductTypes: number;
        totalCustomers: number;
    };
    lowStockProducts: Array<{
        id: number;
        name: string;
        color: string | null;
        stock_current: number;
        stock_minimum: number;
        category: {
            name: string;
        };
    }>;
    lowStockRawMaterials: Array<{
        id: number;
        name: string;
        stock_current: number;
        stock_minimum: number;
        unit: string;
        supplier: {
            name: string;
        } | null;
    }>;
    recentSales: Array<{
        id: number;
        invoice_number: string;
        total: number;
        sale_type: string;
        created_at: string;
        customer: {
            name: string;
        } | null;
        user: {
            name: string;
        };
    }>;
    [key: string]: unknown;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard({ stats, lowStockProducts, lowStockRawMaterials, recentSales }: DashboardProps) {
    const formatCurrency = (amount: number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
        }).format(amount);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard - Toko Cat Lintex" />
            
            <div className="p-6 space-y-6">
                {/* Welcome Header */}
                <div className="mb-8">
                    <h1 className="text-3xl font-bold text-gray-900 dark:text-white">
                        🎨 Dashboard Toko Cat Lintex
                    </h1>
                    <p className="text-gray-600 dark:text-gray-400 mt-2">
                        Ringkasan operasional toko cat hari ini
                    </p>
                </div>

                {/* Stats Cards */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div className="flex items-center">
                            <div className="text-3xl mr-4">💰</div>
                            <div>
                                <h3 className="text-sm font-medium text-gray-500 dark:text-gray-400">Penjualan Hari Ini</h3>
                                <p className="text-2xl font-bold text-green-600 dark:text-green-400">
                                    {formatCurrency(stats.todaySales)}
                                </p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">
                                    {stats.todaySalesCount} transaksi
                                </p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div className="flex items-center">
                            <div className="text-3xl mr-4">📊</div>
                            <div>
                                <h3 className="text-sm font-medium text-gray-500 dark:text-gray-400">Penjualan Bulan Ini</h3>
                                <p className="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                    {formatCurrency(stats.monthSales)}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div className="flex items-center">
                            <div className="text-3xl mr-4">📦</div>
                            <div>
                                <h3 className="text-sm font-medium text-gray-500 dark:text-gray-400">Total Stok Produk</h3>
                                <p className="text-2xl font-bold text-purple-600 dark:text-purple-400">
                                    {stats.totalProducts.toLocaleString('id-ID')}
                                </p>
                                <p className="text-sm text-gray-500 dark:text-gray-400">
                                    {stats.totalProductTypes} jenis produk
                                </p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div className="flex items-center">
                            <div className="text-3xl mr-4">👥</div>
                            <div>
                                <h3 className="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pelanggan</h3>
                                <p className="text-2xl font-bold text-orange-600 dark:text-orange-400">
                                    {stats.totalCustomers.toLocaleString('id-ID')}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Alert Section - Low Stock */}
                {(lowStockProducts.length > 0 || lowStockRawMaterials.length > 0) && (
                    <div className="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-xl p-6">
                        <h2 className="text-lg font-semibold text-yellow-800 dark:text-yellow-200 mb-4 flex items-center">
                            ⚠️ Peringatan Stok Menipis
                        </h2>
                        
                        <div className="grid md:grid-cols-2 gap-6">
                            {lowStockProducts.length > 0 && (
                                <div>
                                    <h3 className="font-medium text-yellow-700 dark:text-yellow-300 mb-3">Produk Jadi</h3>
                                    <div className="space-y-2">
                                        {lowStockProducts.map((product) => (
                                            <div key={product.id} className="bg-white dark:bg-gray-800 rounded-lg p-3 border border-yellow-200 dark:border-yellow-700">
                                                <div className="flex justify-between items-center">
                                                    <div>
                                                        <p className="font-medium text-gray-900 dark:text-white">
                                                            {product.name} {product.color && `- ${product.color}`}
                                                        </p>
                                                        <p className="text-sm text-gray-500 dark:text-gray-400">
                                                            Kategori: {product.category.name}
                                                        </p>
                                                    </div>
                                                    <div className="text-right">
                                                        <p className="text-sm text-red-600 dark:text-red-400 font-medium">
                                                            {product.stock_current} / {product.stock_minimum}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            )}

                            {lowStockRawMaterials.length > 0 && (
                                <div>
                                    <h3 className="font-medium text-yellow-700 dark:text-yellow-300 mb-3">Bahan Baku</h3>
                                    <div className="space-y-2">
                                        {lowStockRawMaterials.map((material) => (
                                            <div key={material.id} className="bg-white dark:bg-gray-800 rounded-lg p-3 border border-yellow-200 dark:border-yellow-700">
                                                <div className="flex justify-between items-center">
                                                    <div>
                                                        <p className="font-medium text-gray-900 dark:text-white">
                                                            {material.name}
                                                        </p>
                                                        <p className="text-sm text-gray-500 dark:text-gray-400">
                                                            Supplier: {material.supplier?.name || 'Tidak ada'}
                                                        </p>
                                                    </div>
                                                    <div className="text-right">
                                                        <p className="text-sm text-red-600 dark:text-red-400 font-medium">
                                                            {material.stock_current} {material.unit}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            )}
                        </div>
                    </div>
                )}

                {/* Recent Sales */}
                <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h2 className="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        🧾 Transaksi Terbaru
                    </h2>
                    
                    {recentSales.length > 0 ? (
                        <div className="overflow-x-auto">
                            <table className="w-full">
                                <thead>
                                    <tr className="border-b border-gray-200 dark:border-gray-700">
                                        <th className="text-left py-3 px-4 font-medium text-gray-500 dark:text-gray-400">Invoice</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-500 dark:text-gray-400">Pelanggan</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-500 dark:text-gray-400">Tipe</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-500 dark:text-gray-400">Total</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-500 dark:text-gray-400">Kasir</th>
                                        <th className="text-left py-3 px-4 font-medium text-gray-500 dark:text-gray-400">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {recentSales.map((sale) => (
                                        <tr key={sale.id} className="border-b border-gray-100 dark:border-gray-700">
                                            <td className="py-3 px-4 font-mono text-sm">
                                                {sale.invoice_number}
                                            </td>
                                            <td className="py-3 px-4">
                                                {sale.customer?.name || 'Umum'}
                                            </td>
                                            <td className="py-3 px-4">
                                                <span className={`px-2 py-1 rounded-full text-xs font-medium ${
                                                    sale.sale_type === 'retail' 
                                                        ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400'
                                                        : 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400'
                                                }`}>
                                                    {sale.sale_type === 'retail' ? 'Retail' : 'Grosir'}
                                                </span>
                                            </td>
                                            <td className="py-3 px-4 font-medium">
                                                {formatCurrency(sale.total)}
                                            </td>
                                            <td className="py-3 px-4">
                                                {sale.user.name}
                                            </td>
                                            <td className="py-3 px-4 text-gray-500 dark:text-gray-400 text-sm">
                                                {new Date(sale.created_at).toLocaleString('id-ID')}
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    ) : (
                        <div className="text-center py-8 text-gray-500 dark:text-gray-400">
                            <div className="text-6xl mb-4">📊</div>
                            <p>Belum ada transaksi hari ini</p>
                        </div>
                    )}
                </div>

                {/* Quick Actions */}
                <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h2 className="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        ⚡ Aksi Cepat
                    </h2>
                    
                    <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <button className="flex flex-col items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800 hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                            <div className="text-2xl mb-2">🛒</div>
                            <span className="text-sm font-medium text-blue-700 dark:text-blue-300">Transaksi Baru</span>
                        </button>
                        
                        <button className="flex flex-col items-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800 hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                            <div className="text-2xl mb-2">📦</div>
                            <span className="text-sm font-medium text-green-700 dark:text-green-300">Kelola Stok</span>
                        </button>
                        
                        <button className="flex flex-col items-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg border border-purple-200 dark:border-purple-800 hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors">
                            <div className="text-2xl mb-2">👥</div>
                            <span className="text-sm font-medium text-purple-700 dark:text-purple-300">Data Pelanggan</span>
                        </button>
                        
                        <button className="flex flex-col items-center p-4 bg-orange-50 dark:bg-orange-900/20 rounded-lg border border-orange-200 dark:border-orange-800 hover:bg-orange-100 dark:hover:bg-orange-900/30 transition-colors">
                            <div className="text-2xl mb-2">📊</div>
                            <span className="text-sm font-medium text-orange-700 dark:text-orange-300">Laporan</span>
                        </button>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}