<?php

use App\Livewire\ComicList;
use App\Livewire\ComicShow;
use App\Livewire\Home;
use App\Livewire\Reader;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');
Route::get('/comic', ComicList::class)->name('comic');
Route::get('/comic/{slug}', ComicShow::class)->name('comic.show');
Route::get('/comic/{comic_slug}/chapter/{number}/read', Reader::class)->name('reader');
