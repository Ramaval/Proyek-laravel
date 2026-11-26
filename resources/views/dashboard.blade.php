@extends('layouts.app')

@section('title', 'Dashboard SIM-Surat')

@section('content')
<div class="space-y-6">
    <!-- Banner Sambutan -->
    <div class="bg-gradient-to-r from-[#3b060c] to-[#260206] border border-rose-900/50 p-6 rounded-2xl shadow-xl">
        <h1 class="text-2xl font-bold text-white">Dashboard</h1>
        <p class="text-rose-200/80 text-sm mt-1">
            Selamat datang di Sistem Informasi Surat, <span class="text-amber-300 font-semibold">{{ auth()->user()->name ?? 'Pengguna' }}</span>.
        </p>
    </div>

    <!-- 3 Kartu Ringkasan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Surat Masuk -->
        <div class="stat-card">
            <p class="text-xs font-semibold text-rose-300 uppercase tracking-wider">Total Surat Masuk</p>
            <p class="text-3xl font-extrabold text-amber-300 mt-2">
                {{ \App\Models\IncomingLetter::count() }}
            </p>
            <a href="{{ route('surat-masuk.index') }}" class="inline-block text-xs text-amber-400 hover:text-amber-300 mt-4 font-semibold">
                Kelola Surat Masuk &rarr;
            </a>
        </div>

        <!-- Total Surat Keluar -->
        <div class="stat-card">
            <p class="text-xs font-semibold text-rose-300 uppercase tracking-wider">Total Surat Keluar</p>
            <p class="text-3xl font-extrabold text-amber-300 mt-2">
                {{ \App\Models\OutcomingLetter::count() }}
            </p>
            <a href="{{ route('surat-keluar.index') }}" class="inline-block text-xs text-amber-400 hover:text-amber-300 mt-4 font-semibold">
                Kelola Surat Keluar &rarr;
            </a>
        </div>

        <!-- Role Akun -->
        <div class="stat-card">
            <p class="text-xs font-semibold text-rose-300 uppercase tracking-wider">Status Akses</p>
            <p class="text-2xl font-bold text-white capitalize mt-2">
                {{ auth()->user()->role ?? '-' }}
            </p>
            <p class="text-xs text-rose-300/70 mt-4">
                {{ auth()->user()->role === 'petugas' ? 'Akses penuh (Tambah, Edit, Hapus)' : 'Akses baca saja (Read-only)' }}
            </p>
        </div>
    </div>
</div>
@endsection