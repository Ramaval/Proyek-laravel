@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white">Detail Surat Masuk</h1>
            <p class="text-xs text-rose-300/80 mt-1">Informasi lengkap arsip surat masuk.</p>
        </div>
        <a href="{{ route('surat-masuk.index') }}" class="btn-secondary">&larr; Kembali</a>
    </div>

    <div class="surat-card">
        <div class="detail-row">
            <span class="detail-label">Nomor Surat</span>
            <span class="detail-value">{{ $surat->nomor_surat ?? '-' }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Tanggal Surat</span>
            <span class="detail-value">{{ $surat->tanggal }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Pengirim</span>
            <span class="detail-value">{{ $surat->pengirim }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Perihal</span>
            <span class="detail-value">{{ $surat->perihal }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Kategori</span>
            <span class="detail-value text-amber-300">{{ $surat->category?->nama ?? 'Tanpa kategori' }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Lampiran</span>
            <span class="detail-value">
                @if ($surat->lampiran)
                    <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="text-amber-400 hover:text-amber-300 underline">
                        Lihat Lampiran &nearr;
                    </a>
                @else
                    <span class="text-rose-300/50">Tidak ada lampiran</span>
                @endif
            </span>
        </div>
        <div class="detail-row border-b-0">
            <span class="detail-label">Keterangan</span>
            <span class="detail-value text-rose-200/80">{{ $surat->keterangan ?? '-' }}</span>
        </div>

        @can('manage-letters')
            <div class="mt-6 pt-4 border-t border-rose-900/40 flex justify-end gap-3">
                <a href="{{ route('surat-masuk.edit', $surat->id) }}" class="btn-gold">Edit Surat</a>
            </div>
        @endcan
    </div>
</div>
@endsection