@extends ('frontend.templates.default')
@section ('content')
    <form action="{{ route('kegiatan.ktp') }}" method="get">
    @foreach($keg as $kegi)
        <div class="form-check">
            {{ csrf_field() }}
            <input class="form-check-input" type="radio" name="exampleRadios" value="{{ $kegi->kegiatan }}">
            <label class="form-check-label" for="exampleRadios1">
                {{ $kegi->kegiatan }}
            </label>

        </div>

    @endforeach
    <button type="submit" class="btn btn-primary">Lanjut</button>
    </form>

@endsection
