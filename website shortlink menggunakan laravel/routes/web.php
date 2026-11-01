<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\MyUrlController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman login (GET)
Route::get('/', [LoginController::class, 'index'])->name('login');
// Rute untuk autentikasi login (POST)
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
// Rute untuk pendaftaran (GET dan POST)
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
// Rute untuk logout (POST)

// Rute untuk dashboard (hanya bisa diakses jika login)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Rute untuk input URL (hanya bisa diakses jika login)
//Route::get('/inputurl', [UrlController::class, 'index'])->name('inputurl.index');
//Route::get('/inputurl.create', [UrlController::class, 'create'])->name('inputurl.create');
//Route::post('/inputurl', [UrlController::class, 'store'])->name('inputurl.store')->middleware('auth');//


// Rute untuk halaman input URL
// Halaman input URL
Route::get('urls/create', [UrlController::class, 'create'])->name('urls.create');

// Menyimpan URL
Route::post('urls', [UrlController::class, 'store'])->name('urls.store');

// Menampilkan detail URL (opsional, jika memang ada fitur detail URL)
Route::get('urls/{short_url}', [UrlController::class, 'show'])->name('urls.show');

// Redirect ke long URL berdasarkan short URL
Route::get('/{short_url}', [UrlController::class, 'redirectToLongUrl'])->name('urls.redirect');



Route::get('/myurl/index', [MyUrlController::class, 'index'])->name('myurl.index');

// Rute untuk menghapus URL//
Route::delete('/myurl/{id}', [MyUrlController::class, 'destroy'])->name('myurl.destroy');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



//Route::get('urls/index', [UrlController::class, 'index'])->name('urls.index');
///Route::post('/urls/store', [UrlController::class, 'store']);

//Route::post('urls/store', [UrlController::class, 'store'])->name('urls.store');
//Route::get('/url-visits', [UrlVisitController::class, 'index'])->name('api.url-visits');
//Route::get('/api/url-visits', [UrlController::class, 'getUrlVisits'])->name('api.url-visits');
//Route::get('/api/url-visits', [UrlController::class, 'getUrlVisits'])->name('api.url-visits');




// Rute untuk URL visit
// Rute untuk My URL (hanya bisa diakses jika login)
//Route::get('/myurl/index', [UrlVisitController::class, 'index'])->name('myurl.index');
//Route::get('/myurl/{id}', [UrlVisitController::class, 'show'])->name('myurl.show');
//Route::delete('/myurl/{id}', [UrlVisitController::class, 'destroy'])->name('myurl.destroy');
//Route::get('/url-visits', [UrlVisitController::class, 'getUrlVisits'])->name('api.url-visits');
