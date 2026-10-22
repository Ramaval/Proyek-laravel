@extends('layouts.app')
@section('title','Halaman surat keluar')
@section('content')
    <h1>Halaman surat keluar</h1>
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
            @forelse($suratKeluar
            
            as $surat)
            <tr>
                <td> {{$loop->iteration}}</td>
                <td> {{$surat->tanggal}}</td>
                <td> {{$surat->pengirim}}</td>
                <td> {{$surat->perihal}}</td>
                <td>{{$surat->keteranga}}</td>
                <td>
                    <a href="{{ route('surat-keluar.show', $surat->id) }}">detail surat</a>
                </td>
            </tr>
            @empty
            <tr>
                <td> belum ada surat masuk </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
