<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');

    Route::get('/users/{id}', [UsersController::class, 'show'])
        ->where('id', '[0-9]+')
        ->name('users.show');

    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])
        ->where('id', '[0-9]+')
        ->name('users.edit');

    Route::put('/users/{id}', [UsersController::class, 'update'])
        ->where('id', '[0-9]+')
        ->name('users.update');

    Route::delete('/users/{id}', [UsersController::class, 'destroy'])
        ->where('id', '[0-9]+')
        ->name('users.destroy');

    Route::post('/users/{id}/restore', [UsersController::class, 'restore'])
        ->where('id', '[0-9]+')
        ->name('users.restore');
});

require __DIR__ . '/auth.php';
