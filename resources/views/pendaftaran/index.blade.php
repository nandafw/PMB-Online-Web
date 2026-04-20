@extends('layouts.app')
@section('title', 'Pendaftaran')
@section('content')
<div class="pt-24 pb-20 min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto px-4">
        @if($pendaftaran)
            {{-- Sudah daftar --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
                @php
                    $statusMap = [
                        'pending'  => ['🕐', 'Menunggu Verifikasi', 'yellow'],
                        'diterima' => ['✅', 'Diterima!', 'green'],
                        'ditolak'  => ['❌', 'Tidak Diterima', 'red'],
                    ];
                    [$icon, $label, $color] = $statusMap[$pendaftaran->status];
                @endphp
                <div class="text-5xl mb-4">{{ $icon }}</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Status Pendaftaran</h2>
                <div class="text-{{ $color }}-600 font-bold text-lg mb-4">{{ $label }}</div>
                <div class="bg-gray-50 rounded-xl p-4 inline-block mb-6">
                    <div class="text-sm text-gray-500">Nomor Pendaftaran</div>
                    <div class="font-mono font-bold text-gray-900 text-xl">{{ $pendaftaran->no_pendaftaran }}</div>
                </div>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('pendaftaran.riwayat') }}" class="px-6 py-2 bg-red-800 text-white rounded-xl hover:bg-red-900 transition-all font-medium">
                        Lihat Detail
                    </a>
                    <a href="{{ route('pendaftaran.cetak', $pendaftaran->id) }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all font-medium">
                        Cetak PDF
                    </a>
                </div>
            </div>
        @else
            {{-- Belum daftar --}}
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Pendaftaran Mahasiswa Baru</h1>
                <p class="text-gray-500">Isi formulir dengan lengkap dan benar. Semua field wajib diisi.</p>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
                <div class="text-5xl mb-4">📋</div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Mulai Pendaftaran</h2>
                <p class="text-gray-500 mb-6">Anda belum melakukan pendaftaran. Klik tombol di bawah untuk mulai.</p>
                <a href="{{ route('pendaftaran.create') }}"
                   class="inline-block px-8 py-3 bg-red-800 text-white font-semibold rounded-xl hover:bg-red-900 transition-all">
                    Isi Formulir Pendaftaran →
                </a>
            </div>
        @endif
    </div>
</div>
@endsection