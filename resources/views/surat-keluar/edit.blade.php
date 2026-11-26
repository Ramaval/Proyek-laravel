@extends('layouts.app')

@section('title', 'Edit Surat Keluar')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white">Edit Surat Keluar</h1>
            <p class="text-xs text-rose-300/80 mt-1">Perbarui data arsip surat keluar.</p>
        </div>
        <a href="{{ route('surat-keluar.index') }}" class="btn-secondary">&larr; Kembali</a>
    </div>

    <div class="surat-card">
        <form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="surat-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" class="surat-input">
                @error('nomor_surat') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}" class="surat-input [color-scheme:dark]">
                @error('tanggal') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Pengirim</label>
                <input type="text" name="Pengirim" value="{{ old('pengirim', $surat->pengirim ?? $surat->pengirim) }}" class="surat-input">
                @error('pemgirim') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Perihal</label>
                <input type="text" name="perihal" value="{{ old('perihal', $surat->perihal) }}" class="surat-input">
                @error('perihal') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Kategori</label>
                <select name="category_id" class="surat-input">
                    <option value="">-- Tanpa kategori --</option>
                    @foreach ($categories as $kategori)
                        <option value="{{ $kategori->id }}" @selected(old('category_id', $surat->category_id ?? '') == $kategori->id)>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Lampiran (PDF/JPG/PNG, maks. 2 MB)</label>
                @if ($surat->lampiran)
                    <p class="text-xs text-amber-300 mb-2">
                        File saat ini: <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" class="underline">Lihat lampiran lama</a>
                    </p>
                @endif
                <input type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png" class="surat-input file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-amber-500 file:text-rose-950 hover:file:bg-amber-400">
                @error('lampiran') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Keterangan</label>
                <textarea name="keterangan" rows="3" class="surat-input">{{ old('keterangan', $surat->keterangan) }}</textarea>
                @error('keterangan') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 border-t border-rose-900/40 flex items-center justify-end gap-3">
                <a href="{{ route('surat-keluar.index') }}" class="btn-secondary">Batal</a>
                <button type="submit" class="btn-gold">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection