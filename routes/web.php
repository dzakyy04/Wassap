<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyArticlesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes([
    'login' => false,
    'logout' => false,
]);

Route::middleware('guest')->group(function () {
    // Masuk
    Route::get('/masuk', Login::class)->name('login');

    // Daftar
    Route::get('/daftar', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    // logout
    Route::post('/logout', [Login::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Berita Saya
    Route::get('/dashboard/berita-saya', [MyArticlesController::class, 'index'])->name('my-articles');
    Route::get('/dashboard/berita-saya/disetujui', [MyArticlesController::class, 'approved'])->name('my-articles.approved');
    Route::get('/dashboard/berita-saya/belum-disetujui', [MyArticlesController::class, 'not_approved'])->name('my-articles.not-approved');
});

// Berita
Route::get('/berita', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/berita/{slug}', [ArticleController::class, 'show'])->name('articles.show');
