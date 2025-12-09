<?php

namespace App\Livewire;

use App\Models\Comic;
use Livewire\Component;

class ComicShow extends Component
{
    public $slug;
    public $comic;

    public $sortDirection = 'desc'; // default: terbaru dulu
    public $perPage = 10; // jumlah chapter awal
    public $hasMore = true; // cek jika masih ada chapter

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadComic();
    }

    public function loadComic()
    {
        $this->comic = Comic::with([
            'genres',
            'chapters' => function ($q) {
                $q->orderBy('number', $this->sortDirection)
                    ->take($this->perPage);
            }
        ])
            ->where('slug', $this->slug)
            ->firstOrFail();

        $this->checkMore();
    }

    public function loadMore()
    {
        $this->perPage += 10; // tambah 10 chapter lagi
        $this->loadComic();
    }

    public function toggleSort()
    {
        // If desc → asc ; if asc → desc
        $this->sortDirection = $this->sortDirection === 'desc' ? 'asc' : 'desc';
        $this->perPage = 10; // reset load more

        // reload comic with new sorting
        $this->loadComic();
    }

    private function checkMore()
    {
        // hitung apakah chapter asli lebih banyak dari yang ditampilkan
        $totalChapters = $this->comic->chapters()->count();
        $this->hasMore = $totalChapters > $this->perPage;
    }

    public function like()
    {
        $this->comic->increment('likes');

        // muat ulang tapi tetap mempertahankan sortDirection & perPage
        $this->loadComic();

        $this->dispatch('liked');
    }

    public function render()
    {
        $genreIds = $this->comic->genres()->pluck('genres.id');

        return view('livewire.comic-show', [
            'similarComics' => Comic::withCount('chapters')
                ->whereHas('genres', fn($query) => $query->whereIn('genres.id', $genreIds))
                ->where('id', '!=', $this->comic->id)
                ->take(6)
                ->get(),
        ]);
    }
}
