<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonnelController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // List all personnels
    Route::get('/personnels', [PersonnelController::class, 'index'])->name('personnels.index');

    Route::get('/personnels/{personnel}/view', [PersonnelController::class, 'show'])->name('personnels.show');
    
    // Show form to create new personnel
    Route::get('/personnels/create', [PersonnelController::class, 'create'])->name('personnels.create');
    
    // Store new personnel
    Route::post('/personnels', [PersonnelController::class, 'store'])->name('personnels.store');
    
    // Show specific personnel details
    Route::get('/personnels/{personnel}', [PersonnelController::class, 'show'])->name('personnels.show');
    
    // Show form to edit existing personnel
    Route::get('/personnels/{personnel}/edit', [PersonnelController::class, 'edit'])->name('personnels.edit');
    
    // Update existing personnel
    Route::put('/personnels/{personnel}', [PersonnelController::class, 'update'])->name('personnels.update');
    
    // Delete personnel
    Route::delete('/personnels/{personnel}', [PersonnelController::class, 'destroy'])->name('personnels.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
