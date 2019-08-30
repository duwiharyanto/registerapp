@extends('template/template')
@section('konten')
    <div class="col-sm-12">

        <div class="card-body">
            <a href="/pegawai/tambah" class="btn btn-primary">Input Pegawai Baru</a>
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pegawai as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td class="text-center">
                            <a href="/pegawai/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                            <a href="/pegawai/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
