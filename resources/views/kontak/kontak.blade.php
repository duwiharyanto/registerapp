@extends('template/template')
@section('konten')
    <div class="col-sm-12">

        <div class="card-body">
            <a href="/kontak/create" class="btn btn-primary">Input Kontak Baru</a>
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->email }}</td>
                        <td class="text-center">
                            <form action="{{ route('kontak.destroy', $p->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('kontak.edit',$p->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
