<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DesaController as AdminDesaController;
use App\Http\Controllers\Admin\PendudukController as AdminPendudukController;
use App\Http\Controllers\Admin\PerangkatDesaController as AdminPerangkatDesaController;
use App\Http\Controllers\Admin\AsetDesaController as AdminAsetDesaController;
use App\Http\Controllers\Admin\AsetTanahWargaController as AdminAsetTanahWargaController;
use App\Http\Controllers\Admin\DokumenController as AdminDokumenController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AdminDesa\DashboardController as AdminDesaDashboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Kecamatan Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/monitoring', [AdminDashboardController::class, 'monitoring'])->name('monitoring');
    Route::get('/statistik', [AdminDashboardController::class, 'statistik'])->name('statistik');
    // Tambahkan di dalam group admin routes
    Route::get('penduduk/download-template', [AdminPendudukController::class, 'downloadTemplate'])->name('penduduk.download-template');
    
    // Data Desa
    Route::resource('desa', AdminDesaController::class);
    Route::post('desa/{desa}/update-coordinates', [AdminDesaController::class, 'updateCoordinates'])->name('desa.update-coordinates');
    
    // Perangkat Desa
    Route::resource('perangkat-desa', AdminPerangkatDesaController::class);
    Route::get('perangkat-desa/{perangkat}/riwayat', [AdminPerangkatDesaController::class, 'riwayat'])->name('perangkat-desa.riwayat');
    
    // Data Penduduk
    Route::resource('penduduk', AdminPendudukController::class);
    Route::get('penduduk/export/excel', [AdminPendudukController::class, 'exportExcel'])->name('penduduk.export.excel');
    Route::get('penduduk/export/pdf', [AdminPendudukController::class, 'exportPdf'])->name('penduduk.export.pdf');
    Route::post('penduduk/import', [AdminPendudukController::class, 'import'])->name('penduduk.import');
    
    // Aset Desa
    Route::resource('aset-desa', AdminAsetDesaController::class);
    Route::get('aset-desa/{aset}/riwayat', [AdminAsetDesaController::class, 'riwayat'])->name('aset-desa.riwayat');
    
    // Aset Tanah Warga
    Route::resource('aset-tanah-warga', AdminAsetTanahWargaController::class);
    
    // Dokumen
    Route::resource('dokumen', AdminDokumenController::class);
    Route::get('dokumen/{dokumen}/download', [AdminDokumenController::class, 'download'])->name('dokumen.download');
    
    // User Management
    Route::resource('users', AdminUserController::class);
    Route::post('users/{user}/toggle-status', [AdminUserController::class, 'toggleStatus'])->name('users.toggle-status');
    Route::post('users/{user}/reset-password', [AdminUserController::class, 'resetPassword'])->name('users.reset-password');
});

// Admin Desa Routes
Route::prefix('admin-desa')->name('admin-desa.')->middleware(['auth', 'admin_desa'])->group(function () {
    Route::get('/dashboard', [AdminDesaDashboardController::class, 'index'])->name('dashboard');
    
    // Routes untuk Admin Desa akan ditambahkan nanti
});

// Redirect after login
Route::get('/dashboard', function () {
    $user = Auth::user();
    
    if (!$user) {
        return redirect()->route('login');
    }
    
    if ($user->role === 'admin_kecamatan') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'admin_desa') {
        return redirect()->route('admin-desa.dashboard');
    }
    
    return redirect()->route('login');
})->middleware('auth')->name('dashboard');