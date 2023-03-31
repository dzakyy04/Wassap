<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyArticlesController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    // CRUD
    Route::get('/dashboard/tulis-berita', [MyArticlesController::class, 'create'])->name('create-news');
    Route::post('/dashboard/tulis-berita', [MyArticlesController::class, 'store'])->name('store-news');
    Route::get('/dashboard/{slug}/edit-berita', [MyArticlesController::class, 'edit'])->name('edit-news');
    Route::post('/dashboard/{slug}/edit-berita', [MyArticlesController::class, 'update'])->name('update-news');

    // Upload gambar dari ckeditor
    Route::post('upload', [MyArticlesController::class, 'uploadImage'])->name('ckeditor.upload');


    // Admin
    Route::get('/dashboard/admin/kategori', [CategoryController::class, 'index'])->name('admin.category');

});

// Berita
Route::get('/berita', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/berita/{slug}', [ArticleController::class, 'show'])->name('articles.show');
