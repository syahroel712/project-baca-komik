<x-layouts.app>
    <!-- Breadcrumb -->
    <div
        class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 w-full transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400">Home</a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <span class="text-gray-900 dark:text-white font-medium">404 Not Found</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="flex flex-col items-center justify-center flex-1 text-center py-16">
        <h1 class="text-6xl font-extrabold text-gray-900 dark:text-white mb-4">404</h1>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Oops! Halaman tidak ditemukan</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-6">
            Maaf, halaman yang kamu cari tidak tersedia atau mungkin sudah dihapus.
        </p>
        <a href="{{ route('home') }}"
            class="px-6 py-3 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-colors">
            Kembali ke Beranda
        </a>

    </section>
</x-layouts.app>
