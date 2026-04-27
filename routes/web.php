<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShortLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShortLinkController::class, 'index'])->name('home');
Route::post('/shorten', [ShortLinkController::class, 'store'])->name('shorten.store');

Route::get('/dashboard', [ShortLinkController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Redirect route at the end
Route::get('/{code}', [ShortLinkController::class, 'redirect'])->name('shorten.redirect');
