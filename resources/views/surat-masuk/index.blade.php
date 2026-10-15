@extends('layouts.app')
@section('title','Halaman surat masuk')
@section('content')
    <h1>Halaman Surat Masuk</h1>
    <table border='1' cellpadding='10'>
        <thead>
            <tr>
                <th>
                    nomor surat
                </th>
                <th>
                    tanggal
                </th>
                <th>
                    pengirim
                </th>
                <th>
                    perihal
                </th>
                <th>
                    aksi
                </th>
            </tr>

        </thead>
        <tbody>
            @foreach($SuratMasuk as $surat)
            <tr>
                <td> {{$loop->iteration}}</td>
                <td>{{$surat['tanggal']}}</td>
                <td>{{$surat['pengirim']}}</td>
                <td>{{$surat['perihal']}}</td>
                <td>
                    <a href="{{ route('surat-masuk.show', $surat['id']) }}">detail surat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
