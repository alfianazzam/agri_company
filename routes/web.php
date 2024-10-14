<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JumbotronController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;

// Rute publik
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/poster', [LandingController::class, 'poster'])->name('poster');
Route::get('/poster/{id}', [PosterController::class, 'index'])->name('poster.detail');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/agenda', [LandingController::class, 'agenda'])->name('agenda');
Route::get('/agenda/{id}', [AgendaController::class, 'show'])->name('agenda.detail');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/project', [LandingController::class, 'project'])->name('project');
Route::get('/project/{id}', [ProjectController::class, 'project'])->name('project.detail');

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
    Route::post('/admin/jumbotron/store', [JumbotronController::class, 'store'])->name('jumbotron.store');
    Route::put('/admin/jumbotron/update/{id}', [JumbotronController::class, 'update'])->name('jumbotron.update');
    Route::delete('/admin/jumbotron/delete/{id}', [JumbotronController::class, 'delete'])->name('jumbotron.delete');

    // About crud
    Route::get('/admin/about', [AboutController::class, 'index'])->name('about');
    Route::get('/admin/about/show', [AboutController::class, 'show'])->name('about.show');
    Route::post('/admin/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::delete('/admin/about/delete/{id}', [AboutController::class, 'delete'])->name('about.delete');

    // Poster crud
    Route::get('/admin/poster', [PosterController::class, 'admin'])->name('poster.admin');
    Route::get('/admin/poster/show/{id}', [PosterController::class, 'show'])->name('poster.show');
    Route::post('/admin/poster/store', [PosterController::class, 'store'])->name('poster.store');
    Route::post('/admin/poster/update/{id}', [PosterController::class, 'update'])->name('poster.update');
    Route::delete('/admin/poster/delete/{id}', [PosterController::class, 'delete'])->name('poster.delete');
    
    // Gallery crud
    Route::get('/admin/gallery', [GalleryController::class, 'admin'])->name('gallery.admin');
    Route::get('/admin/gallery/show', [GalleryController::class, 'show'])->name('gallery.show');
    Route::post('/admin/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::post('/admin/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/admin/gallery/delete/{id}', [GalleryController::class, 'delete'])->name('gallery.delete');
    
    // Agenda crud
    Route::get('/admin/agenda', [AgendaController::class, 'admin'])->name('agenda.admin');
    Route::get('/admin/agenda/show/{id}', [AgendaController::class, 'show'])->name('agenda.show');
    Route::post('/admin/agenda/store', [AgendaController::class, 'store'])->name('agenda.store');
    Route::post('/admin/agenda/update/{id}', [AgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/admin/agenda/delete/{id}', [AgendaController::class, 'delete'])->name('agenda.delete');

    // Project crud
    Route::get('/admin/project', [ProjectController::class, 'index'])->name('project.admin');
    Route::get('/admin/project/show/{id}', [ProjectController::class, 'show'])->name('project.show');
    Route::post('/admin/project/store', [ProjectController::class, 'store'])->name('project.store');
    Route::post('/admin/project/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/admin/project/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');

    Route::get('admin/company', [CompanyController::class, 'index'])->name('company.index');
    Route::put('admin/company', [CompanyController::class, 'update'])->name('company.update');
});


