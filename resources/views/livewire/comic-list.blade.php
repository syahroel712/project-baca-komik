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

    <!-- Main Content & Sidebar -->
    <section class="py-12 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Semua Komik</h2>
                        <select
                            class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm focus:ring-2 focus:ring-red-500 transition-all duration-300">
                            <option>Terbaru</option>
                            <option>Terpopuler</option>
                            <option>Rating Tertinggi</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <!-- Comic Card 1 -->
                        @forelse($comics as $item)
                            <a href="{{ route('comic.show', $item->slug) }}">
                                <div class="group cursor-pointer">
                                    <div
                                        class="relative rounded-xl overflow-hidden shadow-md transform transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">
                                        <img src="{{ $item->cover ? asset('storage/' . $item->cover) : 'https://picsum.photos/800/400?random=' . $loop->index }}"
                                            alt="Komik" class="w-full h-60 object-cover">
                                        <div
                                            class="absolute top-2 left-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-md">
                                            NEW
                                        </div>
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                                            <button
                                                class="w-full py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition-colors">
                                                Baca
                                            </button>
                                        </div>
                                    </div>
                                    <h3 class="mt-3 font-semibold text-sm text-gray-900 dark:text-white line-clamp-1">
                                        {{ $item->title }}</h3>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Chapter
                                        {{ $item->chapters_count }}</p>
                                    <div class="flex items-center mt-2">
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        <span class="text-xs text-gray-600 dark:text-gray-400 ml-1 mr-2">4.9</span>
                                        <i class="fas fa-eye text-gray-400  text-xs"></i>
                                        <span class="text-xs text-gray-600 dark:text-gray-400 ml-1 mr-2">
                                            {{ $item->views }}
                                        </span>
                                        <i class="fas fa-heart text-red-500 text-xs"></i>
                                        <span class="text-xs text-gray-600 dark:text-gray-400 ml-1">
                                            {{ $item->likes }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $comics->links() }}
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Trending Today -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 mb-6 transition-colors duration-300">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-fire text-red-600 mr-2"></i>
                            Trending Hari Ini
                        </h3>
                        <div class="space-y-4">
                            @foreach ($top as $item)
                                <div class="flex space-x-3 group cursor-pointer">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $item->cover ? asset('storage/' . $item->cover) : 'https://picsum.photos/800/400?random=' . $loop->index }}"
                                            alt="Komik"
                                            class="w-16 h-20 rounded-lg object-cover group-hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <a href="{{ route('comic.show', $item->slug) }}">
                                            <h4
                                                class="text-sm font-semibold text-gray-900 dark:text-white line-clamp-2 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">
                                                {{ $item->title }}</h4>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Chapter
                                                {{ $item->chapters_count }}</p>
                                            <div class="flex items-center mt-2">
                                                <i class="fas fa-star text-yellow-400 text-xs"></i>
                                                <span class="text-xs text-gray-600 dark:text-gray-400 ml-1">4.9</span>
                                                <span class="text-xs text-gray-400 mx-2">•</span>
                                                <i class="fas fa-eye text-gray-400 text-xs"></i>
                                                <span
                                                    class="text-xs text-gray-600 dark:text-gray-400 ml-1">{{ $item->views }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Genre -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 transition-colors duration-300">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-tags text-red-600 mr-2"></i>
                            Genre Populer
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($genres as $item)
                                <a href="#"
                                    class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-full hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-900/20 dark:hover:text-red-400 transition-all duration-300">{{ $item->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
