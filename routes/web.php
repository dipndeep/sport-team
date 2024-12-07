<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\BolaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

// Definisi rute resource yang benar
Route::resource('baskets', BasketController::class);

// Definisi rute resource yang benar
Route::resource('bolas', BolaController::class);
