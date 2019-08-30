@extends('template/template')
@section('konten')
    <div class="card mt-5">
        <div class="card-body">
            <a href="{{ route('kontak.index') }}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            
            <form method="post" action="{{ route('kontak.store') }}">

                {{ csrf_field() }}

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama pegawai ..">

                    @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Email</label>
                    <textarea name="email" class="form-control" placeholder="Email pegawai .."></textarea>

                     @if($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email')}}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>

        </div>
    </div>
@endsection
