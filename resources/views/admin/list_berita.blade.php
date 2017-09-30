@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Beranda</li>
    <li class="active">Berita</li>
    <li class="active">List Berita</li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- PAGE TITLE -->
  <div class="page-title">
    <h2>Data Berita </h2>
  </div>
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">
    <div class="row">
      <div class="col-md-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
          <div class="panel-heading">
						<div class="panel-title">
							<a href="/admin/berita/add" class="btn btn-primary btn-rounded"><span class="fa fa-plus"></span>Tambah Berita</a>
						</div>
          </div>
          <div class="panel-body">
            <table class="table datatable">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Berita</center></th>
                  <th><center>Tangal Berita</center></th>
									<th><center>Penulis</center></th>
                  <th><center>Tools<center></th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 0;
                @endphp
                @foreach ($berita as $beritas)
                  <tr>
                    <td><center>{{$no+=1}}</center></td>
                    <td>{{$beritas->judul}}</td>
                    <td>{{$beritas->created_at}}</td>
                    <td>{{$beritas->admin->nama}}</td>
                    <td>
                      <center>
                        <a href="/admin/berita/{{Crypt::encryptString($beritas->id)}}/edit">
                          <button class="btn btn-primary btn-rounded btn-sm" data-toggle="tooltip" title="Edit" data-placement="bottom"><span class="fa fa-pencil"></span></button>
                        </a>
                        {{-- Hapus Tanpa Validasi Ini
                        <a href="/admin/berita/{{Crypt::encryptString($beritas->id)}}/delete">
                          <button class="btn btn-danger btn-rounded btn-sm" data-toggle="tooltip" title="Delete" data-placement="bottom"><span class="fa fa-times"></span></button>
                        </a> --}}
                        <button class="btn btn-danger btn-rounded btn-sm" title="Delete" data-placement="bottom" ><span class="fa fa-times" onclick="idHapus('/admin/berita/{{Crypt::encryptString($beritas->id)}}/delete')" data-toggle="modal" data-target="#modal-konfirmasi"></span></button>
                      </center>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
      </div>
      <!-- END SIMPLE DATATABLE -->
    </div>
  </div>
</div>
<!-- PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

{{-- Validasi Hapus Berita  --}}
<div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">

      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body btn-info">
          Apakah Anda yakin ingin menghapus data ini ?
      </div>
      <div class="modal-footer">
          <a href="#" class="btn btn-danger" id="tombolHapus">Hapus</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>

      </div>
  </div>
</div>

<script>
function idHapus(id)
{
  document.getElementById("tombolHapus").href = id;
}
</script>

@endsection
