<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TargetController;
use App\Models\Diagram;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\Setting;
use App\Models\Target;
use Illuminate\Support\Facades\Route;

// --- HALAMAN PUBLIK (Bisa diakses siapa saja) ---
Route::get('/', function () {
    // 2. AMBIL DATA SETTINGS DARI DATABASE
    $settings = Setting::pluck('value', 'key');

    $targets = Target::where('is_active', true)->get();
    $kegiatans = Kegiatan::latest()->get();
    $diagrams = Diagram::all();

    // Sekarang variabel $settings sudah ada dan bisa dikirim
    return view('index', compact('targets', 'kegiatans', 'settings', 'diagrams'));
})->name('home');

Route::get('/profile', function () {
    // Ambil data yang dibutuhkan untuk halaman profile
    $settings = \App\Models\Setting::pluck('value', 'key');
    $programs = \App\Models\Program::all();

    // Kirim variabel ke view profile
    return view('profile', compact('settings', 'programs'));
})->name('profile');

// --- PROSES LOGIN ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/links', function () {
    return view('links');
})->name('links');


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

        Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings');
        Route::post('/settings', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');

        Route::post('/diagram', [SettingController::class, 'storeDiagram'])->name('diagram.store');
        Route::delete('/diagram/{id}', [SettingController::class, 'destroyDiagram'])->name('diagram.destroy');

        // Di dalam Route::prefix('admin')->name('admin.')->group(function () { ...

        // Cukup begini:
        Route::post('/program', [SettingController::class, 'storeProgram'])->name('program.store');
        Route::delete('/program/{id}', [SettingController::class, 'destroyProgram'])->name('program.destroy');

        // });
    });
});
