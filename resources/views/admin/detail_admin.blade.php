@extends('admin.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                <li class="active">Master Data</li>
                <li class="active">Data Admin</li>
                <li class="active">Detail Admin</li>
                </ul>
                <!-- END BREADCRUMB -->
                 <div class="row">
                 <div class="page-title">
                    <h1>Detail Admin</h1>
                 </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="/images/admin/{{$data->foto}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <table class="table tabel-striped table-condensed">
                    <tr>
                        <th>Nama</th>
                        <td>{{$data->nama}}</td>
                    </tr>
                    {{-- @if ((substr(url()->current(),-6,6) == 'profil')) --}}
                      <tr>
                          <th>Username</th>
                          <td>{{$data->username}}</td>
                      </tr>
                    {{-- @endif --}}
                    <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
@endsection
