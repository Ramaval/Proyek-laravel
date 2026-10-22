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
                    Keterangan
                </th>
                <th>
                    aksi
                </th>
            </tr>

        </thead>
        <tbody>
            @forelse($SuratMasuk as $surat)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$surat->tanggal}}</td>
                <td>{{$surat->pengirim}}</td>
                <td>{{$surat->perihal}}</td>
                <td>{{$surat->keterangan}}</td>
                <td>
                    <a href="{{ route('surat-masuk.show', $surat->id) }}">detail surat</a>
                </td>
            </tr>
            @empty
            <tr>
                <td>belum ada surat masuk</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
