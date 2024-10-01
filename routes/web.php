<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\SuplayerController;
use App\Http\Controllers\UAKPBController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/ubah-password', [App\Http\Controllers\HomeController::class, 'ubah_password'])->name('ubahpassword');
    Route::post('/ubah-password', [App\Http\Controllers\HomeController::class, 'post_ubah_password'])->name('post.ubahpassword');
    Route::get('/UAKPB', [UAKPBController::class, 'index'])->name('UAKPB.index');
    Route::post('/UAKPB/{id}', [UAKPBController::class, 'update'])->name('UAKPB.update');

    Route::resource('ruangan', RuanganController::class)->except([
        'create', 'show'
    ]);
    Route::resource('barang', JenisBarangController::class)->except([
        'show'
    ]);
    Route::resource('detailbarang', DetailBarangController::class);
    Route::resource('vendor', SuplayerController::class)->except([
        'create', 'show', 'edit', 'update'
    ]);
    Route::resource('detailbarang-maintenance', MaintenanceController::class)->except([
        'index', 'create', 'show'
    ]);
    Route::resource('user', UserController::class);
    Route::get('/cetak', [CetakController::class, 'index'])->name('cetak.index');
    Route::post('/cetak', [CetakController::class, 'filter'])->name('cetak.filter');
    Route::get('/cetak/{id}', [CetakController::class, 'result'])->name('cetak.result');
    Route::get('/cetak/satuan/{id}', [CetakController::class, 'cetak_satuan'])->name('cetak.cetak_satuan');
    Route::get('/cetak/ruangan/{id}', [CetakController::class, 'cetak_label'])->name('cetak.cetak_label');
    Route::get('/cetak/dokumen/{id}', [CetakController::class, 'cetak_dokumen'])->name('cetak.cetak_dokumen');
    Route::get('/import', [ImportController::class, 'index'])->name('import.index');
    Route::post('/import', [ImportController::class, 'store'])->name('import.store');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/dashboard', [PenggunaController::class, 'dashboard'])->name('pengguna.dashboard');
    Route::get('/pengguna-ubahpaswd', [PenggunaController::class, 'ubah_password'])->name('pengguna.ubah_password');
    Route::post('/dashboard', [PenggunaController::class, 'filter'])->name('pengguna.filter');
    Route::get('/dashboard/{id}', [PenggunaController::class, 'result'])->name('pengguna.result');
    Route::get('/dashboard/perbaiki/{id}', [PenggunaController::class, 'perbaiki'])->name('pengguna.perbaiki');
    Route::get('/perbaikan', [PenggunaController::class, 'perbaikan'])->name('perbaikan');
});

Route::get('/scan', [ScanController::class, 'index'])->name('scan.index');
Route::get('/scan/{nomor}', [ScanController::class, 'result'])->name('scan.result');
