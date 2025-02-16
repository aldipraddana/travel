<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TravelDestinationController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/setting-travel', [TravelDestinationController::class, 'index'])->name('setting.travel');
    Route::inertia('/create-travel', 'CreateTravel')->name('create.travel');
    Route::post('/setting-travel', [TravelDestinationController::class, 'store'])->name('travel.store');
    Route::put('/setting-travel/{id}', [TravelDestinationController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
