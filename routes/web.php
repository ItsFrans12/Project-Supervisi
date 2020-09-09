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
 Route::get('/', 'AuthController@index');
  Route::post('post-login', 'AuthController@postLogin'); 
  Route::get('registration', 'AuthController@registration');
  Route::post('post-registration', 'AuthController@postRegistration'); 
  Route::get('dashboard', 'AuthController@dashboard'); 
  Route::get('logout', 'AuthController@logout');
  route::get('jedit', 'JadwalController@create');
  route::post('createjadwal','JadwalController@store');
  route::post('update1','JadwalController@update1');
  Route::get('file-upload', 'UploadsController@fileUpload')->name('file.upload');
Route::post('file-upload.post', 'UploadsController@fileUploadPost')->name('file.upload.post');
Route::post('UpdateJadwal','JadwalController@UploadJadwal')->name('UploadJadwal');
Route::post('UpdateStatus','JadwalController@UploadStatus')->name('UploadStatus');
Route::resource('jadwal','JadwalController');
Route::resource('status','StatusController');
Route::get('()()()', function () {
    return view('welcome');
});


