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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/data/create','KtpController@create')->name('ktp.create')->middleware('auth');
//Route::post('/data', 'KtpController@store')->name('ktp.store');
//Route::get('/data','KtpController@index')->name('ktp');
//Route::delete('data/{id}/delete', 'KtpController@destroy')->name('ktp.delete');
Route::resource('data/ktp', 'KtpController')->middleware('auth');

Route::get('data/kegiatan','kegiatanController@index')->name('ktp.kegiatan')->middleware('auth');
Route::get('data/kegiatan/ktp','kegiatanController@lock')->name('kegiatan.ktp')->middleware('auth');
Route::post('data/{id}/ktp','kegiatanController@simpan')->name('kegiatan.simpan')->middleware('auth');
Route::post('data/{id}/ktp/batal','kegiatanController@simpan')->name('kegiatan.batal')->middleware('auth');
Route::get('data/{id}/ktp/batal','kegiatanController@batal')->name('kegiatan.batal')->middleware('auth');
