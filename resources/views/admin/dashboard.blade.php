@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
      <li class="active">Beranda</li>
  </ul>
  <!-- END BREADCRUMB -->
	<!-- PAGE TITLE -->
  <div class="page-title">
      <h2><center>Praktikum FTI UNISKA</center></h2>
  </div>
  <!-- END PAGE TITLE -->
  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">
    <!-- START TYPOGRAPHY -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <!-- START HEADING -->
            <h1><center>Selamat Datang Admin {{Auth::guard('admin')->user()->nama}} Di Praktikum UNISKA</center></h1>
            <!-- EOF HEADING -->

          </div>
        </div>
      </div>
    </div>
	</div>
@endsection
