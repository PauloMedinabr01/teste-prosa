<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');

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

// Clientes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');

    Route::get('/clientes/{id}/edit', [ClientesController::class, 'edit'])
        ->where('id', '[0-9]+')
        ->name('clientes.edit');

    Route::put('/clientes/{id}', [ClientesController::class, 'update'])
        ->where('id', '[0-9]+')
        ->name('clientes.update');

    Route::delete('/clientes/{id}', [ClientesController::class, 'destroy'])
        ->where('id', '[0-9]+')
        ->name('clientes.destroy');

    Route::post('/clientes/{id}/restore', [ClientesController::class, 'restore'])
        ->where('id', '[0-9]+')
        ->name('clientes.restore');
});

require __DIR__ . '/auth.php';
