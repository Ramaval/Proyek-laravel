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
                 <a href="{{ route('surat-keluar.edit', $surat->id) }}">Edit</a>
                <form action="{{ route('surat-keluar.destroy', $surat->id) }}"
                      method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      onclick="return confirm('Hapus surat ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6">Belum ada surat keluar.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
