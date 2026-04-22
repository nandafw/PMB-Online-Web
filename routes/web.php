<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PendaftaranAdminController;
use App\Http\Controllers\KabupatenController;
use Illuminate\Support\Facades\Route;

//PUBLIC
Route::get('/',         [HomeController::class, 'index'])->name('home');
Route::get('/tentang',  [HomeController::class, 'tentang'])->name('tentang');
Route::get('/kontak',   [HomeController::class, 'kontak'])->name('kontak');

//AUTH
Route::middleware('guest')->group(function () {
    Route::get('/login',   [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',  [AuthController::class, 'login']);
    Route::get('/register',[AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/api/kabupatens/{provinsi_id}', [KabupatenController::class, 'byProvinsi'])->name('api.kabupatens');

//USER (Calon Mahasiswa)
Route::middleware('auth')->group(function () {
    Route::get('/pendaftaran',        [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::get('/pendaftaran/form',   [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran',       [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/riwayat',[PendaftaranController::class, 'riwayat'])->name('pendaftaran.riwayat');
    Route::get('/pendaftaran/{id}/cetak', [PendaftaranController::class, 'cetak'])->name('pendaftaran.cetak');
});

//ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/',  [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Pendaftaran
    Route::resource('pendaftaran', PendaftaranAdminController::class)->except(['create', 'store']);
    Route::patch('pendaftaran/{id}/status', [PendaftaranAdminController::class, 'updateStatus'])->name('pendaftaran.status');
});