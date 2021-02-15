@extends('layout.v_template')
@section('title','Siswa')
@section('content')

<a href="/siswa/print" target="_blank" class="btn btn-primary">Print</a>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nis</th>
        <th class="text-center">Nama</th>
        <th class="text-center">id_Kelas</th>
        <th class="text-center">Alamat</th>
        <td class="text-center">Action</td>
    </tr>
</thead>
<tbody>
    <?php $no=1; ?>
    @foreach ($siswa as $s)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td class="text-center">{{ $s->nis }}</td>
            <td class="text-center">{{ $s->nama }}</td>
            <td class="text-center">{{ $s->kelas }}</td>
            <td class="text-center">{{ $s->alamat }}</td>
        </tr>
    @endforeach
</tbody>
</table>
@endsection
