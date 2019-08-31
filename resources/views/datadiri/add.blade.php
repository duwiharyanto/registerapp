@extends('template/template')
@section('konten')
    <div class="card mt-5">
        <div class="card-body">
            <a href="{{ route('datadiri.index') }}" class="btn btn-primary">Kembali</a>
            <br/>
            <br/>
            
            <form method="post" action="{{ route('datadiri.store') }}">

                {{ csrf_field() }}
                <div class="form-group">
                    <label>Pegawai ID</label>
                    <input type="text" name="pegawai_id" class="form-control" placeholder="pegawai id">

                    @if($errors->has('pegawai_id'))
                        <div class="text-danger">
                            {{ $errors->first('pegawai_id')}}
                        </div>
                    @endif

                </div>
                <div class="form-group">
                    <label>Hp</label>
                    <input type="text" name="nohp" class="form-control" placeholder="nohp">

                    @if($errors->has('nohp'))
                        <div class="text-danger">
                            {{ $errors->first('nohp')}}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="alamat"></textarea>

                     @if($errors->has('alamat'))
                        <div class="text-danger">
                            {{ $errors->first('alamat')}}
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
