<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\TargetController;
use Illuminate\Support\Facades\Route;

// --- HALAMAN PUBLIK (Bisa diakses siapa saja) ---
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// --- PROSES LOGIN ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


// --- HALAMAN ADMIN (Hanya bisa diakses jika sudah login) ---
Route::middleware(['auth'])->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard');
    });

    // Semua route yang pakai prefix 'admin' dimasukkan ke sini agar aman
    Route::prefix('admin')->name('admin.')->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Manajemen Kegiatan
        Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
        Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
        Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

        // Manajemen Target
        Route::get('/target', [TargetController::class, 'index'])->name('target');
        Route::post('/target', [TargetController::class, 'store'])->name('target.store');
        Route::post('/target/toggle/{id}', [TargetController::class, 'toggleStatus'])->name('target.toggle');
        Route::delete('/target/{id}', [TargetController::class, 'destroy'])->name('target.destroy');

        Route::get('/users', [AuthController::class, 'indexUser'])->name('users.index');
        Route::post('/users', [AuthController::class, 'storeUser'])->name('users.store');
        Route::delete('/users/{id}', [AuthController::class, 'destroyUser'])->name('users.destroy');
    });
});
