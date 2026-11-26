@extends('layouts.app')

@section('title', 'Halaman Surat Keluar')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Halaman Surat Keluar</h1>
            <p class="text-xs text-rose-300/80 mt-1">Daftar arsip surat keluar yang tercatat dalam sistem.</p>
        </div>

        @can('manage-letters')
            <a href="{{ route('surat-keluar.create') }}" class="btn-gold">
                <span>+</span>
                <span>Tambah Surat Keluar</span>
            </a>
        @endcan
    </div>

    @if (session('success'))
        <div class="bg-emerald-950/60 border border-emerald-500/40 text-emerald-300 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Pencarian & Filter Kategori -->
    <div class="surat-card p-4">
        <form method="GET" action="{{ route('surat-keluar.index') }}" class="flex flex-col sm:flex-row gap-3">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Nomor, tujuan, atau perihal..." class="surat-input sm:flex-1">
            
            <select name="category_id" class="surat-input sm:w-56">
                <option value="">Semua kategori</option>
                @foreach ($categories as $kategori)
                    <option value="{{ $kategori->id }}" @selected(request('category_id') == $kategori->id)>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>

            <div class="flex gap-2">
                <button type="submit" class="btn-gold">Cari / Filter</button>
                <a href="{{ route('surat-keluar.index') }}" class="btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <!-- Tabel Surat Keluar -->
    <div class="surat-card overflow-x-auto p-0">
        <table class="surat-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal</th>
                    <th>Pengirim</th>
                    <th>Perihal</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suratKeluar as $surat)
                    <tr>
                        <td>{{ ($suratKeluar->currentPage() - 1) * $suratKeluar->perPage() + $loop->iteration }}</td>
                        <td class="font-medium text-white">{{ $surat->nomor_surat ?? '-' }}</td>
                        <td>{{ $surat->tanggal }}</td>
                        <td>{{ $surat->pengirim ?? $surat->pengirim }}</td>
                        <td>{{ $surat->perihal }}</td>
                        <td>
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-400/10 text-amber-300 border border-amber-400/20">
                                {{ $surat->category?->nama ?? 'Tanpa kategori' }}
                            </span>
                        </td>
                        <td class="text-rose-200/70">{{ $surat->keterangan ?? '-' }}</td>
                        <td>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('surat-keluar.show', $surat->id) }}" class="btn-aksi-detail">Detail</a>

                                @can('manage-letters')
                                    <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="btn-aksi-edit">Edit</a>
                                    <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-aksi-hapus" onclick="return confirm('Hapus surat ini?')">Hapus</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-8 text-rose-300/60">Belum ada surat keluar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Navigasi Pagination -->
    @if ($suratKeluar->hasPages())
        <div class="flex items-center justify-between text-xs text-rose-200">
            <div>
                Halaman <span class="font-bold text-amber-300">{{ $suratKeluar->currentPage() }}</span> dari <span class="font-bold text-amber-300">{{ $suratKeluar->lastPage() }}</span>
            </div>
            <div class="flex gap-2">
                @if ($suratKeluar->previousPageUrl())
                    <a href="{{ $suratKeluar->previousPageUrl() }}" class="btn-secondary py-1.5 px-3 text-xs">&larr; Sebelumnya</a>
                @endif
                @if ($suratKeluar->nextPageUrl())
                    <a href="{{ $suratKeluar->nextPageUrl() }}" class="btn-gold py-1.5 px-3 text-xs">Berikutnya &rarr;</a>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection