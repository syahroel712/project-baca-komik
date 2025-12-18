<?php

namespace App\Livewire;

use App\Models\Genre;
use Livewire\Component;

class GenreList extends Component
{
    public function render()
    {
        return view('livewire.genre-list', [
            'genres' => Genre::withCount('comics')->orderBy('name')->get(),
        ]);
    }
}
