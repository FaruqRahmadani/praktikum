<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Berita;
use App\Galeri;

class DepanController extends Controller
{
    public function index()
    {
      $Materi = Materi::all();
      $Berita = Berita::with('admin')->limit(4)->orderBy('id', 'desc')->get();
      $Galeri = Galeri::all();
      // dd($Berita);
      return view('depan.index', ['materi' => $Materi, 'berita' => $Berita, 'galeri' => $Galeri]);
    }
}
