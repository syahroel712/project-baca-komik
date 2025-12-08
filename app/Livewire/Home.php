<?php

namespace App\Livewire;

use App\Models\Comic;
use App\Models\Genre;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $search = '';
    public $genre = null;
    public $perPage = 12;
    public $sort = 'latest'; // latest | popular | liked

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
        // carousel (featured this week) — change condition to fit your schema
        $carousel = Comic::query()
            // ->where('is_featured', true) // if you don't have, use 
            ->orderByDesc('created_at')
            ->with('genres')
            ->take(3)
            ->get();

        // popular horizontal scroller (week/top) — use views or likes
        $popular = Comic::query()
            ->withCount('chapters')
            ->with('genres')
            ->orderByDesc('views') // or use weighted logic later
            ->take(12)
            ->get();

        // main list (paginated) with filters
        $query = Comic::query()->withCount('chapters')->with('genres');

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        if ($this->genre) {
            $query->whereHas('genres', fn($q) => $q->where('id', $this->genre));
        }

        if ($this->sort === 'popular') {
            $query->orderByDesc('views');
        } elseif ($this->sort === 'liked') {
            $query->orderByDesc('likes');
        } else {
            $query->orderByDesc('created_at');
        }

        $comics = $query->paginate($this->perPage);

        // sidebar top items (top 6 by views)
        $top = $popular->take(6);

        // genres for filter list
        $genres = Genre::orderBy('name')->get();

        return view('livewire.home', compact('carousel', 'popular', 'comics', 'top', 'genres'));
    }
}
