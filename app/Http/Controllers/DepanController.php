<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Berita;

class DepanController extends Controller
{
    public function index()
    {
      $Materi = Materi::all();
      $Berita = Berita::with('admin')->get();
      // dd($Berita);
      return view('depan.index', ['materi' => $Materi, 'berita' => $Berita]);
    }
}
