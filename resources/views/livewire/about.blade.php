<div>
    <!-- Breadcrumb -->
    <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700  transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400">Home</a>

                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>

                <span class="text-gray-900 dark:text-white font-medium">
                    Comic
                </span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-6">Tentang Mambaco</h1>
            <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-12">
                Mambaco hadir sebagai platform baca komik online yang mudah, cepat, dan gratis.
                Kami menyediakan berbagai judul komik dari berbagai genre, dengan tampilan yang nyaman
                baik di desktop maupun mobile. Nikmati pengalaman membaca komik favoritmu kapan saja!
            </p>

            <!-- Team / Mission Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 transition-colors duration-300">
                    <i class="fas fa-bolt text-red-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Cepat & Responsif</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Halaman dan komik kami dimuat dengan cepat agar pengalaman membaca tetap lancar.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 transition-colors duration-300">
                    <i class="fas fa-heart text-red-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Gratis untuk Semua</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Semua komik tersedia gratis. Nikmati tanpa batas, tanpa perlu langganan.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 transition-colors duration-300">
                    <i class="fas fa-users text-red-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Komunitas</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Bergabung dengan komunitas pembaca komik, berbagi rekomendasi, dan temukan teman baru!
                    </p>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-16">
                <a href="{{ route('home') }}"
                    class="px-8 py-4 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-colors">
                    Mulai Baca Komik
                </a>
            </div>
        </div>
    </section>

</div>
