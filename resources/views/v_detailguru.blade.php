@extends('layout.v_template')
@section('title','Detail Guru')
@section('content')
    <table class="table">
        <tr>
            <th width="100px">Nik</th>
            <th width="30px">:</th>
            <th>{{ $guru->nik }}</th>
        </tr>
        <tr>
            <th width="100px">Nama</th>
            <th width="30px">:</th>
            <th>{{ $guru->nama }}</th>
        </tr>
        <tr>
            <th width="100px">Keahlian</th>
            <th width="30px">:</th>
            <th>{{ $guru->keahlian }}</th>
        </tr>
        <tr>
            <th width="100px">Alamat</th>
            <th width="30px">:</th>
            <th>{{ $guru->alamat }}</th>
        </tr>
        <tr>
            <th width="100px">Foto</th>
            <th width="30px">:</th>
            <th><img src="{{url('foto_guru/'.$guru->foto)}}" width="100px"></th>
        </tr>
        <tr>
            <th><a class="btn btn-success" href="/guru">Kembali</a></th>
        </tr>
    </table>
@endsection
