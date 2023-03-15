<?php

use App\Http\Controllers\Backend\DataPaketLatihanController;
use App\Http\Controllers\Backend\DataPelatihController;
use App\Http\Controllers\Backend\DataPengaduanController;
use App\Http\Controllers\Backend\PelangganController;
use App\Http\Controllers\Backend\TransaksiController;
use App\Http\Controllers\Frontend\AduanControllerr;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DaftarController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Models\Transaksi;
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
        return view('backend.dashboard');
    })->name('dashboard');

    // Data Pelanggan
    Route::resource('pelanggan', PelangganController::class);

    // Data Pelatih
    Route::resource('pelatih', DataPelatihController::class);
    Route::get('/getDataPelatih', DataPelatihController::class . '@getDataPelatih');

    // Data Paket Latihan
    Route::resource('paket', DataPaketLatihanController::class);

    // Data Pengaduan
    Route::resource('pengaduan', DataPengaduanController::class);

    // Data Transaksi
    Route::resource('transaksi', TransaksiController::class);

});

Route::resource('daftar', DaftarController::class);
Route::resource('aduan', AduanControllerr::class);
Route::resource('profile', ProfileController::class);

Route::group(['middleware' => ['role:user', 'auth']], function () {
    Route::get('/checkout/{id}', CheckoutController::class . '@checkout')->name('checkout');
    Route::post('/order', CheckoutController::class . '@store')->name('store.transaction');
    Route::get('/orderSukses', CheckoutController::class. '@orderSuccess')->name('order.success');
});


Route::get('/coba', function(){
    return Transaksi::with(['pelanggan', 'paket'])->where('status_bo', 'waiting')->get();
});

require __DIR__ . '/auth.php';
