<?php

use App\Http\Controllers\Backend\DataPaketLatihanController;
use App\Http\Controllers\Backend\DataPelatihController;
use App\Http\Controllers\Backend\DataPengaduanController;
use App\Http\Controllers\Backend\PelangganController;
use App\Http\Controllers\Frontend\AduanControllerr;
use App\Http\Controllers\Frontend\DaftarController;
use App\Http\Controllers\ProfileController;
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
});

Route::get('/masuk', function () {
    return view('backend.register');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['role:admin|user', 'auth']], function (){

    // Dashboard
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    // Data Pelanggan
    Route::resource('pelanggan', PelangganController::class);

    // Data Pelatih
    Route::resource('pelatih', DataPelatihController::class);
    Route::get('/getDataPelatih', DataPelatihController::class. '@getDataPelatih');

    // Data Paket Latihan
    Route::resource('paket', DataPaketLatihanController::class);

    // Data Pengaduan
    Route::resource('pengaduan', DataPengaduanController::class);

});

Route::resource('daftar', DaftarController::class);
Route::resource('aduan', AduanControllerr::class);

require __DIR__ . '/auth.php';
