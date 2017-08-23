@extends('admin.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Master Data</a></li>
                    <li class="active">Laporan Data Absen Praktikum</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2>Laporan Data Absen Praktikum </h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th><center>No</center></th>
                                                <th><center>Nama Dosen</center></th>
                                                <th><center>Materi Praktikum</center></th>
                                                <th><center>Kelas</center></th>
                                                <th><center>Ruangan</center></th>
                                                <th><center>Pertemuan</center></th>
                                                <th><center>Tanggal</center></th>
                                                <th><center>Waktu</center></th>
                                                <th><center>Jumlah Mahasiswa</center></th>
                                                <th><center>Print</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                            $no = 0;
                                          @endphp
                                          @foreach ($data as $datas)
                                            @foreach ($datas->JadwalPraktikum as $jadwals)
                                            <tr>
                                                <td><center>{{$no = $no +1}}</center></td>
                                                <td><center>{{$datas->Dosen->nama}}</center></td>
                                                <td><center>{{$datas->materi->materi_praktikum}}</center></td>
                                                <td><center>{{$jadwals->nama_kelas}}</center></td>
                                                <td><center>{{$jadwals->ruangan}}</center>
                                                <td><center>{{$jadwals->pertemuan}}</center>
                                                <td><center>{{$jadwals->tanggal}}</center>
                                                <td><center>{{Carbon\Carbon::parse($jadwals->waktu_mulai)->format('g:i A')}} - {{Carbon\Carbon::parse($jadwals->waktu_selesai)->format('g:i A')}}</center>
                                                <td><center>{{count(App\AbsensiMahasiswa::where('id_jadwal_praktikum', $jadwals->id)->get())}} Orang</center>
                                                <td><a href="/admin/laporan_absen/{{Crypt::encryptString($jadwals->id)}}" target="_blank"><button class="btn btn-default btn-rounded btn-sm" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-print"></span> Print</button></a></td>
                                            </tr>
                                            @endforeach
                                          @endforeach
                                        </tbody>
                                    </table>
									<button class="btn btn-info btn-rounded" onclick="myfunction()"><span class="fa fa-print"></span>Print</button>
									<script type="text/javascript">
										function myfunction() {
											window.print();
										}
									</script>
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
