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
               <a href="{{ route('surat-masuk.edit', $surat->id) }}">Edit</a> | 
                <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus surat ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Belum ada surat masuk.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection