<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/writeStory', [StoryController::class, 'writeStory'])->name('writeStory');
Route::post('/writeStory/submit', [StoryController::class, 'storeStory'])->name('storeStory');
