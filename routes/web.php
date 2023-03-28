<?php

use App\Http\Controllers\Backend\DataPaketLatihanController;
use App\Http\Controllers\Backend\DataPelatihController;
use App\Http\Controllers\Backend\DataPengaduanController;
use App\Http\Controllers\Backend\PelangganController;
use App\Http\Controllers\Backend\TransaksiController;
use App\Http\Controllers\Frontend\AduanControllerr;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DaftarController;
use App\Http\Controllers\Frontend\PelatihController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Models\DataPelatih;
use App\Models\DataPengaduan;
use App\Models\PaketLatihan;
use App\Models\Transaksi;
use App\Models\User;
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
    return view('frontend.dashboard');
})->name('homepage');

Route::group(['middleware' => ['role:admin', 'auth']], function () {

    // Dashboard
    Route::get('/dashboard', function () {
        $paket = PaketLatihan::count();
        $aduan = DataPengaduan::count();
        $transaksi = Transaksi::count();
        $pelatih = DataPelatih::count();
        $user = User::where('level', 'pelanggan')->count();
        return view('backend.dashboard', compact('paket', 'aduan', 'transaksi', 'user', 'pelatih'));
    })->name('dashboard');

    // Data Pelanggan
    Route::resource('pelanggan', PelangganController::class);

    // Data Pelatih
    Route::resource('dataPelatih', DataPelatihController::class);
    Route::get('/getDataPelatih', DataPelatihController::class . '@getDataPelatih');

    // Data Paket Latihan
    Route::resource('paket', DataPaketLatihanController::class);

    // Data Pengaduan
    Route::resource('pengaduan', DataPengaduanController::class);

    // Data Transaksi
    Route::resource('transaksi', TransaksiController::class);
    Route::get('/history', TransaksiController::class . '@history')->name('history.index');
});

Route::resource('daftar', DaftarController::class);
Route::resource('profile', ProfileController::class);
Route::resource('pelatih', PelatihController::class);

Route::get('/jadwal', DaftarController::class . '@getJadwal')->name('jadwal.index');
Route::get('/tutorial', function () {
    return view('frontend.pages.tutorial');
})->name('tutorial.index');

Route::group(['middleware' => ['role:user', 'auth']], function () {
    Route::resource('aduan', AduanControllerr::class);
    Route::get('/aduanSukses', AduanControllerr::class . '@aduanSuccess')->name('aduan.success');
    Route::get('/checkout/{id}', CheckoutController::class . '@checkout')->name('checkout');
    Route::post('/order', CheckoutController::class . '@store')->name('store.transaction');
    Route::get('/orderSukses', CheckoutController::class . '@orderSuccess')->name('order.success');
});


Route::get('/coba', function () {
    return PaketLatihan::with(['detail'])->where('id', 1)->where('status', 'aktif')->get();
});

require __DIR__ . '/auth.php';
