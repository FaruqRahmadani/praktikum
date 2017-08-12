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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'DepanController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/dashboard', function()
// {
//   if (Auth::user()->tipe == 1){
//     // return view('depan.index');
//   } else {
//     // return view('depan.index');
//   }
// });


Route::group(['middleware' => 'dosen'], function(){
  Route::get('/dashboard', 'DosenController@dashboard');
});
Route::group(['middleware' => 'mahasiswa'], function(){
  Route::get('/dashboard', 'MahasiswaController@dashboard');
});
