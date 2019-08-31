@extends('template/template')
@section('konten')
    <div class="col-sm-12">

        <div class="card-body">
            <a href="/datadiri/create" class="btn btn-primary">Tambah datadiri</a>
            <br/>
            <br/>
            <table class="table table-responsive table-bordered table-hover table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $p)
                    <tr>
                        <td>{{ ucwords($p->pegawai->nama) }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->nohp }}</td>
                        <td class="text-center" width="10%">
                            <form action="{{ route('datadiri.destroy', $p->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('datadiri.edit',$p->id) }}" class=" btn btn-xs btn-primary">Edit</a>
                                <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
