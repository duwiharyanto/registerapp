@extends('template/template')
@section('konten')
    <div class="card mt-5">

        <div class="card-body">
            <a href="/pegawai" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            

            <form method="post" action="/pegawai/update/{{ $pegawai->id }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama pegawai .." value=" {{ $pegawai->nama }}">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat pegawai .."> {{ $pegawai->alamat }} </textarea>

                     @if($errors->has('alamat'))
                        <div class="text-danger">
                            {{ $errors->first('alamat')}}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" value="Update">
                </div>

            </form>

        </div>
    </div>
@endsection