@extends('frontend.templates.default')
@section('content')

<div class="card my-12">
    <h5 class="card-header ">Data Penduduk</h5>
    <div class="card-body">
        <form action="{{ route('kegiatan.ktp') }}" method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." value="{{ old('cari') }}">
            <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">Go!</button>
            </span>
        </div>
        </form>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="text-center" >
                <a href="{{ route('ktp.create') }}" class="btn btn-primary mb-3">Tambahkan user</a>
            </div>
            Kegiatan : {{ $ambil }}
            <table class="table table-bordered">
                <tr class="tr">
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Kegiatan</th>
                    <th>Aksi</th>
                </tr>
                @php
                    $no=1;
                    @endphp
                @forelse ($ktps as $ktp)

                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$ktp->nama}}</td>
                        <td>{{$ktp->nik}}</td>
                        <td>{{$ktp->alamat}}</td>
                        <td>
                            {{--{{ route('ktp.kegiatan', $ktp) }}--}}
                            {{--<form method="post" action="{{ route('ktp.kegiatan', $ktp) }}">--}}
                            {{--<option class="btn btn-primary" name="kegiatan" value="approve">Tambahkan</option>--}}
                            {{--</form>--}}
                            @if($ktp->kegiatan == null)
                                <form action="{{ route('kegiatan.simpan', $ktp->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="tambah" value="{{ $ambil }}">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Tambahkan</button>
                                </form>
                                    @else
                                <a href="{{ route('kegiatan.batal', $ktp->id) }}"> <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">Batal</button></a>
                            @endif
                        </td>


                        <td>
                            <a href="{{ route('ktp.edit', $ktp) }}" class="btn btn-primary">Edit</a>
                            <button href="{{ route('ktp.destroy', $ktp) }}" class="btn btn-danger" id="delete">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data Kosong</td>
                    </tr>

                @endforelse
            </table>
            {{ $ktps->links() }}
        </div>
    </div>
</div>

<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="" style="display:none">
</form>
@endsection

@push('extra-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('button#delete').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            console.log(href);
            // var title = $(this).data('title');

            swal({
                title: "Kamu yakin untuk hapus data ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('deleteForm').action = href;
                        document.getElementById('deleteForm').submit();
                        swal("Data dihapus!", {
                            icon: "success",
                        });
                    }
                });
        });
    </script>
@endpush


<!-- Button trigger modal -->

<!-- Modal -->

