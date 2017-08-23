@extends('mahasiswa.layouts.master')
@section('tittle')
  Mahasiswa -  {{$data->nama}}
@endsection
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
      <li class="active"><a href="mahasiswa.php">Home</a></li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE TITLE -->
  <div class="page-title">
      <h1> Praktikum FTI Uniska </h1>
  </div>
  <!-- END PAGE TITLE -->
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <!-- PAGE CONTENT WRAPPER -->
	<hr>
  <div class="page-content-wrap">

    <!-- START TYPOGRAPHY -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
              <h2><center>Selamat Datang {{$data->nama}}</center></h2>
              <h3><center>Selamat Datang di Praktikum Uniska</center></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
