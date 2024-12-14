<?php

use App\Http\Controllers\JobAppliedController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(JobAppliedController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/search', 'search');
    Route::get('/filter', 'filter');
});

Route::middleware(['auth', 'verified'])->controller(JobAppliedController::class)->group(function () {
    Route::post('/add-job-applied', 'store');
    Route::post('/edit-job-applied-status/{jobApplied}', 'editStatus');
    Route::post("/edit-job-applied/{jobApplied}", "edit");
    Route::get("/dashboard/edit-job-applied/{jobApplied}", "update");
});

Route::get('/dashboard', [JobAppliedController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
