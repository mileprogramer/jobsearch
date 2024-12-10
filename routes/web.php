<?php

use App\Http\Controllers\JobAppliedController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobAppliedController::class, "index"]);
Route::get('/search', [JobAppliedController::class, "search"]);
Route::get('/filter', [JobAppliedController::class, "filter"]);
Route::post('/add-job-applied', [JobAppliedController::class, "store"]);

Route::get('/dashboard', [JobAppliedController::class, "dashboard"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
