@extends('layouts.app')
@section('title','Halaman surat masuk')
@section('content')
    <h1> Dtail Surat masuk </h1>
@if ($surat)
    <p>
        <strong>id surat :</strong>
        {{$surat['id']}}
    </p>
        <p>
        <strong>NO surat :</strong>
        {{$surat['nomor_surat']}}
    </p>
        <p>
        <strong>tanggal pengiriman :</strong>
        {{$surat['tanggal']}}
    </p>
        <p>
        <strong>perihal:</strong>
        {{$surat['perihal']}}
    </p>
    
    <p>
        <strong>pengirim surat :</strong>
        {{$surat['pengirim']}}
    </p>
@else 
    <p>surat tidak di temukan </p>
@endif
    <a href="{{ route('surat-masuk.index') }}">kembali</a>
@endsection