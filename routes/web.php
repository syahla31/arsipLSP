<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;

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

// Route utama, langsung diarahkan ke daftar surat
Route::get('/', [SuratController::class, 'index']);

// Resource route untuk operasi surat (create, store, show, edit, update, destroy)
// Ini akan secara otomatis membuat URL seperti /surat, /surat/create, /surat/{id}, dll.
Route::resource('surat', SuratController::class);

// Route tambahan untuk fungsionalitas unduh file
Route::get('/surat/{surat}/unduh', [SuratController::class, 'unduh'])->name('surat.unduh');

Route::resource('kategori', KategoriController::class);

// Route untuk halaman "About"
Route::get('/about', function () {
    return view('about');
})->name('about');