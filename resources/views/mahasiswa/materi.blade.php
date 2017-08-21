@extends('mahasiswa.layouts.master')
@section('tittle')
  test
@endsection
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li><a href="mahasiswa.php">Home</a></li>
	  <li class="active"><a href="materi.php">Materi</a></li>
  </ul>
  <!-- END BREADCRUMB -->
	<!-- PAGE TITLE -->
  <div class="page-title">
    <h1> Materi Praktikum </h1>
  </div>
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <!-- END PAGE TITLE -->
  <div class="container">
		<div class="row">
      @foreach ($jadwal as $jadwals)
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="thumbnail img-thumb-bg">
            <img src="/images/materi/{{$jadwals->materi->gambar}}">
            <div class="overlay"></div>
            <div class="caption">
              <h3 style="color:#fff">{{$jadwals->materi->materi_praktikum}}</h3>
              <div class="title">{{$jadwals->dosen->nama}}</div>
              <div class="title">Semester Minimal : {{$jadwals->materi->semester}}</div>
              <div class="content">
                <td class="center"><button class="btn btn-success btn-rounded"><i class="fa fa-info-circle"></i><a href="/mahasiswa/materi/{{Crypt::encryptString($jadwals->id)}}"> Informasi </a></button></td>
              </div>
            </div>
          </div>
        </div>
      @endforeach
		</div>
	</div>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
      </div>
        <!-- END PAGE CONTAINER -->
@endsection
