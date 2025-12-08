<?php

namespace App\Livewire;

use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Genre;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 12;
    public $sort = 'latest'; // latest | rating | oldest
    public $status = "";
    public $type = "";
    public $genre = "";
    public $allGenres = [];

    protected $queryString = ['search', 'genre', 'sort', 'page'];

    protected $listeners = ['refreshHome' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingGenre()
    {
        $this->resetPage();
    }
    public function updatingSort()
    {
        $this->resetPage();
    }

    public function render()
    {
        // carousel (featured this week)
        $carousel = Comic::query()
            ->with('genres', 'chapters')
            ->whereHas('chapters')
            ->with(['chapters' => function ($query) {
                $query->latest()->limit(1);
            }])
            ->get()
            ->sortByDesc(fn($comic) => $comic->chapters->first()->created_at ?? now())
            ->take(3);

        // popular horizontal scroller
        $popular = Comic::query()
            ->withCount('chapters')
            ->with('genres')
            ->orderByDesc('views')
            ->take(12)
            ->get();

        // main list with filters
        $query = Comic::query()
            ->withCount('chapters')
            ->with('genres');

        // search by title
        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        // sort
        if ($this->sort) {
            match ($this->sort) {
                'latest' => $query->orderBy('created_at', 'desc'),
                'oldest' => $query->orderBy('created_at', 'asc'),
                'rating' => $query->orderBy('rating', 'desc'),
                default => null
            };
        }

        // filter by type
        if ($this->type) {
            $query->where('type', $this->type);
        }

        // filter by status
        if ($this->status) {
            $query->where('status', $this->status);
        }

        // filter by multiple genres (multi-select)
        if (!empty($this->allGenres)) {
            foreach ($this->allGenres as $genreId) {
                $query->whereHas('genres', fn($q) => $q->where('id', $genreId));
            }
        }

        // order by latest chapter first, fallback to comic.created_at
        $query->orderByDesc(
            Chapter::select('created_at')
                ->whereColumn('comic_id', 'comics.id')
                ->latest()
                ->limit(1)
        )
            ->orderByDesc('created_at');

        $comics = $query->paginate($this->perPage);

        // sidebar top items (top 6 by views)
        $top = $popular->take(6);

        // genres for filter list
        $genres = Genre::orderBy('name')->get();

        return view('livewire.home', compact('carousel', 'popular', 'comics', 'top', 'genres'));
    }
}
