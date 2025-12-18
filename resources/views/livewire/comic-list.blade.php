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
                                <a href="{{ route('comic', ['allGenres' => [$item->id]]) }}"
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
