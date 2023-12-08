<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Route accessible to users with the 'user' role
Route::middleware(['user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    // Add other user-specific routes here
});

// Route accessible to users with the 'admin' role
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Add other admin-specific routes here
});
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
