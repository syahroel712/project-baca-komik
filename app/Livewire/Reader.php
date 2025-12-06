<?php

namespace App\Livewire;

use App\Models\Chapter;
use Livewire\Component;

class Reader extends Component
{
    public $comic_slug;
    public $number; // chapter number
    public $chapter;
    public $pages;

    public function mount($comic_slug, $number)
    {
        $this->comic_slug = $comic_slug;
        $this->number = $number;
        $this->chapter = Chapter::whereHas('comic', fn($q) => $q->where('slug', $comic_slug))
            ->where('number', $number)->with('pages')->firstOrFail();

        // optionally increment chapter view
        $this->chapter->increment('views'); // add views column to chapter if needed

        // eager load pages
        $this->pages = $this->chapter->pages()->orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.reader');
    }
}
