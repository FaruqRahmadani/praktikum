@extends('admin.layouts.master')
@section('content')
  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
    <li class="active">Home</li>
    <li class="active">Master Data</li>
    <li class="active">Data Gallery</li>
  </ul>
  <!-- END BREADCRUMB -->

  <!-- START CONTENT FRAME -->
  <div class="content-frame">
    <!-- START CONTENT FRAME TOP -->
    <div class="content-frame-top">
      <div class="page-title">
        <h2><span class="fa fa-image"></span> Gallery</h2>
      </div>
    </div>

    <!-- START CONTENT FRAME RIGHT -->
    <div class="content-frame-right">
	{{-- <form enctype="multipart/form-data" class="form-horizontal">                                         --}}
        <div class="form-group">
          <div class="col-md-12">
            {!! Form::open(['url'=>url()->current(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
            <label>Upload Gallery</label>
            <input type="file" name="foto" multiple class="file" data-preview-file-type="any"/ required accept="image/*">

            {!! Form::close()!!}
          </div>
        </div>
	{{-- </form> --}}
   </div>
    <!-- END CONTENT FRAME RIGHT -->

    <!-- START CONTENT FRAME BODY -->
    <div class="content-frame-body content-frame-body-left">
      {{-- <div class="pull-left push-up-10">
        <button class="btn btn-primary btn-rounded" id="gallery-toggle-items">Toggle All</button>
      </div>
      <div class="pull-right push-up-10">
        <div class="btn-group">
          <button class="btn btn-primary btn-rounded"><span class="fa fa-pencil"></span> Edit</button>
          <button class="btn btn-primary btn-rounded"><span class="fa fa-trash-o"></span> Delete</button>
        </div>
      </div> --}}

      <div class="gallery" id="links">

        @foreach ($galeri as $dataGaleri)
          <div class="gallery-item">
            <a  href="/images/galeri/{{$dataGaleri['gambar']}}" title="Nature Image 1" data-gallery>
            <div class="image">
              <img src="/images/galeri/{{$dataGaleri['gambar']}}" alt="{{$dataGaleri['judul']}}"/>
              <ul class="gallery-item-controls">
                {{-- <li><label class="check"><input type="checkbox" class="icheckbox"/></label></li> --}}
                <a href="/admin/galeri/{{Crypt::encryptString($dataGaleri['id'])}}/delete">
                <li>
                  <span onclick="hapus('{{$dataGaleri['id']}}')"><i class="fa fa-times"></i></span>
                </li>
                </a>
              </ul>
            </div>
            <div class="meta">
              <strong>{{$dataGaleri['judul']}}</strong>
              <span>{{$dataGaleri['admin']['nama']}}</span>
            </div>
          </a>
            </div>
        @endforeach
      </div>

      {{-- <ul class="pagination pagination-sm pull-right push-down-20 push-up-20">
          <li class="disabled"><a href="#">«</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">»</a></li>
      </ul> --}}
  </div>
  <!-- END CONTENT FRAME BODY -->
</div>
<!-- END CONTENT FRAME -->


            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
        <!-- END BLUEIMP GALLERY -->
<script>
  function hapus(id)
  {
    $.ajax({
      type='POST',
      data:'id='+id,
      url:'/admin/galeri/delete/'+id,
    });
  }
</script>
@endsection
