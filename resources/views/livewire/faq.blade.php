<div>
    <!-- Breadcrumb -->
    <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400">Home</a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <span class="text-gray-900 dark:text-white font-medium">FAQ</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-6">Pertanyaan yang Sering
                Diajukan (FAQ)</h1>
            <p class="text-gray-600 dark:text-gray-400 mb-8">
                Berikut beberapa pertanyaan yang sering diajukan oleh pengguna Mambaco. Jika pertanyaan Anda tidak
                tercantum, silakan <a href="{{ route('contact') }}"
                    class="text-red-600 dark:text-red-400 font-semibold hover:underline">hubungi kami</a>.
            </p>

            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <button
                        class="w-full text-left px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 flex justify-between items-center faq-btn">
                        <span class="font-semibold text-gray-900 dark:text-white">Bagaimana cara membaca komik di
                            Mambaco?</span>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div
                        class="px-6 py-4 bg-white dark:bg-gray-900 hidden faq-content text-gray-600 dark:text-gray-400">
                        Anda dapat membaca komik dengan mengunjungi halaman komik dan menggulir ke bawah untuk membaca
                        setiap halaman.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <button
                        class="w-full text-left px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 flex justify-between items-center faq-btn">
                        <span class="font-semibold text-gray-900 dark:text-white">Apakah Mambaco gratis?</span>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div
                        class="px-6 py-4 bg-white dark:bg-gray-900 hidden faq-content text-gray-600 dark:text-gray-400">
                        Ya, semua komik dapat dibaca secara gratis tanpa perlu mendaftar akun.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <button
                        class="w-full text-left px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 flex justify-between items-center faq-btn">
                        <span class="font-semibold text-gray-900 dark:text-white">Bagaimana cara menghubungi tim
                            Mambaco?</span>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div
                        class="px-6 py-4 bg-white dark:bg-gray-900 hidden faq-content text-gray-600 dark:text-gray-400">
                        Anda dapat menghubungi kami melalui halaman <a href="{{ route('contact') }}"
                            class="text-red-600 dark:text-red-400 font-semibold hover:underline">kontak</a>.
                    </div>
                </div>

                <!-- Tambahkan FAQ lainnya sesuai kebutuhan -->
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            // Accordion FAQ
            document.querySelectorAll('.faq-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const content = btn.nextElementSibling;
                    const icon = btn.querySelector('i');
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                });
            });
        </script>
    @endpush
</div>
