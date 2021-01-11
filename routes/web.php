<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout.adminlte');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','JadwalController@jadwal')->name('jadwal');

Route::middleware(['auth'])->group(function()
{
    Route::resource('barangs', 'BarangController')->middleware('can:dpk');
    Route::resource('fasilitas', 'FasilitasController', ['parameters' => ['fasilitas' => 'fasilitas']])->middleware('can:dpk');
    Route::resource('jadwals', 'JadwalController')->middleware('can:dpk');
    Route::resource('ormawas', 'OrmawaController')->middleware('can:dpk');

    Route::delete('/deleteallBarang', 'BarangController@deleteAll');
    Route::delete('/deleteallFasilitas', 'FasilitasController@deleteAll');
    Route::delete('/deleteallOrmawa', 'OrmawaController@deleteAll');
    Route::delete('/deleteallJadwal', 'JadwalController@deleteAll');

    Route::get('/home', 'HomeController@index')->name('home');
});
Auth::routes();