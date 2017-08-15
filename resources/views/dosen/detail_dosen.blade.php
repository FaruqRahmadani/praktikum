@extends('dosen.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                <li class="active">Master Data</li>
                <li><a href="data_dosen.php" data-toggle="tooltip" title="Go to Data Dosen" data-placement="bottom">Data Dosen</a></li>
                <li><a href="detail_dosen.php" data-toggle="tooltip" title="Go to Detail Dosen" data-placement="bottom">Detail Dosen</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                 <div class="row">
                 <div class="page-title">
                    <h1>Detail Dosen</h1>
                 </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="/images/dosen/{{$data->foto}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <table class="table tabel-striped table-condensed">
                    <tr>
                        <th>NIDN</th>
                        <td>{{$data->NIDN}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th>No Hp</th>
                        <td>{{$data->no_hp}}</td>
                    </tr>
                    </table>

                        <a href="home.php" class="btn btn-primary btn-rounded"><span class="fa fa-arrow-circle-left
                        Close" aria-hidden="true"></span>Kembali</a>
                        <a href="edit_dosen.php" class="btn btn-success btn-rounded"><span class="fa fa-edit Close"
                        aria-hidden="true"></span> Edit Data </a>
                        <a href="#" title="Hapus Data" onclick="return confirm('Anda yakin akan menghapus data<?php
                                            //echo $row['nama']; ?>?')" class="btn btn-danger btn-rounded"><span class=
                                            "glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
                    </div>
                </div>
            </div>
        </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
@endsection
