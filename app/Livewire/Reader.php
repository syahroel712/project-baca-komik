<?php

namespace App\Livewire;

use App\Models\Chapter;
use Livewire\Component;

class Reader extends Component
{
    public $comic_slug;
    public $number;
    public $chapter;
    public $pages;

    public $searchChapter = "";

    public function mount($comic_slug, $number)
    {
        $this->comic_slug = $comic_slug;
        $this->number = $number;

        $this->chapter = Chapter::with('comic', 'pages')
            ->whereHas('comic', fn($q) => $q->where('slug', $comic_slug))
            ->where('number', $number)
            ->firstOrFail();

        $this->chapter->increment('views');
        $this->pages = $this->chapter->pages()->orderBy('order')->get();
    }

    public function render()
    {
        $chapters = Chapter::where('comic_id', $this->chapter->comic_id)
            ->when(
                $this->searchChapter,
                fn($q) => $q
                    ->where('title', 'like', '%' . $this->searchChapter . '%')
                    ->orWhere('number', 'like', '%' . $this->searchChapter . '%')
            )
            ->orderBy('number', 'desc')
            ->get();

        return view('livewire.reader', [
            'chapters' => $chapters,
        ]);
    }
}
