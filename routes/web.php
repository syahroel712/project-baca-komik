<?php

use App\Livewire\About;
use App\Livewire\ComicList;
use App\Livewire\ComicShow;
use App\Livewire\Contact;
use App\Livewire\Faq;
use App\Livewire\Home;
use App\Livewire\Privacy;
use App\Livewire\Reader;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/privacy', Privacy::class)->name('privacy');
Route::get('/faq', Faq::class)->name('faq');

Route::get('/comic', ComicList::class)->name('comic');
Route::get('/comic/{slug}', ComicShow::class)->name('comic.show');
Route::get('/comic/{comic_slug}/chapter/{number}/read', Reader::class)->name('reader');


Route::fallback(function () {
	return response()->view('errors.404', [], 404);
});
