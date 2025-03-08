<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Welcome Page
Route::get('/', function () {
    if (auth()->check()) {
        // If the user is logged in, redirect to the accueil page
        return redirect()->route('accueil');
    } else {
        // If the user is not logged in, show the welcome page
        return view('welcome');
    }
});


Route::resource('crops', CropController::class);
// Route::resource('equipements', EquipmentController::class);

// routes/web.php
Route::get('/accueil', function () {
    return view('accueil'); // Ensure this view exists
})->name('accueil');



Route::middleware(['auth'])->group(function () {
    Route::resource('equipements', EquipmentController::class);
});



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
