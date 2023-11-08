@extends('layouts.index')

@section('content')
<br/>

@if(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p><br/>
@endif    

<a class="btn btn-info" href="{{ url('mahasiswa/create') }}">Tambah</a>
<br/><br/>
<form method="GET" action="{{ url('mahasiswa') }}">
</form>
<br/>
<table class="table-bordered table">
    <tr class="text-center">
        <th>Nama</th>
        <th>NIM</th>
        <th>Prodi</th>
        <th>Alamat</th>
        <th>Angkatan</th>
        <th>AKSI</th>
    </tr>
    @foreach($datas as $key=>$value)
        <tr>
            <td>{{ $value->Nama }}</td>
            <td>{{ $value->NIM }}</td>
            <td>{{ $value->Prodi }}</td>
            <td>{{ $value->Alamat }}</td>
            <td>{{ $value->Angkatan }}</td>
            <td class="text-center"><a class="btn btn-info" href="{{ url('mahasiswa/'.$value->id.'/edit') }}">Update</a></td>
            <td class="text-center">
                <form action="{{ url('mahasiswa/'.$value->id) }}" method="POST">
                    @csrf 
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection