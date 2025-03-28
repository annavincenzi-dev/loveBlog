<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//SEZIONE DOVE SCRIVERE LE STORIE
Route::get('/writeStory', [StoryController::class, 'writeStory'])->name('writeStory');
Route::post('/writeStory/submit', [StoryController::class, 'storeStory'])->name('storeStory');

//PAGINA CON TUTTE LE STORIE
Route::get('/allStories', [StoryController::class, 'allStories'])->name('allStories');

//PAGINA DETTAGLIO DI OGNI STORIA
Route::get('/story/{id}', [StoryController::class, 'showStory'])->name('showStory');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'registerSubmit'])->name('registerSubmit');
