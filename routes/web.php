<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController; // Import PropertyController

Route::get('/', function () {
    return view('welcome');
})->name('login-form');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Property routes
Route::get('/buy-houses', [PropertyController::class, 'showBuyHouses'])->name('buy.houses');
Route::get('/rent-houses', [PropertyController::class, 'showRentHouses'])->name('rent.houses');
Route::get('/all-houses', [PropertyController::class, 'showAllHouses'])->name('all.houses');

// Search route to handle filtering by offer type, property type, location
Route::get('/search-properties', [PropertyController::class, 'search'])->name('properties.search');
