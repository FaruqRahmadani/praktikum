@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Home</li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Laporan Detail Pelaksanaan Praktikum</li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE TITLE -->
  <div class="page-title">
    <h2>Laporan Detail Pelaksanaan Praktikum</h2>
  </div>
  <!-- END PAGE TITLE -->

  <div class="container">
	  <div class="row">
    <!-- edit form column -->
      <div class="panel panel-default">
	      <div class="panel-body">
          <div class="col-md-9 personal-info">
            <form class="form-horizontal" method="POST" action="{{Request::url()}}">

              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Dosen</label>
                <div class="col-sm-3">
				          <select name="idDosen" class="form-control" required>
						        <option selected disabled hidden value=""> Dosen </option>
                    @foreach ($dosen as $dataDosen)
                      <option value="{{$dataDosen->id}}">{{$dataDosen->nama}}</option>
                    @endforeach
				          </select>
			          </div>
              </div>

              <div class="form-group">
				        <label class="col-sm-3 control-label">Periode</label>
				        <div class="col-sm-3">
					        <select name="idPeriode" class="form-control" required>
            				<option selected disabled hidden value=""> Periode </option>
                    @foreach ($periode as $dataPeriode)
                      <option value="{{$dataPeriode->id}}">{{$dataPeriode->periode}}</option>
                    @endforeach
					        </select>
				        </div>
          		</div>

              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary btn-rounded">
                    <span class="fa fa-info" aria-hidden="true"></span>Lihat Detail
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
@endsection
