<div>
    <!-- Reader Header -->
    <div id="readerHeader"
        class="fixed left-0 right-0 z-50 bg-white dark:bg-gray-800  backdrop-blur-lg border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Left Section -->
                <div class="flex items-center space-x-4">
                    <div class="block md:block max-w-[150px] sm:max-w-xs"> <!-- batasi lebar -->
                        <h1
                            class="text-gray-900 dark:text-white font-semibold text-base md:text-base truncate overflow-hidden whitespace-nowrap">
                            {{ $chapter->comic->title }}
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400 text-xs truncate overflow-hidden whitespace-nowrap">
                            Chapter {{ $chapter->number }} : {{ $chapter->title }}
                        </p>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="flex items-center space-x-2">
                    <!-- Chapter Selector -->
                    <button id="chapterListBtn"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 text-gray-900 dark:text-white rounded-lg transition-all duration-300 flex items-center space-x-2">
                        <i class="fas fa-list"></i>
                        <span class="hidden sm:inline">Chapter</span>
                    </button>

                    <!-- Settings -->
                    <button id="settingsBtn"
                        class="w-10 h-10 flex items-center justify-center text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 rounded-lg transition-all duration-300">
                        <i class="fas fa-cog"></i>
                    </button>

                    <!-- Fullscreen -->
                    <button id="fullscreenBtn"
                        class="hidden md:flex w-10 h-10 items-center justify-center text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 rounded-lg transition-all duration-300">
                        <i class="fas fa-expand"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Chapter List Sidebar -->
    <div id="chapterSidebar"
        class="fixed top-0 right-0 h-full w-80 bg-white dark:bg-gray-900 border-l border-gray-200 dark:border-gray-700 shadow-2xl transform translate-x-full transition-transform duration-300 z-50 flex flex-col">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white">Daftar Chapter</h2>
            <button id="closeSidebar"
                class="w-8 h-8 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all duration-300">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Search Chapter -->
        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
            <div class="relative">
                <input type="text" id="searchChapter" placeholder="Cari chapter..."
                    class="w-full px-4 py-2 pl-10 text-sm bg-gray-100 dark:bg-gray-800 border-0 rounded-lg focus:ring-2 focus:ring-red-500 transition-all duration-300">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>

        <!-- Chapter List -->
        <div class="flex-1 overflow-y-auto custom-scrollbar p-4 space-y-2">
            <!-- Chapter Item -->
            @foreach ($chapter->comic->chapters()->orderBy('number', 'desc')->get() as $ch)
                <a href="{{ route('reader', [$chapter->comic->slug, $ch->number]) }}"
                    class="flex items-center justify-between p-3
                {{ $ch->id == $chapter->id
                    ? 'bg-red-50 dark:bg-red-900/20 border-2 border-red-500'
                    : 'bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700' }}
                    rounded-lg transition-all duration-300">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-xs">{{ $ch->number }}</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-sm text-gray-900 dark:text-white">Chapter {{ $ch->number }}
                            </h3>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ $ch->updated_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Settings Panel -->
    <div id="settingsPanel"
        class="fixed top-0 right-0 h-full w-80 bg-white dark:bg-gray-900 shadow-2xl transform translate-x-full transition-transform duration-300 z-50 flex flex-col">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white">Pengaturan</h2>
            <button id="closeSettings"
                class="w-8 h-8 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all duration-300">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto p-4 space-y-6">
            <!-- Reading Direction -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Arah Baca</h3>
                <div class="space-y-2">
                    <label
                        class="flex items-center p-3 bg-red-50 dark:bg-red-900/20 border-2 border-red-500 rounded-lg cursor-pointer">
                        <input type="radio" name="direction" value="vertical" checked
                            class="text-red-600 focus:ring-red-500">
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-white">Vertikal (Webtoon)</span>
                    </label>
                    <label
                        class="flex items-center p-3 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <input type="radio" name="direction" value="horizontal"
                            class="text-red-600 focus:ring-red-500">
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-white">Horizontal (Manga)</span>
                    </label>
                </div>
            </div>

            <!-- Image Width -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Lebar Gambar</h3>
                <div class="space-y-2">
                    <label
                        class="flex items-center p-3 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <input type="radio" name="width" value="fit" class="text-red-600 focus:ring-red-500">
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-white">Sesuaikan Lebar</span>
                    </label>
                    <label
                        class="flex items-center p-3 bg-red-50 dark:bg-red-900/20 border-2 border-red-500 rounded-lg cursor-pointer">
                        <input type="radio" name="width" value="original" checked
                            class="text-red-600 focus:ring-red-500">
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-white">Lebar Original</span>
                    </label>
                </div>
            </div>

            <!-- Auto Scroll -->
            <div>
                <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Auto Scroll</h3>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Scroll otomatis saat membaca</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:ring-2 peer-focus:ring-red-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                        </div>
                    </label>
                </div>
            </div>

            <!-- Show Page Number -->
            <div>
                <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Nomor Halaman</h3>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Tampilkan nomor halaman</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-300 peer-focus:ring-2 peer-focus:ring-red-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity duration-300"></div>

    <!-- Reading Area -->
    <main class="pt-16 min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-4xl mx-auto">
            <!-- Chapter Info Banner -->
            <div class="bg-gradient-to-r from-red-600 to-pink-600 p-4 text-center">
                <h1 class="text-white font-bold text-xl mb-1">
                    Chapter {{ $chapter->number }} : {{ $chapter->title }}
                </h1>
                <p class="text-white/80 text-sm">
                    {{ $chapter->comic->title }} • {{ $chapter->created_at->diffForHumans() }}
                </p>
            </div>

            <!-- Comic Pages -->
            <div id="comicPages" class="space-y-0">
                @foreach ($pages as $index => $page)
                    <div class="relative group">
                        <img src="{{ Storage::url($page->image) }}" alt="Page {{ $index + 1 }}"
                            class="reader-image">

                        {{-- Page Number Hover --}}
                        <div
                            class="absolute top-4 right-4 bg-black/70 text-white text-sm font-semibold px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity">
                            Page {{ $index + 1 }}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- End of Chapter -->
            <div class="bg-gray-800 p-8 text-center">
                <div class="max-w-2xl mx-auto">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check text-white text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-2">Akhir Chapter {{ $chapter->number }} :
                        {{ $chapter->title }}</h2>
                    <p class="text-gray-400 mb-6">Terima kasih sudah membaca! Jangan lupa beri rating</p>

                    <!-- Rating -->
                    <div class="flex justify-center space-x-2 mb-6">
                        <button class="text-3xl text-gray-600 hover:text-yellow-400 transition-colors"><i
                                class="fas fa-star"></i></button>
                        <button class="text-3xl text-gray-600 hover:text-yellow-400 transition-colors"><i
                                class="fas fa-star"></i></button>
                        <button class="text-3xl text-gray-600 hover:text-yellow-400 transition-colors"><i
                                class="fas fa-star"></i></button>
                        <button class="text-3xl text-gray-600 hover:text-yellow-400 transition-colors"><i
                                class="fas fa-star"></i></button>
                        <button class="text-3xl text-gray-600 hover:text-yellow-400 transition-colors"><i
                                class="fas fa-star"></i></button>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        {{-- Previous --}}
                        @if ($chapter->number > 1)
                            <a href="{{ route('reader', [$chapter->comic->slug, $chapter->number - 1]) }}"
                                class="py-3 px-6 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-xl transition-all duration-300 flex items-center justify-center">
                                <i class="fas fa-chevron-left mr-2"></i>Chapter Sebelumnya
                            </a>
                        @else
                            <div
                                class="opacity-40 bg-gray-700 py-3 px-6 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-xl transition-all duration-300 flex items-center justify-center cursor-not-allowed">
                                <i class="fas fa-chevron-left mr-2"></i>Chapter Sebelumnya
                            </div>
                        @endif

                        {{-- Next --}}
                        @if ($chapter->comic->chapters()->where('number', $chapter->number + 1)->exists())
                            <a href="{{ route('reader', [$chapter->comic->slug, $chapter->number + 1]) }}"
                                class="py-3 px-6 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl transition-all duration-300 flex items-center justify-center">
                                Chapter Selanjutnya<i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        @endif
                    </div>

                    <a href="{{ route('comic.show', $chapter->comic->slug) }}"
                        class="inline-block mt-4 text-gray-400 hover:text-white text-sm transition-colors">
                        <i class="fas fa-home mr-1"></i>Kembali ke Detail Komik
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Floating Navigation Controls -->
    <div id="floatingControls"
        class="floating-controls fixed bottom-0 left-0 right-0 z-40 bg-white/90 dark:bg-black/90 backdrop-blur-lg border-t border-gray-200 dark:border-gray-800 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <!-- Previous Chapter -->
                <a href="#"
                    class="flex items-center space-x-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg transition-all duration-300">
                    <i class="fas fa-chevron-left"></i>
                    <span class="hidden sm:inline text-sm font-medium">Previous</span>
                </a>

                <!-- Progress & Info -->
                <div class="flex-1 mx-4 text-center">
                    <div class="text-white text-sm font-medium mb-1">
                        <span id="currentPage">1</span> /
                        <span id="totalPages">{{ count($pages) }}</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-1.5">
                        <div id="progressBar"
                            class="bg-gradient-to-r from-red-500 to-pink-600 h-1.5 rounded-full transition-all duration-300"
                            style="width: 12.5%"></div>
                    </div>
                </div>

                <!-- Next Chapter -->
                <a href="#"
                    class="flex items-center space-x-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-300">
                    <span class="hidden sm:inline text-sm font-medium">Next</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop"
        class="fixed bottom-24 right-6 w-12 h-12 bg-red-600 hover:bg-red-700 text-white rounded-full shadow-lg flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 z-30">
        <i class="fas fa-arrow-up"></i>
    </button>
