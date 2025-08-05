import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Toko Cat Lintex - Sistem Manajemen Toko Cat">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col items-center bg-gradient-to-br from-blue-50 to-indigo-100 p-6 text-gray-800 lg:justify-center lg:p-8 dark:from-gray-900 dark:to-gray-800 dark:text-gray-200">
                <header className="mb-6 w-full max-w-[335px] lg:max-w-6xl">
                    <nav className="flex items-center justify-end gap-4">
                        {auth.user ? (
                            <Link
                                href={route('dashboard')}
                                className="inline-block rounded-lg border border-blue-200 bg-blue-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-blue-700 transition-colors shadow-md"
                            >
                                🏠 Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link
                                    href={route('login')}
                                    className="inline-block rounded-lg border border-gray-300 px-5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700"
                                >
                                    Masuk
                                </Link>
                                <Link
                                    href={route('register')}
                                    className="inline-block rounded-lg border border-blue-600 bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700 transition-colors shadow-md"
                                >
                                    Daftar
                                </Link>
                            </>
                        )}
                    </nav>
                </header>
                
                <div className="flex w-full items-center justify-center lg:grow">
                    <main className="flex w-full max-w-6xl flex-col lg:flex-row lg:gap-12">
                        {/* Hero Section */}
                        <div className="flex-1 text-center lg:text-left">
                            <div className="mb-8">
                                <h1 className="mb-4 text-4xl font-bold text-gray-900 lg:text-6xl dark:text-white">
                                    🎨 <span className="text-blue-600">Toko Cat Lintex</span>
                                </h1>
                                <p className="text-xl text-gray-600 lg:text-2xl dark:text-gray-300">
                                    Sistem Manajemen Toko Cat Profesional
                                </p>
                                <p className="mt-3 text-lg text-gray-500 dark:text-gray-400">
                                    Kelola inventori, penjualan, dan laporan dengan mudah dan efisien
                                </p>
                            </div>

                            {/* Features Grid */}
                            <div className="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div className="rounded-xl bg-white p-6 shadow-lg dark:bg-gray-800">
                                    <div className="mb-3 text-3xl">📦</div>
                                    <h3 className="mb-2 font-semibold text-gray-900 dark:text-white">Manajemen Inventori</h3>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">
                                        Kelola stok bahan baku dan produk jadi dengan notifikasi stok menipis otomatis
                                    </p>
                                </div>

                                <div className="rounded-xl bg-white p-6 shadow-lg dark:bg-gray-800">
                                    <div className="mb-3 text-3xl">💰</div>
                                    <h3 className="mb-2 font-semibold text-gray-900 dark:text-white">Sistem Penjualan</h3>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">
                                        Proses transaksi retail & grosir dengan cetak struk dan invoice otomatis
                                    </p>
                                </div>

                                <div className="rounded-xl bg-white p-6 shadow-lg dark:bg-gray-800">
                                    <div className="mb-3 text-3xl">📊</div>
                                    <h3 className="mb-2 font-semibold text-gray-900 dark:text-white">Laporan Keuangan</h3>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">
                                        Analisis penjualan, keuntungan, dan laporan stok harian, bulanan, tahunan
                                    </p>
                                </div>

                                <div className="rounded-xl bg-white p-6 shadow-lg dark:bg-gray-800">
                                    <div className="mb-3 text-3xl">🔄</div>
                                    <h3 className="mb-2 font-semibold text-gray-900 dark:text-white">Sistem Retur</h3>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">
                                        Proses retur barang dengan otomatis mengembalikan stok ke inventori
                                    </p>
                                </div>
                            </div>

                            {/* CTA Buttons */}
                            <div className="mt-8 flex flex-col gap-4 sm:flex-row sm:justify-center lg:justify-start">
                                {auth.user ? (
                                    <Link
                                        href={route('dashboard')}
                                        className="inline-flex items-center justify-center rounded-lg bg-blue-600 px-8 py-3 text-lg font-medium text-white hover:bg-blue-700 transition-colors shadow-lg"
                                    >
                                        🚀 Buka Dashboard
                                    </Link>
                                ) : (
                                    <>
                                        <Link
                                            href={route('register')}
                                            className="inline-flex items-center justify-center rounded-lg bg-blue-600 px-8 py-3 text-lg font-medium text-white hover:bg-blue-700 transition-colors shadow-lg"
                                        >
                                            🔥 Mulai Sekarang
                                        </Link>
                                        <Link
                                            href={route('login')}
                                            className="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-8 py-3 text-lg font-medium text-gray-700 hover:bg-gray-50 transition-colors shadow-md dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700"
                                        >
                                            📝 Masuk ke Akun
                                        </Link>
                                    </>
                                )}
                            </div>
                        </div>

                        {/* Visual/Dashboard Preview */}
                        <div className="mt-12 flex-1 lg:mt-0">
                            <div className="rounded-2xl bg-white p-8 shadow-2xl dark:bg-gray-800">
                                <div className="mb-6">
                                    <h3 className="text-lg font-semibold text-gray-900 dark:text-white">📈 Dashboard Preview</h3>
                                </div>
                                
                                {/* Mock Dashboard Cards */}
                                <div className="grid grid-cols-2 gap-4 mb-6">
                                    <div className="rounded-lg bg-green-50 p-4 border border-green-200 dark:bg-green-900/20 dark:border-green-800">
                                        <div className="text-sm text-green-600 dark:text-green-400">Penjualan Hari Ini</div>
                                        <div className="text-2xl font-bold text-green-700 dark:text-green-300">Rp 2.450.000</div>
                                    </div>
                                    <div className="rounded-lg bg-blue-50 p-4 border border-blue-200 dark:bg-blue-900/20 dark:border-blue-800">
                                        <div className="text-sm text-blue-600 dark:text-blue-400">Stok Produk</div>
                                        <div className="text-2xl font-bold text-blue-700 dark:text-blue-300">1,247 item</div>
                                    </div>
                                </div>

                                {/* Mock Chart Area */}
                                <div className="rounded-lg bg-gray-50 p-6 dark:bg-gray-700">
                                    <div className="mb-3 text-sm font-medium text-gray-600 dark:text-gray-400">Grafik Penjualan Mingguan</div>
                                    <div className="flex items-end gap-2 h-24">
                                        {[40, 65, 45, 80, 55, 70, 85].map((height, i) => (
                                            <div 
                                                key={i} 
                                                className="bg-blue-500 rounded-t flex-1 transition-all hover:bg-blue-600" 
                                                style={{ height: `${height}%` }}
                                            ></div>
                                        ))}
                                    </div>
                                </div>

                                {/* Mock Recent Activity */}
                                <div className="mt-6">
                                    <div className="text-sm font-medium text-gray-600 mb-3 dark:text-gray-400">Aktivitas Terbaru</div>
                                    <div className="space-y-2">
                                        <div className="flex items-center gap-3 text-sm">
                                            <div className="w-2 h-2 bg-green-500 rounded-full"></div>
                                            <span className="text-gray-600 dark:text-gray-400">Penjualan Cat Dulux 5kg - Rp 450.000</span>
                                        </div>
                                        <div className="flex items-center gap-3 text-sm">
                                            <div className="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                            <span className="text-gray-600 dark:text-gray-400">Stok Thinner menipis - 5 liter tersisa</span>
                                        </div>
                                        <div className="flex items-center gap-3 text-sm">
                                            <div className="w-2 h-2 bg-blue-500 rounded-full"></div>
                                            <span className="text-gray-600 dark:text-gray-400">Restock Cat Nippon 20kg - 50 unit</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>

                {/* Footer */}
                <footer className="mt-12 text-center text-sm text-gray-500 dark:text-gray-400">
                    <p>© 2024 Toko Cat Lintex - Sistem Manajemen Toko Cat Professional</p>
                    <p className="mt-1">
                        Dibuat dengan ❤️ menggunakan{" "}
                        <span className="font-medium text-blue-600 dark:text-blue-400">Laravel + React + Inertia.js</span>
                    </p>
                </footer>
            </div>
        </>
    );
}