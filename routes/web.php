<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('offers', OfferController::class);
    Route::post('/offers/{offer}/apply', [ApplicationController::class, 'store'])->name('applications.store');
    Route::delete('/offers/{offer}/unapply', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::get('/mis-ofertas', [OfferController::class, 'myOffers'])->name('offers.my-offers');


});

require __DIR__.'/auth.php';
