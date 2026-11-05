@extends('layouts.app')
@section('title','Halaman surat masuk')
@section('content')
    <h1> Dtail Surat masuk </h1>
    <p>
        <strong>id surat :</strong>
        {{$surat->id}}
    </p>
        <p>
        <strong>NO surat :</strong>
        {{$surat->nomor_surat}}
    </p>
        <p>
        <strong>tanggal pengiriman :</strong>
        {{$surat->tanggal}}
    </p>
        <p>
        <strong>perihal:</strong>
        {{$surat->perihal}}
    </p>
    
    <p>
        <strong>pengirim surat :</strong>
        {{$surat->pengirim}}
    </p>
    <p>
        <Strong>Keterangan : </Strong>
        {{$surat->keterangan ?? '-'}}
    </p>
    <a href="{{ route('surat-masuk.index') }}">kembali</a>
@endsection