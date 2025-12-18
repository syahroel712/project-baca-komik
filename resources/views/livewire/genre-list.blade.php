<div>
    <!-- Breadcrumb -->
    <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-red-500 transition">
                    Home
                </a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <span class="text-gray-900 dark:text-white font-semibold">
                    Genre
                </span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Title -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Temukan komik berdasarkan genre favoritmu
                </h1>
                <p class="text-gray-500 dark:text-gray-400 mt-2">
                </p>
            </div>

            <!-- Genre Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach ($genres as $genre)
                    <a href="{{ route('comic', ['allGenres' => [$genre->id]]) }}"
                        class="group relative overflow-hidden rounded-2xl bg-white dark:bg-gray-800 p-6 shadow-md hover:shadow-xl transition-all duration-300">

                        <!-- Gradient Hover Effect -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-transparent opacity-0 group-hover:opacity-100 transition">
                        </div>

                        <!-- Content -->
                        <div class="relative z-10">
                            <!-- Genre Name -->
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-red-500 transition">
                                {{ $genre->name }}
                            </h3>

                            <!-- Description -->
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 line-clamp-5">
                                {{ $genre->description }}
                            </p>

                            <!-- Footer -->
                            <div class="mt-4 flex items-center justify-between">
                                <span
                                    class="inline-flex items-center gap-1 text-xs font-medium px-3 py-1 rounded-full bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400">
                                    📚 {{ $genre->comics_count }} Komik
                                </span>

                                <span class="text-xs text-gray-400 group-hover:text-red-500 transition">
                                    Lihat →
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
