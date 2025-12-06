<div>
    <!-- Breadcrumb -->
    <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700  transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400">Home</a>

                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>

                {{-- <a href="
                {{ route('genre.show', $comic->genre->slug ?? '#') }}
                 "
                    class="text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400">
                    {{ $comic->genre->name ?? '-' }}
                </a> --}}

                {{-- <i class="fas fa-chevron-right text-gray-400 text-xs"></i> --}}

                <span class="text-gray-900 dark:text-white font-medium">
                    {{ $comic->title }}
                </span>
            </div>
        </div>
    </div>

    <!-- Comic Detail Section -->
    <section class="py-8 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cover & Actions -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        <!-- Cover Image -->
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl mb-4 group">
                            <img src="{{ asset('storage/' . $comic->cover) }}" alt="{{ $comic->title }}"
                                class="w-full h-auto transform group-hover:scale-105 transition-transform duration-500">
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            @if ($comic->chapters->count())
                                <a href="
                                {{-- {{ route('chapter.show', [$comic->slug, $comic->chapters->last()->order]) }} --}}
                                "
                                    class="block text-center w-full py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-book-reader mr-2"></i>
                                    Baca Chapter {{ $comic->chapters->last()->order }}
                                </a>
                            @endif

                            <button
                                class="w-full py-3 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-300">
                                <i class="fas fa-play mr-2"></i>Lanjut Baca Ch. 45
                            </button>
                            <div class="grid grid-cols-2 gap-3">
                                <button id="bookmarkBtn"
                                    class="py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-900/20 dark:hover:text-red-400 transition-all duration-300">
                                    <i class="fas fa-bookmark mr-2"></i>Simpan
                                </button>
                                <button
                                    class="py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-900/20 dark:hover:text-red-400 transition-all duration-300">
                                    <i class="fas fa-share-alt mr-2"></i>Bagikan
                                </button>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="mt-6 grid grid-cols-3 gap-4">
                            <div class="text-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                                <div wire:click="like" class="text-2xl font-bold text-red-600 dark:text-red-400">
                                    {{ $comic->likes }}</div>
                                <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Likes</div>
                            </div>

                            <div class="text-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                                <div class="text-2xl font-bold text-red-600 dark:text-red-400">
                                    {{ $comic->chapters->count() }}</div>
                                <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Chapters</div>
                            </div>

                            <div class="text-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                                <div class="text-2xl font-bold text-red-600 dark:text-red-400">
                                    {{ number_format($comic->views) }}</div>
                                <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Views</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Info -->
                <div class="lg:col-span-2">
                    <!-- Title & Info -->
                    <div class="mb-6">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-3">
                            {{ $comic->title }}</h1>
                        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-600 dark:text-gray-400 mb-4">
                            <span class="flex items-center">
                                <i class="fas fa-user mr-2 text-red-600 dark:text-red-400"></i>
                                <strong class="mr-1">Author:</strong> {{ $comic->author }}
                            </span>
                            {{-- <span>•</span>
                            <span class="flex items-center">
                                <i class="fas fa-pencil-alt mr-2 text-red-600 dark:text-red-400"></i>
                                <strong class="mr-1">Artist:</strong> DUBU (Redice Studio)
                            </span> --}}
                            <span>•</span>
                            <span class="flex items-center">
                                <i class="fas fa-clock mr-2 text-red-600 dark:text-red-400"></i>
                                <strong class="mr-1">Status:</strong> {{ $comic->status }}
                            </span>
                        </div>

                        <!-- Rating -->
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400 text-lg"></i>
                                <i class="fas fa-star text-yellow-400 text-lg"></i>
                                <i class="fas fa-star text-yellow-400 text-lg"></i>
                                <i class="fas fa-star text-yellow-400 text-lg"></i>
                                <i class="fas fa-star text-yellow-400 text-lg"></i>
                            </div>
                            <span class="text-2xl font-bold text-gray-900 dark:text-white">4.9</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">(
                                {{ number_format($comic->views) }} views)</span>
                        </div>

                        <!-- Genre Tags -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($comic->genres as $genre)
                                <span
                                    class="px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 text-sm font-semibold rounded-lg">
                                    {{ $genre->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Synopsis -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-align-left text-red-600 dark:text-red-400 mr-2"></i>
                            Sinopsis
                        </h2>
                        <div class="prose dark:prose-invert max-w-none">
                            {{ $comic->description }}
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        {{-- <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                            <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Tipe</div>
                            <div class="text-base font-semibold text-gray-900 dark:text-white">Manhwa (Korean)</div>
                        </div> --}}
                        <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                            <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Tahun Rilis</div>
                            <div class="text-base font-semibold text-gray-900 dark:text-white">
                                {{ \Carbon\Carbon::parse($comic->released_at)->format('Y') }}</div>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                            <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Update Terakhir</div>
                            <div class="text-base font-semibold text-gray-900 dark:text-white">
                                {{ $comic->chapters->sortByDesc('created_at')->first()?->created_at->diffForHumans() ?? 'Belum ada chapter' }}
                            </div>
                        </div>
                        {{-- <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                            <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Total Pembaca</div>
                            <div class="text-base font-semibold text-gray-900 dark:text-white">5.2 Juta</div>
                        </div> --}}
                    </div>

                    <!-- Chapter List -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                <i class="fas fa-list text-red-600 dark:text-red-400 mr-2"></i>
                                Daftar Chapter
                            </h2>
                            <div class="flex items-center space-x-2">
                                <button id="sortBtn"
                                    class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-300">
                                    <i class="fas fa-sort mr-2"></i>Urutkan
                                </button>
                            </div>
                        </div>

                        <div
                            class="bg-gray-50 dark:bg-gray-700/30 rounded-xl p-4 space-y-2 max-h-[600px] overflow-y-auto">
                            @foreach ($comic->chapters as $ch)
                                <a href="{{ route('reader', [$comic->slug, $ch->number]) }}"
                                    class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/10 hover:border-red-200 dark:hover:border-red-800 border border-gray-200 dark:border-gray-700 transition-all duration-300 group">
                                    <div class="flex items-center space-x-4 flex-1">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <span class="text-white font-bold text-sm">{{ $ch->number }}</span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3
                                                class="font-semibold text-gray-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors truncate">
                                                {{ $ch->title }}</h3>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                                {{ $ch->created_at->diffForHumans() ?? 'Belum ada chapter' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3 ml-4">
                                        <span
                                            class="hidden sm:inline-block px-3 py-1 bg-green-100 dark:bg-green-900/20 text-green-600 dark:text-green-400 text-xs font-semibold rounded-full">NEW</span>
                                        <i
                                            class="fas fa-chevron-right text-gray-400 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors"></i>
                                    </div>
                                </a>
                            @endforeach
                            <!-- More chapters indicator -->
                            <div class="text-center py-4">
                                <button
                                    class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all duration-300">
                                    <i class="fas fa-angle-down mr-2"></i>Muat Lebih Banyak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Komik Serupa -->
    <section class="py-12 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Komik Serupa</h2>
                <a href="{{ route('comic') }}"
                    class="text-red-600 dark:text-red-400 font-semibold text-sm hover:underline">
                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i></a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach ($similarComics as $item)
                    <div class="group cursor-pointer">
                        <a href="{{ route('comic.show', $item->slug) }}">
                            <div
                                class="relative rounded-xl overflow-hidden shadow-md transform transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">
                                <img src="{{ asset('storage/' . $item->cover) }}" class="w-full h-56 object-cover">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                                    <button
                                        class="w-full py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition-colors">
                                        Lihat
                                    </button>
                                </div>
                            </div>
                            <h3 class="mt-3 font-semibold text-sm text-gray-900 dark:text-white line-clamp-1">
                                {{ $item->title }}</h3>
                            <div class="flex items-center mt-1 text-xs text-gray-600 dark:text-gray-400">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                <span>4.8</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