</div>


@push('styles')
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Custom scrollbar for chapter list */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #ef4444;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #dc2626;
        }

        /* Reading mode styles */
        .reader-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        /* Floating controls */
        .floating-controls {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .floating-controls.hidden {
            opacity: 0;
            transform: translateY(100%);
            pointer-events: none;
        }
    </style>
@endpush
@push('scripts')
    <!-- JavaScript -->
    <script>
        // Chapter Sidebar
        const chapterListBtn = document.getElementById('chapterListBtn');
        const chapterSidebar = document.getElementById('chapterSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const overlay = document.getElementById('overlay');

        chapterListBtn.addEventListener('click', () => {
            chapterSidebar.classList.remove('translate-x-full');
            overlay.classList.remove('hidden');
        });

        closeSidebar.addEventListener('click', () => {
            chapterSidebar.classList.add('translate-x-full');
            overlay.classList.add('hidden');
        });

        // Settings Panel
        const settingsBtn = document.getElementById('settingsBtn');
        const settingsPanel = document.getElementById('settingsPanel');
        const closeSettings = document.getElementById('closeSettings');

        settingsBtn.addEventListener('click', () => {
            settingsPanel.classList.remove('translate-x-full');
            overlay.classList.remove('hidden');
        });

        closeSettings.addEventListener('click', () => {
            settingsPanel.classList.add('translate-x-full');
            overlay.classList.add('hidden');
        });

        overlay.addEventListener('click', () => {
            chapterSidebar.classList.add('translate-x-full');
            settingsPanel.classList.add('translate-x-full');
            overlay.classList.add('hidden');
        });

        // Fullscreen
        const fullscreenBtn = document.getElementById('fullscreenBtn');
        let isFullscreen = false;

        fullscreenBtn.addEventListener('click', () => {
            if (!isFullscreen) {
                document.documentElement.requestFullscreen();
                fullscreenBtn.innerHTML = '<i class="fas fa-compress"></i>';
            } else {
                document.exitFullscreen();
                fullscreenBtn.innerHTML = '<i class="fas fa-expand"></i>';
            }
            isFullscreen = !isFullscreen;
        });

        // Scroll Progress
        const progressBar = document.getElementById('progressBar');
        const currentPageEl = document.getElementById('currentPage');
        const comicPages = document.querySelectorAll('#comicPages > .group');
        let currentPage = 1; // global
        const totalPages = comicPages.length;
        document.getElementById('totalPages').textContent = totalPages;

        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;

            progressBar.style.width = scrollPercent + '%';

            // Calculate current page based on scroll position
            comicPages.forEach((page, index) => {
                const pageTop = page.offsetTop;
                const pageHeight = page.offsetHeight;
                if (scrollTop >= pageTop - (pageHeight / 2)) {
                    currentPage = index + 1; // <- update global variable
                }
            });
            currentPageEl.textContent = currentPage;

            // Show/hide scroll to top button
            const scrollToTopBtn = document.getElementById('scrollToTop');
            if (scrollTop > 500) {
                scrollToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        const prevBtn = document.querySelector('#floatingControls a:first-child');
        const nextBtn = document.querySelector('#floatingControls a:last-child');

        let scrollTimeout; // untuk menunda auto-hide saat scroll programatik

        function scrollToPage(pageNumber) {
            if (pageNumber < 1) pageNumber = 1;
            if (pageNumber > comicPages.length) pageNumber = comicPages.length;

            const page = comicPages[pageNumber - 1];
            if (!page) return;

            // Tambahkan offset agar tidak tertutup header
            const headerHeight = readerHeader.offsetHeight + 65; // 10px tambahan spacing
            const pageTop = page.offsetTop - headerHeight;

            // Tampilkan header & floating controls saat scroll via tombol
            readerHeader.style.transform = 'translateY(0)';
            floatingControls.classList.remove('hidden');

            // Scroll ke halaman yang diinginkan
            window.scrollTo({
                top: pageTop,
                behavior: 'smooth'
            });

            // Update currentPage
            currentPage = pageNumber;
            currentPageEl.textContent = currentPage;

            updateProgress();

            // Nonaktifkan auto-hide sementara
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                // Biarkan auto-hide bekerja lagi setelah 800ms (scroll selesai)
            }, 800);
        }

        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            scrollToPage(currentPage - 1);
        });

        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            scrollToPage(currentPage + 1);
        });

        // Scroll to Top
        document.getElementById('scrollToTop').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Auto-hide header and controls on scroll
        let lastScrollTop = 0;
        const readerHeader = document.getElementById('readerHeader');
        const floatingControls = document.getElementById('floatingControls');

        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;

            // Hitung current page
            comicPages.forEach((page, index) => {
                const pageTop = page.offsetTop;
                const pageHeight = page.offsetHeight;
                if (scrollTop >= pageTop - (pageHeight / 2)) {
                    currentPage = index + 1;
                }
            });
            currentPageEl.textContent = currentPage;
            // Update progress
            updateProgress();

            // Show/hide scroll to top button
            const scrollToTopBtn = document.getElementById('scrollToTop');
            if (scrollTop > 500) {
                scrollToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'pointer-events-none');
            }

            // Auto-hide header/floating controls hanya jika tidak scroll via tombol
            if (!scrollTimeout) {
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    readerHeader.style.transform = 'translateY(-100%)';
                    floatingControls.classList.add('hidden');
                } else {
                    readerHeader.style.transform = 'translateY(0)';
                    floatingControls.classList.remove('hidden');
                }
            }
            lastScrollTop = scrollTop;
        });

        function updateProgress() {
            // Gunakan currentPage & totalPages
            const pageProgress = (currentPage / totalPages) * 100;
            progressBar.style.width = pageProgress + '%';
        }

        // Click to show/hide controls
        let controlsVisible = true;
        document.addEventListener('click', (e) => {
            // Don't toggle if clicking on buttons or controls
            if (e.target.closest('button') || e.target.closest('a') || e.target.closest('nav') || e.target.closest(
                    '#floatingControls')) {
                return;
            }

            if (controlsVisible) {
                readerHeader.style.transform = 'translateY(-100%)';
                floatingControls.classList.add('hidden');
            } else {
                readerHeader.style.transform = 'translateY(0)';
                floatingControls.classList.remove('hidden');
            }
            controlsVisible = !controlsVisible;
        });

        // Search Chapter
        const searchChapter = document.getElementById('searchChapter');
        searchChapter.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            // Add your search logic here
            console.log('Searching for:', searchTerm);
        });

        // Rating stars
        const ratingStars = document.querySelectorAll('.fa-star');
        ratingStars.forEach((star, index) => {
            star.addEventListener('click', () => {
                ratingStars.forEach((s, i) => {
                    if (i <= index) {
                        s.classList.remove('text-gray-600');
                        s.classList.add('text-yellow-400');
                    } else {
                        s.classList.remove('text-yellow-400');
                        s.classList.add('text-gray-600');
                    }
                });
            });

            star.addEventListener('mouseenter', () => {
                ratingStars.forEach((s, i) => {
                    if (i <= index) {
                        s.classList.add('text-yellow-400');
                    }
                });
            });
        });

        document.querySelector('.flex.justify-center.space-x-2').addEventListener('mouseleave', () => {
            // Reset to actual rating or keep user selection
        });
    </script>
@endpush
