<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminKaryawanController;
use App\Http\Controllers\Admin\AdminPembayaranController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\Admin\AdminBahanPokokController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminModalController;
use App\Http\Controllers\Kasir\KasirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;

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

Route::controller(AuthController::class)->group(function () {
  Route::get('admin', 'loginAdmin');
  Route::get('login', 'login');
  Route::get('logout', 'logout');
  Route::post('login-admin', 'loginAdminProses');
  Route::get('auth/google', 'redirectToGoogle');
  Route::get('auth/google/callback', 'handleGoogleCallback');
});


Route::controller(IndexController::class)->group(function () {
  Route::get('/', 'index')->name('login');
  Route::middleware('auth:member')->group(function () {
    Route::get('profil', 'profil');
    Route::get('profil/update', 'update');
    Route::get('keranjang', 'keranjang');
    Route::post('keranjang/proses', 'keranjangProses');
    Route::get('keranjang/{keranjang}/hapus', 'hapusKeranjang');
    Route::get('masuk-keranjang/{menu}', 'masukKeranjang');
    Route::get('invoice/{pesanan}', 'invoice');
    Route::put('upload-bukti/{pesanan}', 'uploadBukti');
  });
});




Route::prefix('admin')->middleware('auth')->group(function () {

  Route::controller(AdminController::class)->group(function () {
    Route::get('beranda', 'beranda');
  });

  Route::controller(AdminPesananController::class)->group(function () {
    Route::get('pesanan', 'index');
    Route::get('pesanan/{pesanan}/proses', 'proses');
    Route::get('pesanan/{pesanan}/struk', 'struk');
  });
  
  Route::prefix('master-data')->group(function () {
    Route::controller(AdminKategoriController::class)->group(function () {
      Route::get('kategori', 'index');
      Route::get('kategori/{kategori}/delete', 'destroy');
      Route::post('kategori/create', 'store');
    });

    Route::controller(AdminMenuController::class)->group(function () {
      Route::get('menu', 'index');
      Route::get('menu/create', 'create');
      Route::get('menu/{menu}/delete', 'destroy');
      Route::get('menu/{menu}/edit', 'edit');
      Route::put('menu/{menu}/edit', 'update');
      Route::post('menu/create', 'store');
    });


    Route::controller(AdminPembayaranController::class)->group(function () {
      Route::get('pembayaran', 'index');
      Route::post('pembayaran/create', 'store');
      Route::get('pembayaran/{pembayaran}/delete', 'destroy');
      Route::put('pembayaran/{pembayaran}/update', 'update');
    });

    Route::controller(AdminModalController::class)->group(function () {
      Route::get('modal', 'index');
      Route::post('modal/create', 'store');
    });
    
  });

  Route::controller(AdminKaryawanController::class)->group(function () {
    Route::get('data-karyawan', 'index');
    Route::get('data-karyawan/create', 'create');
    Route::post('data-karyawan/create', 'store');
    Route::get('data-karyawan/{admin}/delete', 'destroy');
    Route::get('data-karyawan/{admin}/edit', 'edit');
    Route::put('data-karyawan/{admin}/edit', 'update');
  });


  Route::prefix('laporan')->group(function () {
    Route::controller(AdminLaporanController::class)->group(function () {
      Route::get('penjualan/{tahun}', 'penjualan');
      Route::get('pendapatan/{tahun}', 'pendapatan');
      Route::get('history', 'history');
      Route::get('cetak-history', 'cetakHistory');
      Route::get('cetak-penjualan', 'cetakPenjualan');
    });
    });


  Route::controller(AdminProfilController::class)->group(function () {
    Route::get('profil', 'index');
    Route::put('update-password', 'updatePassword');
  });


  Route::controller(AdminBahanPokokController::class)->group(function () {
    Route::get('bahan-pokok', 'index');
  });

});


Route::prefix('kasir')->middleware('auth')->group(function () {

    Route::controller(KasirController::class)->group(function () {
      Route::get('beranda', 'beranda');
      Route::get('tambah/{menu}', 'tambah');
      Route::get('reset-menu/{pesanandetail}', 'resetMenu');
      Route::post('proses-pesanan', 'prosesPesanan');
      Route::get('cetak/{pesanan}/struk', 'cetak');
      Route::get('reset-pesanan', 'resetPesanan');
      Route::get('tutup-buku', 'tutupBuku');
      Route::get('pesanan', 'indexPesanan');
    });
});