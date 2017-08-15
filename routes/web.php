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

Route::get('/dashboard', 'DashboardController@index');

Route::group(['middleware' => 'dosen'], function(){
  Route::get('/dosen', 'DosenController@dashboard');
  Route::get('/dosen/datamahasiswa', 'DosenController@datamahasiswa');
  Route::get('/dosen/datamahasiswa/{id}', 'DosenController@datamahasiswadetail');
  Route::get('/dosen/datadosen', 'DosenController@datadosen');
  Route::get('/dosen/datadosen/{id}', 'DosenController@datadosendetail');
});

Route::group(['middleware' => 'mahasiswa'], function(){
  Route::get('/mahasiswa', 'MahasiswaController@dashboard');
});

Route::get('/{code1}/{code2}/{code3}/{code4}', 'Auth\AdminLoginController@LoginForm');
Route::POST('/admin/angkaacakkawakahkada', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::group(['middleware' => 'admin'], function(){
  Route::get('/admin', 'AdminController@dashboard');
  Route::get('/admin/datamahasiswa', 'AdminController@datamahasiswa');
  Route::get('/admin/datadosen', 'AdminController@datadosen');
  Route::get('/admin/datamateri', 'AdminController@datamateri');
  Route::get('/admin/tambahmateri', 'AdminController@formtambahmateri');
  Route::POST('/admin/tambahmateri', 'AdminController@storetambahmateri');
  Route::get('/admin/editmateri/{id}', 'AdminController@formeditmateri');
  Route::POST('/admin/editmateri/{id}', 'AdminController@storeeditmateri');
});
