<?php

use App\Http\Livewire\Board;
use App\Http\Livewire\Boards;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts;

Route::get('/', Boards::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('posts', Posts::class)->name('posts');
Route::get('{route}', Board::class)->name('board');
