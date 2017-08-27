@extends('admin.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active">Home</li>
                    <li><a href="#">Master Data</a></li>
                    <li class="active">Laporan Data Pelaksanaan Praktikum</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2>Laporan Data Pelaksanaan Praktikum </h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <form class="form-horizontal" method="POST" action="{{Request::url()}}">
                              <select class="form-control" name="periode">
                                @foreach ($periode as $dataPeriode)
                                  <option value="{{$dataPeriode->id}}"
                                    @if ($dataPeriode->id == $idperiode)
                                      selected
                                    @endif
                                  > {{$dataPeriode->periode}}</option>
                                @endforeach
                              </select>
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-info btn-rounded1">
                                  <span class="fa fa-save"></span>Pilih
                              </button>
                            </form>

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table datatable table-bordered">
                                        <thead>
                                            <tr>
                                                <th><center>No</center></th>
                                                <th><center>Nama Dosen</center></th>
                                                <th><center>Materi Praktikum<center></th>
                                                <th><center>Jumlah Kelas<center></th>
                                                <th><center>Jumlah Peserta<center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                            $no = 0;
                                          @endphp
                                          @foreach ($data as $datas)
                                            @php
                                              $JumlahPeserta = 0;
                                              $JadwalPraktikum = \App\JadwalPraktikum::where('id_jadwal_dosen', $datas->id)->get();
                                              $JumlahKelas = $JadwalPraktikum->max('pertemuan');
                                              foreach ($JadwalPraktikum as $JPraktikum) {
                                                $AbsensiMahasiswa = \App\AbsensiMahasiswa::where('id_jadwal_praktikum',$JPraktikum->id)->get();
                                                $JumlahPeserta = $JumlahPeserta+count($AbsensiMahasiswa);
                                              }
                                            @endphp
                                            <tr>
                                              <td><center>{{$no+=1}}</center></td>
                                              <td><center>{{$datas['dosen']->nama}}</center></td>
                                              <td><center>{{$datas['materi']->materi_praktikum}}</center>
                                              <td><center>{{$JumlahKelas > 0 ? $JumlahKelas:'0'}}</center>
                                              <td><center>{{$JumlahPeserta > 0 ? $JumlahPeserta:'0'}} Orang</center>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                  <a href="/admin/laporan_praktikum/{{Crypt::encryptString($idperiode)}}" target="_blank">
									                   <button class="btn btn-info btn-rounded"><span class="fa fa-print"></span>Print</button>
                                  </a>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

                        </div>
                    </div>

                </div>
                <!-- PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
@endsection
