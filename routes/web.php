<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;


Route::get('/', [LandingController::class, 'index'])->name('page.index');
Route::get('/login', [LandingController::class, 'login'])->name('page.login');
Route::get('/register', [LandingController::class, 'register'])->name('page.register');
