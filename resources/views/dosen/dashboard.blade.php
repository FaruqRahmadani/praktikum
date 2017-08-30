@extends('dosen.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
      <li><a href="home.php" data-toggle="tooltip" title="Go to Home" data-placement="bottom">Beranda</a></li>
  </ul>
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <!-- END BREADCRUMB -->
   <div class="page-content-wrap">
    <div class="row">
      <div class="col-md-12">
        <h1>Program Praktikun FTI UNISKA MAB</h1>
          <div class="panel panel-default">
            <div class="panel-body">
              <center>
                <h2>Selamat Datang {{$datauser->nama}}</h2>
                <h3>Selamat Datang di Program Praktikum UNISKA MAB</h3>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
            <!-- END PAGE CONTENT -->
</div>
        <!-- END PAGE CONTAINER -->
@endsection
