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
Route::get('/story/{story}', [StoryController::class, 'showStory'])->name('showStory');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'registerSubmit'])->name('registerSubmit');

//ROTTE PER MODIFICARE LA STORIA
Route::get('/edit/{story}', [StoryController::class, 'edit'])->name('edit');
Route::put('/edit/{story}', [StoryController::class, 'update'])->name('update');

//ROTTE PER ELIMINARE LA STORIA
Route::delete('/delete/{story}', [StoryController::class, 'destroy'])->name('delete');

//ROTTA PER LA PAGINA STORIE DI UN UTENTE
Route::get('/myStories/{user}', [StoryController::class, 'myStories'])->name('myStories');

//ROTTA PER LA PAGINA STORIE DI UNA CATEGORIA
Route::get('/storiesByCategory/{category}', [StoryController::class, 'storiesByCategory'])->name('storiesByCategory');
