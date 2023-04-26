<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MyArticlesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminArticleController;

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

    // Admin Berita
    Route::get('/dashboard/admin/berita', [AdminArticleController::class, 'index'])->name('admin.article');
    Route::get('/dashboard/admin/{slug}/edit-berita', [AdminArticleController::class, 'edit'])->name('admin.edit-article');
    Route::post('/dashboard/admin/{slug}/edit-berita', [AdminArticleController::class, 'update'])->name('admin.update-article');

    // Admin User
    Route::get('/dashboard/admin/pengguna', [UserController::class, 'index'])->name('admin.user');

    // Admin admin
    Route::get('/dashboard/admin/admin', [AdminController::class, 'index'])->name('admin.admin');
    Route::get('/dashboard/admin/admin/tambah-admin', [AdminController::class, 'create'])->name('admin.create-admin');
    Route::post('/dashboard/admin/admin/tambah-admin', [AdminController::class, 'store'])->name('admin.store-admin');
});

// Berita
Route::get('/berita', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/berita/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Tentang
Route::get('/tentang', function() {
    return view('about.index');
})->name('about');
