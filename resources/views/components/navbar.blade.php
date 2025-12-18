<nav x-data="{ open: false }"
    class="sticky top-0 z-50 bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg border-b border-gray-200 dark:border-gray-700 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-book-open text-white text-lg"></i>
                    </div>
                    <span
                        class="text-2xl font-bold bg-gradient-to-r from-red-600 to-pink-600 dark:from-red-400 dark:to-pink-400 bg-clip-text text-transparent">Mambaco</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 text-sm font-semibold text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/20 rounded-lg transition-all duration-300">Home</a>
                    <a href="{{ route('comic') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-all duration-300">Comic</a>
                    <a href="{{ route('genres') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-all duration-300">Genre</a>
                    {{-- <a href="#"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-all duration-300">Populer</a> --}}
                </div>
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-3">
                <form action="{{ route('comic') }}" method="GET" class="hidden sm:block relative">
                    <input type="text" name="search" placeholder="Cari komik..." value="{{ request('search') }}"
                        class="w-64 px-4 py-2 pl-10 text-sm bg-gray-100 dark:bg-gray-700 border-0 rounded-lg focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 transition-all duration-300 placeholder-gray-500 dark:placeholder-gray-400">
                    <button type="submit" class="absolute right-1 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fas fa-search"></i>
                    </button>
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </form>

                <!-- Mobile Search -->
                {{-- <button
                    class="sm:hidden w-10 h-10 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-all duration-300">
                    <i class="fas fa-search"></i>
                </button> --}}

                <!-- Theme Toggle -->
                <button id="themeToggle"
                    class="w-10 h-10 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-all duration-300">
                    <i class="fas fa-sun dark:hidden"></i>
                    <i class="fas fa-moon hidden dark:inline"></i>
                </button>

                <!-- Mobile Menu -->
                <button @click="open = true"
                    class="md:hidden w-10 h-10 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-all duration-300">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-cloak class="fixed inset-0 z-50 md:hidden">

        <!-- Overlay -->
        <div @click="open = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/60 backdrop-blur-sm">
        </div>

        <!-- Mobile Menu -->
        <div x-transition:enter="transition transform ease-out duration-300"
            x-transition:enter-start="-translate-y-8 opacity-0 scale-95"
            x-transition:enter-end="translate-y-0 opacity-100 scale-100"
            x-transition:leave="transition transform ease-in duration-200"
            x-transition:leave-start="translate-y-0 opacity-100 scale-100"
            x-transition:leave-end="-translate-y-8 opacity-0 scale-95"
            class="relative bg-white dark:bg-gray-800 w-full shadow-2xl">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <span
                    class="text-xl font-bold bg-gradient-to-r from-red-600 to-pink-600 dark:from-red-400 dark:to-pink-400 bg-clip-text text-transparent">
                    Mambaco
                </span>

                <button @click="open = false"
                    class="w-10 h-10 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Content -->
            <div class="px-6 py-6 space-y-4">
                <!-- Mobile Search -->
                <form action="{{ route('comic') }}" method="GET" class="relative">
                    <input type="text" name="search" placeholder="Cari komik..."
                        class="w-full px-4 py-2 pl-10 text-sm bg-gray-100 dark:bg-gray-700 rounded-lg focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </form>

                <!-- Menu Items -->
                <a href="{{ route('home') }}" @click="open = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 font-semibold transition">
                    <i class="fas fa-home"></i> Home
                </a>

                <a href="{{ route('comic') }}" @click="open = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-book"></i> Comic
                </a>

                <a href="{{ route('genres') }}" @click="open = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-tags"></i> Genre
                </a>
            </div>
        </div>
    </div>

</nav>
