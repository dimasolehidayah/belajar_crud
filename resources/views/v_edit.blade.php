@extends('layout.v_template')
@section('title','Update Data')
@section('content')
<form action="/guru/update/{{ $guru->id }}" method="POST" enctype="multipart/form-data">
    @csrf

   <div class="content">
    <div class="row">
        <div class="col-sm-6">


            <div class="form-group">
                <label>Nik</label>
                <input type="text" name="nik" class="form-control" value="{{ $guru->nik }}" readonly>
                <div class="text-danger">
                @error('nik')
                    {{ $message }}
                @enderror
                </div>
            </div>



            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}">
                <div class="text-danger">
                    @error('nama')
                        {{ $message }}
                    @enderror
                    </div>
            </div>


            <div class="form-group">
                <label>Keahlian</label>
                <input type="text" name="keahlian" class="form-control" value="{{ $guru->keahlian }}">
                <div class="text-danger">
                    @error('keahlian')
                        {{ $message }}
                    @enderror
                    </div>
            </div>



            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $guru->alamat }}">
                <div class="text-danger">
                    @error('alamat')
                        {{ $message }}
                    @enderror
                    </div>
            </div>


        <div class="col-sm-12">
            <div class="col-sm-4">
                <img src="{{ url('foto_guru/'.$guru->foto)}}" width="100">
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Ganti Foto</label>
                    <input type="file" name="foto" class="form-control">
                    <div class="text-danger">
                        @error('foto')
                            {{ $message }}
                        @enderror
                        </div>
                </div>
            </div>
            </div>


    <div class="form-group">
        <button class="btn btn-success btn-sm">Simpan</button>
    </div>

        </div>
    </div>
</div>

</form>
@endsection
