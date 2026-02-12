<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/profile', function() {
    return view('profile');
})->name('profile');

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\TargetController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
    
    // Route dashboard & target biarkan dulu atau sesuaikan
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('/target', [TargetController::class, 'index'])->name('target');
    Route::post('/target', [TargetController::class, 'store'])->name('target.store');
    Route::post('/target/toggle/{id}', [TargetController::class, 'toggleStatus'])->name('target.toggle');
    Route::delete('/target/{id}', [TargetController::class, 'destroy'])->name('target.destroy');
});
