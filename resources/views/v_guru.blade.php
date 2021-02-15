@extends('layout.v_template')
@section('title','Guru')

@section('content')
<a href="/guru/add" class="btn btn-primary btn-sm">Tambah Data</a>

@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success</h4>
    {{session('pesan')}}
  </div>
@endif
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nik</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Keahlian</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Gambar</th>
        <td class="text-center">Action</td>
    </tr>
</thead>
<tbody>
    <?php $no=1; ?>
    @foreach ($guru as $d)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $d->nik }}</td>
        <td>{{ $d->nama }}</td>
        <td>{{ $d->keahlian }}</td>
        <td>{{ $d->alamat }}</td>
        <td><img src="{{ url('foto_guru/'.$d->foto)}}" width="100"></td>
        <td class="text-center">
            <a href="/guru/detail/{{ $d->id }}" class="btn btn-primary">Detail</a>
            <a href="/guru/edit/{{ $d->id }}" class="btn btn-warning">Edit</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $d->id }}">
                Delete
              </button>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

@foreach ($guru as $d)

<div class="modal modal-danger fade" id="delete{{ $d->id }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Yakin Hapus {{ $d->nama }}</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
          <a href="/guru/delete/{{ $d->id }}" class="btn btn-outline">Yes</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endforeach
@endsection
