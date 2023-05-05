<?php

use App\Http\Controllers\Backend\DataLapanganController;
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
use App\Models\DataLapangan;
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
        $lapIn = DataLapangan::where('jenis_lap',  'indoor')->count();
        $lapOut = DataLapangan::where('jenis_lap',  'outdoor')->count();
        $aduan = DataPengaduan::count();
        $transaksi = Transaksi::count();
        $pelatih = DataPelatih::count();
        $user = User::where('level', 'pelanggan')->count();
        return view('backend.dashboard', compact('paket', 'aduan', 'transaksi', 'user', 'pelatih', 'lapIn', 'lapOut'));
    })->name('dashboard');

    // Data Pelanggan
    Route::resource('pelanggan', PelangganController::class);

    // Data Pelatih
    Route::resource('dataPelatih', DataPelatihController::class);
    Route::get('/getDataPelatih', DataPelatihController::class . '@getDataPelatih');
    Route::get('/getDataPelatih', DataPelatihController::class. '@index');

    // Data Paket Latihan
    Route::resource('paket', DataPaketLatihanController::class);

    // Data Lapangan
    Route::resource('dataLap', DataLapanganController::class);

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

    Route::get('/order/{id}', CheckoutController::class . '@order')->name('order.jadwal');

    Route::post('/contineOrder', CheckoutController::class . '@continueOrder')->name('continue.order');

    Route::get('/summary', CheckoutController::class. '@summary')->name('summary.index');

    Route::post('/order', CheckoutController::class . '@store')->name('store.transaction');

    Route::get('/orderSukses', CheckoutController::class . '@orderSuccess')->name('order.success');
});


Route::get('/coba', function () {
    // return PaketLatihan::with(['detail'])->where('id', 1)->where('status', 'aktif')->get();
        
    return
    $jadwal = Transaksi::with(['pelanggan', 'lapangan'])->where('status_pemb', 'pembayaran-valid')->get();
});

Route::get('/test', function () {
    return Transaksi::with(['lapangan'])->get();
});

Route::get('/getDataPelatih', function () {
    $data = DataPelatih::all();
    return response()->json([
        'data' => $data,
    ]);
});


require __DIR__ . '/auth.php';