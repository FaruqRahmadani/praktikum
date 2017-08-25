@extends('mahasiswa.layouts.master')
@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active">Menu</li>
                <li class="active">Proses Data</li>
                <li><a href="data_dosen.php" data-toggle="tooltip" title="Go to Data Dosen" data-placement="bottom">Jadwal Dosen</a></li>
                <li><a href="tambah_dosen.php" data-toggle="tooltip" title="Go to Data Dosen" data-placement="bottom">Tambah Data</a></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- START VALIDATIONENGINE PLUGIN -->
                            <div class="block">
                                <h2>Tambah Data Jadwal Praktikum</h2>
                                <hr>
                                @if (session('status'))
                                  <div class="alert alert-success" role="alert">
                                    <div class=class="col-md-5">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <h4>{{ session('status') }}</h4>
                                    </div>
                                  </div>
                                @endif

                                @if(count($errors) > 0)
                                  <ul>
                                    @foreach ($errors->all() as $error)
                                      <li> {{$error}} </li>
                                    @endforeach
                                  </ul>
                                @endif

                                <form class="form-horizontal" method="POST" action="{{Request::url()}}">
                                  <div class="form-group">
                                      <label class="col-md-5 control-label"><h4><b>Nama Dosen:</b></h4></label>
                                      <div class="col-md-5">
                                        <label class="control-label"><h4><b>{{$jadwal->dosen->nama}}</b></h4></label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-5 control-label"><h4><b>Materi :</b></h4></label>
                                      <div class="col-md-5">
                                        <label class="control-label"><h4><b>{{$jadwal->materi->materi_praktikum}}</b></h4></label>
                                      </div>
                                  </div>


                                  <div class="form-group">
                                      <label class="col-md-5 control-label"><h4><b>Semester Minimal :</b></h4></label>
                                      <div class="col-md-5">
                                        <label class="control-label"><h4><b>{{$jadwal->materi->semester}}</b></h4></label>
                                      </div>
                                  </div>
                                  @for ($i=1; $i <= $jadwal->JadwalPraktikum->max('pertemuan') ; $i++)
                                    <div class="form-group">
                                      <label class="col-md-5 control-label"><h4><b>Pertemuan Ke- {{$i}} :</b></h4></label>
                                      <div class="col-md-5">
                                        <input type="text" class="form-control" name="pertemuan{{$i}}" id="pertemuan{{$i}}">
                                        <input type="hidden" class="form-control" name="idpertemuan{{$i}}" id="idpertemuan{{$i}}">
                                        <button type="button" class="btn btn-info btn-rounded2" data-toggle="modal" data-target="#myModal{{$i}}">
                                          <span class="fa fa-times"></span>Pilih
                                        </button>
                                      </div>
                                    </div>

                                  @endfor

                                    {{ csrf_field() }}
                                    <button type="reset" class="btn btn-danger btn-rounded2">
                                        <span class="fa fa-times"></span>Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-rounded1">
                                        <span class="fa fa-save"></span>Simpan
                                    </button>
                                </form>

                                @for ($i=1; $i <= $jadwal->JadwalPraktikum->max('pertemuan') ; $i++)
                                  <div id="myModal{{$i}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Pertemuan Ke - {{$i}}</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="panel-body">
                                            <table class="table datatable">
                                              <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>Nama Kelas</th>
                                                  <th>Ruangan</th>
                                                  <th>Tanggal</th>
                                                  <th>Jam</th>
                                                  <th>Tools</th>
                                                </tr>
                                              </thead>

                                              <tbody>
                                                <?php $no = 0 ?>
                                                @foreach ($jadwal->JadwalPraktikum as $JadwalPraktikum)
                                                  @if ($JadwalPraktikum->pertemuan == $i)
                                                    @php
                                                      $tanggal    = Carbon\Carbon::parse($JadwalPraktikum->tanggal)->format('d-m-Y');
                                                      $jammulai   = Carbon\Carbon::parse($JadwalPraktikum->waktu_mulai)->format('H:i A');
                                                      $jamselesai = Carbon\Carbon::parse($JadwalPraktikum->waktu_selesai)->format('H:i A');
                                                      $jumlah     = count(\App\AbsensiMahasiswa::where('id_jadwal_praktikum',$JadwalPraktikum->id)->get());
                                                    @endphp
                                                    <tr>
                                                      <td>{{$no = $no+1}}</td>
                                                      <td>{{$JadwalPraktikum->nama_kelas}}</td>
                                                      <td>{{$JadwalPraktikum->ruangan}}</td>
                                                      <td>{{$tanggal}}</td>
                                                      <td>{{$jammulai}} - {{$jamselesai}}</td>
                                                      @if ($jumlah < 40)
                                                        <td class="center"><button class="btn btn-success btn-rounded" data-dismiss="modal" onclick="isi('{{$i}}',{{$JadwalPraktikum->id}},'{{$tanggal}}','{{$jammulai}} - {{$jamselesai}}')"><i class="fa fa-arrow-circle-o-up"></i> Ambil </button></td>
                                                      @else
                                                        <td class="center"><button class="btn btn-success btn-rounded" data-dismiss="modal" onclick="isi('{{$i}}',{{$JadwalPraktikum->id}},'{{$tanggal}}','{{$jammulai}} - {{$jamselesai}}')" disabled><i class="fa fa-arrow-circle-o-up"></i> Jadwal Penuh </button></td>
                                                      @endif
                                                    </tr>
                                                  @endif
                                                @endforeach
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" name="isi" id="isi" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @endfor

                            </div>
                            <!-- END VALIDATIONENGINE PLUGIN -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
          function isi(ke,id,tanggal,jam){
            document.getElementById('pertemuan'+ke).value = 'Tanggal : '+tanggal+' | Jam : '+jam;
            document.getElementById('idpertemuan'+ke).value = id;
          }
        </script>
@endsection
