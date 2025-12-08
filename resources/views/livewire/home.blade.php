@php
    function formatCount($number)
    {
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'K';
        }
        return $number;
    }

    $typeColors = [
        'manga' => 'bg-red-500',
        'manhwa' => 'bg-yellow-500',
        'manhua' => 'bg-green-500',
        'series' => 'bg-blue-500',
        'oneshot' => 'bg-purple-500',
    ];
@endphp
<div>
    <!-- Hero Carousel -->
    <section class="relative h-[500px] overflow-hidden bg-gray-900">
        <div id="carousel" class="relative h-full">
            @forelse($carousel as $item)
                <div class="carousel-item absolute inset-0 transition-opacity duration-700 opacity-100">
                    <img src="{{ $item->cover ? asset('storage/' . $item->cover) : 'https://picsum.photos/800/400?random=' . $loop->index }}"
                        alt="{{ $item->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 gradient-overlay"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12">
                        <div class="max-w-7xl mx-auto">
                            <span
                                class="inline-block px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded-full mb-3">Komik
                                Minggu Ini</span>
                            <h2 class="text-3xl md:text-5xl font-bold text-white mb-3">{{ $item->title }}</h2>
                            <p class="text-gray-200 text-sm md:text-base mb-4 max-w-2xl">
                                {{ Str::limit($item->description, 100) }}</p>
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('comic.show', $item->slug) }}"
                                    class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-book-reader mr-2"></i>Baca Sekarang
                                </a>
                                {{-- <button
                                    class="px-6 py-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white font-semibold rounded-lg transition-all duration-300">
                                    <i class="fas fa-info-circle mr-2"></i>Detail
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Carousel Controls -->
        <button id="prevSlide"
            class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-full transition-all duration-300 flex items-center justify-center">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button id="nextSlide"
            class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-full transition-all duration-300 flex items-center justify-center">
            <i class="fas fa-chevron-right"></i>
        </button>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
            <button class="carousel-indicator w-2 h-2 bg-white rounded-full transition-all duration-300"></button>
            <button class="carousel-indicator w-2 h-2 bg-white/50 rounded-full transition-all duration-300"></button>
            <button class="carousel-indicator w-2 h-2 bg-white/50 rounded-full transition-all duration-300"></button>
        </div>
    </section>

    <!-- Komik Populer Section -->
    <section class="py-12 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Komik Populer</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Komik paling banyak dibaca minggu ini</p>
                </div>
                <a href="{{ route('comic') }}"
                    class="text-red-600 dark:text-red-400 font-semibold text-sm hover:underline">
                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i></a>
            </div>

            <!-- Horizontal Scroll -->
            <div class="relative">
                <div id="popularScroll" class="flex space-x-4 overflow-x-auto scrollbar-hide pb-4">
                    @foreach ($popular as $item)
                        @php
                            // Ambil type comic
                            $type = $item->type ?? 'Unknown';
                        @endphp
                        <a href="{{ route('comic.show', $item->slug) }}">
                            <div class="shrink-0 w-40 md:w-48 group cursor-pointer">
                                <div
                                    class="relative rounded-xl overflow-hidden shadow-lg transform transition-all duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                                    <img src="{{ $item->cover ? asset('storage/' . $item->cover) : 'https://picsum.photos/800/400?random=' . $loop->index }}"
                                        alt="Komik" class="w-full h-56 md:h-64 object-cover">
                                    <div
                                        class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                        <i class="fas fa-fire mr-1"></i>HOT
                                    </div>
                                    <!-- TYPE di kanan atas -->
                                    @php

                                        $typeClass = $typeColors[$type] ?? 'bg-gray-500';
                                    @endphp
                                    @if ($type)
                                        <div
                                            class="absolute top-2 right-2 z-20 text-white text-xs font-bold px-2 py-1 rounded-full {{ $typeClass }}">
                                            {{ strtoupper($type) }}
                                        </div>
                                    @endif
                                    <div
                                        class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>
                                <h3 class="mt-3 font-semibold text-sm text-gray-900 dark:text-white truncate">
                                    {{ $item->title }}</h3>
                                <div class="flex items-center mt-1 text-xs text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span>{{ $item->rating }}</span>
                                    <span class="mx-2">•</span>
                                    <span>Ch. {{ $item->chapters_count }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Scroll Buttons -->
                <button id="scrollLeft"
                    class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-white dark:bg-gray-700 shadow-lg text-gray-700 dark:text-gray-300 rounded-full items-center justify-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-300">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="scrollRight"
                    class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-white dark:bg-gray-700 shadow-lg text-gray-700 dark:text-gray-300 rounded-full items-center justify-center hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-300">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Main Content & Sidebar -->
    <section class="py-12 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Main Content -->
                <div class="lg:col-span-2 overflow-visible"> {{-- ← FIX NEW --}}

                    <div class="flex flex-wrap gap-2 items-center mb-6">

                        <!-- Sort -->
                        <select wire:model="sort"
                            class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm focus:ring-2 focus:ring-red-500 transition-all duration-300">
                            <option value="">Sort</option>
                            <option value="latest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="rating">Rating Tertinggi</option>
                        </select>

                        <!-- Genre Multi-Select (Alpine.js) -->
                        <div x-data="multiSelect(@entangle('allGenres'))" class="relative w-48 z-[99999]">

                            <!-- Trigger -->
                            <div @click="open = !open" tabindex="0"
                                class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm cursor-pointer flex justify-between items-center focus:ring-2 focus:ring-red-500 transition-all duration-300">
                                <span class="truncate max-w-[160px]" x-text="selectedText()"></span>
                                <i class="fas fa-chevron-down text-gray-400 ml-2"></i>
                            </div>

                            <!-- Dropdown -->
                            <div x-show="open" @click.outside="open = false"
                                class="absolute mt-1 w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-xl max-h-60 overflow-y-auto z-50">

                                <template x-for="option in options" :key="option.id">
                                    <div @click="toggle(option.id)"
                                        class="px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center"
                                        :class="selected.includes(option.id) ? 'bg-gray-200 dark:bg-gray-700' : ''">

                                        <input type="checkbox" :value="option.id" x-model="selected" class="mr-2">
                                        <!-- Truncate text di opsi -->
                                        <span class="truncate max-w-[120px]" x-text="option.name"></span>
                                    </div>
                                </template>

                            </div>

                        </div>

                        <!-- Status -->
                        <select wire:model="status"
                            class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm focus:ring-2 focus:ring-red-500 transition-all duration-300">
                            <option value="">Status</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="completed">Completed</option>
                            <option value="hiatus">Hiatus</option>
                        </select>

                        <!-- Type -->
                        <select wire:model="type"
                            class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm focus:ring-2 focus:ring-red-500 transition-all duration-300">
                            <option value="">Type</option>
                            <option value="manga">Manga</option>
                            <option value="manhwa">Manhwa</option>
                            <option value="manhua">Manhua</option>
                            <option value="series">Series</option>
                            <option value="oneshot">One Shot</option>
                        </select>

                        <!-- Search Button -->
                        <button wire:click="$refresh"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700 transition-colors">
                            Search
                        </button>
                    </div>

                    <div class="relative w-full min-h-[400px]">
                        <!-- Comics Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 overflow-visible">
                            {{-- ← FIX NEW --}}
                            @forelse($comics as $item)
                                @php
                                    $latestDate = $item->chapters->max('created_at') ?? $item->created_at;
                                    $isNew = $latestDate->isToday();
                                    $type = $item->type ?? 'Unknown';
                                @endphp

                                <a href="{{ route('comic.show', $item->slug) }}">
                                    <div class="group cursor-pointer">
                                        <div
                                            class="relative rounded-xl overflow-hidden shadow-md 
                                            transform transition-all duration-300
                                            group-hover:scale-105 group-hover:shadow-xl">

                                            <img src="{{ $item->cover ? asset('storage/' . $item->cover) : 'https://picsum.photos/800/400?random=' . $loop->index }}"
                                                alt="Komik" class="w-full h-60 object-cover">

                                            @if ($isNew)
                                                <div
                                                    class="absolute top-2 left-2 z-20 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                                    NEW
                                                </div>
                                            @endif

                                            @php
                                                $typeClass = $typeColors[$type] ?? 'bg-gray-500';
                                            @endphp

                                            @if ($type)
                                                <div
                                                    class="absolute top-2 right-2 z-20 text-white text-xs font-bold px-2 py-1 rounded-full {{ $typeClass }}">
                                                    {{ strtoupper($type) }}
                                                </div>
                                            @endif

                                            <div
                                                class="absolute inset-0 z-10 bg-gradient-to-t from-black/70 to-transparent opacity-0 
                                                group-hover:opacity-100 transition-opacity duration-300 
                                                flex items-end p-3">
                                                <button
                                                    class="w-full py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition-colors">
                                                    Baca
                                                </button>
                                            </div>
                                        </div>

                                        <h3
                                            class="mt-3 font-semibold text-sm text-gray-900 dark:text-white line-clamp-1">
                                            {{ $item->title }}</h3>
                                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                            Chapter {{ $item->chapters_count }}</p>
                                        <div class="flex items-center mt-2">
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                            <span class="text-xs text-gray-600 dark:text-gray-400 ml-1 mr-2">
                                                {{ $item->rating }}
                                            </span>
                                            <i class="fas fa-eye text-gray-400 text-xs"></i>
                                            <span class="text-xs text-gray-600 dark:text-gray-400 ml-1 mr-2">
                                                {{ formatCount($item->views) }}
                                            </span>
                                            <i class="fas fa-heart text-red-500 text-xs"></i>
                                            <span class="text-xs text-gray-600 dark:text-gray-400 ml-1">
                                                {{ formatCount($item->likes) }}
                                            </span>
                                        </div>
                                    </div>
                                </a>

                            @empty
                                <p class="text-gray-500 dark:text-gray-400">Tidak ada komik ditemukan.</p>
                            @endforelse
                        </div>
                        <!-- Loading overlay -->
                        <div wire:loading wire:target="search,sort,status,type,allGenres"
                            class="absolute inset-0 z-50 flex items-center justify-center bg-white/70 dark:bg-gray-800/70">
                            <div class="flex items-center justify-center mt-20">
                                <svg class="animate-spin h-10 w-10 text-red-500 dark:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $comics->links() }}
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Trending -->
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
                                                {{ $item->title }}
                                            </h4>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Chapter
                                                {{ $item->chapters_count }}</p>
                                            <div class="flex items-center mt-2">
                                                <i class="fas fa-star text-yellow-400 text-xs"></i>
                                                <span class="text-xs text-gray-600 dark:text-gray-400 ml-1">
                                                    {{ $item->rating }}
                                                </span>
                                                <span class="text-xs text-gray-400 mx-2">•</span>
                                                <i class="fas fa-eye text-gray-400 text-xs"></i>
                                                <span class="text-xs text-gray-600 dark:text-gray-400 ml-1">
                                                    {{ formatCount($item->views) }}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Genre Popular -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 transition-colors duration-300">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-tags text-red-600 mr-2"></i>
                            Genre Populer
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($genres as $item)
                                <a href="#"
                                    class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-full hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-900/20 dark:hover:text-red-400 transition-all duration-300">
                                    {{ $item->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        // Carousel
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const indicators = document.querySelectorAll('.carousel-indicator');
        const totalSlides = slides.length;

        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('opacity-100'));
            slides.forEach(slide => slide.classList.add('opacity-0'));
            indicators.forEach(ind => ind.classList.remove('bg-white'));
            indicators.forEach(ind => ind.classList.add('bg-white/50'));

            currentSlide = (n + totalSlides) % totalSlides;
            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');
            indicators[currentSlide].classList.remove('bg-white/50');
            indicators[currentSlide].classList.add('bg-white');
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        document.getElementById('nextSlide').addEventListener('click', nextSlide);
        document.getElementById('prevSlide').addEventListener('click', prevSlide);

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => showSlide(index));
        });

        // Auto-advance carousel
        setInterval(nextSlide, 5000);

        // Horizontal Scroll
        const popularScroll = document.getElementById('popularScroll');
        const scrollLeft = document.getElementById('scrollLeft');
        const scrollRight = document.getElementById('scrollRight');

        scrollLeft.addEventListener('click', () => {
            popularScroll.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        scrollRight.addEventListener('click', () => {
            popularScroll.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });


        function multiSelect(allGenres) {
            return {
                open: false,
                selected: allGenres || [], // ini akan otomatis sync ke Livewire
                options: @json($genres),

                toggle(id) {
                    if (!this.selected) this.selected = [];
                    if (this.selected.includes(id)) {
                        this.selected = this.selected.filter(i => i !== id);
                    } else {
                        this.selected.push(id);
                    }
                },

                selectedText() {
                    if (!this.selected || this.selected.length === 0) return "Genre";
                    return this.options
                        .filter(o => this.selected.includes(o.id))
                        .map(o => o.name)
                        .join(", ");
                }
            };
        }
    </script>
@endpush
