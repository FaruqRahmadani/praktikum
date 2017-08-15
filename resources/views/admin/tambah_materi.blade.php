@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data Materi (Sementara)</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="tambahmateri">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nama Materi Praktikum</label>

                            <div class="col-md-6">
                                <input id="materi" type="text" class="form-control" name="materi" value="{{ old('materi') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Semester</label>

                            <div class="col-md-6">
                                <input id="semester" type="number" class="form-control" name="semester" value="{{ old('semester') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
