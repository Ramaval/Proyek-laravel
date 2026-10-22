@extends('layouts.app')
@section('title','Halaman surat Keluar')
@section('content')
    <h1> Dtail Surat Keluar </h1>
@if ($surat)
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
@else 
    <p>surat tidak di temukan </p>
@endif
    <a href="{{ route('surat-keluar.index') }}">kembali</a>
@endsection