<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminController;

Route::get('/', [LandingController::class, 'index']);

Route::get('/login', [LandingController::class, 'login']);

Route::get('/register', [LandingController::class, 'register']);

Route::get('/404', [LandingController::class, 'notfound'])->name('404');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/landing', [AdminController::class, 'landing'])->name('landing');

