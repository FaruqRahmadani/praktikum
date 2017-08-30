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

Route::get('/home', 'DashboardController@index')->name('home');

// Route::get('/dashboard', function()
// {
//   if (Auth::user()->tipe == 1){
//     // return view('depan.index');
//   } else {
//     // return view('depan.index');
//   }
// });
Route::get('/registermahasiswa', 'DashboardController@registermahasiswa');
Route::get('/registerdosen', 'DashboardController@registerdosen');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/pdf', 'DashboardController@pdf');
Route::get('/mail', 'DashboardController@mail');

Route::group(['middleware' => 'dosen'], function(){
  Route::get('/dosen', 'DosenController@dashboard');
  Route::get('/dosen/profil', 'DosenController@viewprofil');
  Route::get('/dosen/editprofil', 'DosenController@editprofil');
  Route::POST('/dosen/editprofil', 'DosenController@storeeditprofil');
  Route::get('/dosen/datamahasiswa', 'DosenController@datamahasiswa');
  Route::get('/dosen/datamahasiswa/{id}', 'DosenController@datamahasiswadetail');
  Route::get('/dosen/datadosen', 'DosenController@datadosen');
  Route::get('/dosen/datadosen/{id}', 'DosenController@datadosendetail');
  Route::get('/dosen/materi', 'DosenController@datamateri');
  Route::DELETE('/dosen/materi/{id}', 'DosenController@deletemateri');
  Route::get('/dosen/materi/add', 'DosenController@tambahmateri');
  Route::get('/dosen/materi/add/{id}', 'DosenController@storetambahmateri');
  Route::get('/dosen/jadwal', 'DosenController@datajadwal');
  Route::get('/dosen/jadwal/add', 'DosenController@tambahjadwal');
  Route::POST('/dosen/jadwal/add', 'DosenController@storetambahjadwal');
  Route::get('/dosen/jadwal/edit/{ids}', 'DosenController@editjadwal');
  Route::POST('/dosen/jadwal/edit/{ids}', 'DosenController@storeeditjadwal');
  Route::get('/dosen/jadwal/{id}/{status}', 'DosenController@ubahstatusjadwal');
  Route::get('/dosen/absen', 'DosenController@viewabsen');
  Route::POST('/dosen/absen', 'DosenController@viewfilterabsen');
  Route::get('/dosen/absen/{id}', 'DosenController@printAbsenSpesified');
  Route::get('/dosen/cetakabsen/{id}', 'DosenController@printAllAbsen');
});

Route::group(['middleware' => 'mahasiswa'], function(){
  Route::get('/mahasiswa', 'MahasiswaController@dashboard');
  Route::get('/mahasiswa/materi', 'MahasiswaController@materi');
  Route::get('/mahasiswa/materi/{id}', 'MahasiswaController@showmateri');
  Route::POST('/mahasiswa/materi/{id}', 'MahasiswaController@storeshowmateri');
  Route::get('/mahasiswa/jadwalsaya', 'MahasiswaController@jadwalsaya');
  Route::get('/mahasiswa/profil', 'MahasiswaController@viewprofil');
  Route::get('/mahasiswa/editprofil', 'MahasiswaController@vieweditprofil');
  Route::POST('/mahasiswa/editprofil', 'MahasiswaController@storeeditprofil');
});


Route::group(['middleware' => 'admin'], function(){
  Route::get('/admin', 'AdminController@dashboard');
  Route::get('/admin/edit', 'AdminController@EditProfil');
  Route::POST('/admin/edit', 'AdminController@storeEditProfil');
  Route::get('/admin/edit', 'AdminController@Profil');
  Route::get('/admin/periode', 'AdminController@DataPeriode');
  Route::get('/admin/periode/tambah', 'AdminController@tambahDataPeriode');
  Route::POST('/admin/periode/tambah', 'AdminController@storetambahDataPeriode');
  Route::get('/admin/periode/{id}/edit', 'AdminController@editDataPeriode');
  Route::POST('/admin/periode/{id}/edit', 'AdminController@storeeditDataPeriode');
  Route::get('/admin/datamahasiswa', 'AdminController@datamahasiswa');
  Route::get('/admin/datamahasiswa/{id}/edit', 'AdminController@editDataMahasiswa');
  Route::POST('/admin/datamahasiswa/{id}/edit', 'AdminController@storeeditDataMahasiswa');
  Route::get('/admin/datadosen', 'AdminController@datadosen');
  Route::get('/admin/datadosen/{id}/edit', 'AdminController@editDataDosen');
  Route::POST('/admin/datadosen/{id}/edit', 'AdminController@storeeditDataDosen');
  Route::get('/admin/galeri', 'AdminController@datagaleri');
  Route::get('/admin/datamateri', 'AdminController@datamateri');
  Route::get('/admin/tambahmateri', 'AdminController@formtambahmateri');
  Route::POST('/admin/tambahmateri', 'AdminController@storetambahmateri');
  Route::get('/admin/editmateri/{id}', 'AdminController@formeditmateri');
  Route::POST('/admin/editmateri/{id}', 'AdminController@storeeditmateri');
  Route::get('/admin/laporan_absen', 'AdminController@viewlaporanabsen');
  Route::POST('/admin/laporan_absen', 'AdminController@viewLaporanAbsenSpesified');
  Route::get('/admin/laporan_absen/{id}', 'AdminController@printlaporanabsen');
  Route::get('/admin/laporan_praktikum', 'AdminController@viewLaporanPraktikum');
  Route::POST('/admin/laporan_praktikum', 'AdminController@viewLaporanPraktikumPeriode');
  Route::get('/admin/laporan_praktikum/{id}', 'AdminController@printLaporanPraktikum');
  Route::get('/admin/detaillaporan_praktikum', 'AdminController@viewDetailLaporanPraktikum');
  Route::POST('/admin/detaillaporan_praktikum', 'AdminController@viewDetailLaporanPraktikumSelected');
  Route::get('/admin/detaillaporan_praktikum/{idDosen}/{idPeriode}', 'AdminController@printDetailLaporanPraktikum');
  Route::get('/admin/berita/add', 'AdminController@tambahberita');
  Route::POST('/admin/berita/add', 'AdminController@storetambahberita');
  Route::get('/admin/berita', 'AdminController@listberita');
  Route::get('/admin/berita/{id}/edit', 'AdminController@editberita');
  Route::POST('/admin/berita/{id}/edit', 'AdminController@storeeditberita');
  Route::get('/admin/berita/{id}/delete', 'AdminController@deleteberita');
});

Route::get('/{code1}/{code2}/{code3}/{code4}', 'Auth\AdminLoginController@LoginForm');
Route::POST('/admin/angkaacakkawakahkada', 'Auth\AdminLoginController@login')->name('admin.login.submit');
