@extends('frontend.templates.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form class="" action="{{ route('ktp.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" value="{{ old('nama') }}">
                                @if ($errors->has('nama'))
                                    <div class="form-control-feedback">{{ $errors->first('nama') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="text" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik" value="{{ old('nik') }}">
                                @if ($errors->has('nik'))
                                    <div class="form-control-feedback">{{ $errors->first('nik') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}">
                                @if ($errors->has('alamat'))
                                    <div class="form-control-feedback">{{ $errors->first('alamat') }}</div>
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="tile-footer">
                        <input type="submit" value="Tambahkan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
