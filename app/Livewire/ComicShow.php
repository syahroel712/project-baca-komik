<?php

namespace App\Livewire;

use App\Models\Comic;
use Livewire\Component;

class ComicShow extends Component
{
    public $slug;
    public $comic;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->comic = Comic::with(['genres', 'chapters' => function ($q) {
            $q->orderBy('number', 'desc');
        }])->where('slug', $slug)->firstOrFail();

        $this->comic->increment('views');
        $this->comic->refresh();
    }

    public function like()
    {
        $this->comic->increment('likes');
        $this->comic->refresh();
    }

    public function render()
    {
        $genreIds = $this->comic->genres()->pluck('genres.id');

        return view('livewire.comic-show', [
            'similarComics' => Comic::whereHas('genres', function ($query) use ($genreIds) {
                $query->whereIn('genres.id', $genreIds);
            })
                ->where('id', '!=', $this->comic->id)
                ->take(6)
                ->get(),
        ]);
    }
}
