<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwarenessController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserHistoryController;
use App\Http\Controllers\NewAwarenessController;
use App\Http\Controllers\Auth\RegisterController;


// Home page
Route::get('/home', function () {
    return view('home');
})->name('home');

// Register Page
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login Page
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Logout Page
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Awareness page
Route::get('/awareness', [AwarenessController::class, 'index'])->name('awareness');
Route::post('/awareness', [AwarenessController::class, 'store']);

// User history page
Route::get('/user/{user:username}/history', [UserHistoryController::class, 'index'])->name('user.history');
Route::post('/user/{user:username}/history', [UserHistoryController::class, 'search'])->name('user.history.search');

// Add new awareness page
Route::get('/user/{user:username}/awareness', [NewAwarenessController::class, 'index'])->name('new.awareness');
Route::post('/user/{user:username}/awareness', [NewAwarenessController::class, 'store'])->name('new.awareness');


