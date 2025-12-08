<div>
    <!-- Breadcrumb -->
    <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400">Home</a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <span class="text-gray-900 dark:text-white font-medium">Contact Us</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-4">Kontak Kami</h1>
                <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
                    Ada pertanyaan, saran, atau ingin bekerja sama? Kirim pesan kepada kami!
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Info -->
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <i class="fas fa-envelope text-red-600 text-2xl mt-1"></i>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Email</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">support@mambaco.com</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <i class="fas fa-phone text-red-600 text-2xl mt-1"></i>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Telepon</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">+62 812 3456 7890</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <i class="fas fa-map-marker-alt text-red-600 text-2xl mt-1"></i>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Alamat</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <livewire:contact-form />

            </div>
        </div>
    </section>
</div>
