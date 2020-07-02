<?php

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

Route::get('/', 'ActionController@konsumen')->name('konsumen.index.blank');
Route::get('/konsumen', 'ActionController@konsumen')->name('konsumen.index');
Route::get('/konsumen/tambah', 'ActionController@konsumenTambah')->name('konsumen.tambah');
Route::post('/konsumen/simpan', 'ActionController@konsumenSimpan')->name('konsumen.simpan');
Route::get('/konsumen/lihat/{id}', 'ActionController@konsumenLihat')->name('konsumen.lihat');
Route::get('/konsumen/hapus/{id}', 'ActionController@konsumenHapus')->name('konsumen.hapus');

Route::get('/tarnsaksi', 'ActionController@tarnsaksi')->name('transaksi.index');
