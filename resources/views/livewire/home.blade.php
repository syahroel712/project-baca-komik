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
                        <a href="{{ route('comic.show', $item->slug) }}">
                            <div class="flex-shrink-0 w-40 md:w-48 group cursor-pointer">
                                <div
                                    class="relative rounded-xl overflow-hidden shadow-lg transform transition-all duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                                    <img src="{{ $item->cover ? asset('storage/' . $item->cover) : 'https://picsum.photos/800/400?random=' . $loop->index }}"
                                        alt="Komik" class="w-full h-56 md:h-64 object-cover">
                                    <div
                                        class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                        <i class="fas fa-fire mr-1"></i>HOT
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>
                                <h3 class="mt-3 font-semibold text-sm text-gray-900 dark:text-white truncate">
                                    {{ $item->title }}</h3>
                                <div class="flex items-center mt-1 text-xs text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span>4.8</span>
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

                    <!-- Pagination -->
                    {{-- <div class="mt-8 flex justify-center items-center space-x-2">
                        <button
                            class="w-10 h-10 flex items-center justify-center border border-gray-200 dark:border-gray-700 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-300">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button
                            class="w-10 h-10 flex items-center justify-center bg-red-600 text-white rounded-lg font-semibold">1</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center border border-gray-200 dark:border-gray-700 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-300">2</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center border border-gray-200 dark:border-gray-700 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-300">3</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center border border-gray-200 dark:border-gray-700 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-300">4</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center border border-gray-200 dark:border-gray-700 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-300">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div> --}}

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
    </script>
@endpush
