<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JumbotronController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PosterController;

// Rute publik
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/poster', [PosterController::class, 'index'])->name('poster');

// Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
// Route::get('/proyek', [ProjectController::class, 'index'])->name('project');
// Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
// Route::get('/article', [ArticleController::class, 'index'])->name('articles');

// Route untuk menangani 404
Route::fallback(function () {
    return response()->view('errors.404.index', [], 404);
});

// Rute login dan registrasi (hanya untuk pengguna yang belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LandingController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [LandingController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Rute logout (hanya untuk pengguna yang sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute yang memerlukan akses admin
Route::middleware(['checkAuth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

    // Jumbotron crud
    Route::get('/admin/jumbotron', [JumbotronController::class, 'index'])->name('jumbotron');
    Route::get('/admin/jumbotron/show', [JumbotronController::class, 'show'])->name('jumbotron.show');
    Route::post('/admin/jumbotron/store', [JumbotronController::class, 'store'])->name('store');
    Route::put('/admin/jumbotron/update/{id}', [JumbotronController::class, 'update'])->name('update');
    Route::delete('/admin/jumbotron/delete/{id}', [JumbotronController::class, 'delete'])->name('delete');

    // About crud
    Route::get('/admin/about', [AboutController::class, 'index'])->name('about');
    Route::get('/admin/about/show', [AboutController::class, 'show'])->name('about.show');
    Route::post('/admin/about/store', [AboutController::class, 'store'])->name('store');
    Route::delete('/admin/about/delete/{id}', [AboutController::class, 'delete'])->name('delete');

    // Poster crud
    Route::get('/admin/poster', [PosterController::class, 'admin'])->name('poster.admin');
    Route::get('/admin/poster/show', [PosterController::class, 'show'])->name('poster.show');
    Route::post('/admin/poster/store', [PosterController::class, 'store'])->name('store');
    Route::delete('/admin/poster/delete/{id}', [PosterController::class, 'delete'])->name('delete');


});


