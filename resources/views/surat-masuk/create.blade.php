@extends('layouts.app')

@section('title', 'Tambah Surat Masuk')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white">Tambah Surat Masuk</h1>
            <p class="text-xs text-rose-300/80 mt-1">Catat arsip surat masuk baru ke dalam sistem.</p>
        </div>
        <a href="{{ route('surat-masuk.index') }}" class="btn-secondary">&larr; Kembali</a>
    </div>

    <div class="surat-card">
        <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="surat-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" value="{{ old('nomor_surat') }}" class="surat-input">
                @error('nomor_surat') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="surat-input [color-scheme:dark]">
                @error('tanggal') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Pengirim</label>
                <input type="text" name="pengirim" value="{{ old('pengirim') }}" class="surat-input">
                @error('pengirim') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Perihal</label>
                <input type="text" name="perihal" value="{{ old('perihal') }}" class="surat-input">
                @error('perihal') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Kategori</label>
                <select name="category_id" class="surat-input">
                    <option value="">-- Tanpa kategori --</option>
                    @foreach ($categories as $kategori)
                        <option value="{{ $kategori->id }}" @selected(old('category_id') == $kategori->id)>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Lampiran (PDF/JPG/PNG, maks. 2 MB)</label>
                <input type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png" class="surat-input file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-amber-500 file:text-rose-950 hover:file:bg-amber-400">
                @error('lampiran') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="surat-label">Keterangan</label>
                <textarea name="keterangan" rows="3" class="surat-input">{{ old('keterangan') }}</textarea>
                @error('keterangan') <p class="surat-error">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 border-t border-rose-900/40 flex items-center justify-end gap-3">
                <a href="{{ route('surat-masuk.index') }}" class="btn-secondary">Batal</a>
                <button type="submit" class="btn-gold">Simpan Surat</button>
            </div>
        </form>
    </div>
</div>
@endsection