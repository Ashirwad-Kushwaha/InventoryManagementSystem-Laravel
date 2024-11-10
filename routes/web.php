<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;

Route::view('/', 'posts.index')->name('home');

Route::get('/inventory', [InventoryController::class, 'index'])->middleware('auth')->name('inventory');

Route::post('/inventory', [InventoryController::class, 'store'])->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/register','auth.register')->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::view('/login','auth.login')->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::resource('items', ItemController::class)->middleware('auth');

