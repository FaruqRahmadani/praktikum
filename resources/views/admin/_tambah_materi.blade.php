@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              @if (isset($data))
                <div class="panel-heading">Edit Data Materi (Sementara)</div>
              @else
                <div class="panel-heading">Tambah Data Materi (Sementara)</div>
              @endif
                <div class="panel-body">
                  @if(count($errors) > 0)
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li> {{$error}} </li>
                      @endforeach
                    </ul>
                  @endif
                        {{-- <form class="form-horizontal" method="POST" action="{{Request::url()}}"> --}}
                        {{ csrf_field() }}
                        {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Kode MK</label>

                            <div class="col-md-6">
                              @if (isset($data))
                                <input id="materi" type="text" class="form-control" name="kode_mk" value="{{ $data->kode_mk }}" required autofocus>
                              @else
                                <input id="materi" type="text" class="form-control" name="kode_mk" value="{{ old('kode_mk') }}" required autofocus>
                              @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nama Materi Praktikum</label>

                            <div class="col-md-6">
                              @if (isset($data))
                                <input id="materi" type="text" class="form-control" name="materi" value="{{ $data->materi_praktikum }}" required>
                              @else
                                <input id="materi" type="text" class="form-control" name="materi" value="{{ old('materi') }}" required>
                              @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Semester</label>

                            <div class="col-md-6">
                              @if (isset($data))
                                <input id="semester" type="number" class="form-control" name="semester" value="{{ $data->semester }}" required>
                              @else
                                <input id="semester" type="number" class="form-control" name="semester" value="{{ old('semester') }}" required>
                              @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Gambar</label>

                            <div class="col-md-6">
                              @if (isset($data))
                                <input id="semester" type="file" class="form-control" name="gambar" value="{{ $data->gambar }}" required>
                              @else
                                <input id="semester" type="file" class="form-control" name="gambar" value="{{ old('gambar') }}" required>
                              @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {{-- <button type="submit" class="btn btn-primary">
                                    Tambah
                                </button> --}}
                                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}

                            </div>
                        </div>
                        {!! Form::close() !!}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
