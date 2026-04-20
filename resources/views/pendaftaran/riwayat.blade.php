@extends('layouts.app')
@section('title', 'Riwayat Pendaftaran')
@section('content')
<div class="pt-24 pb-20 min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto px-4">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-900">Riwayat Pendaftaran</h1>
            @if($pendaftaran)
                <a href="{{ route('pendaftaran.cetak', $pendaftaran->id) }}"
                   class="px-4 py-2 bg-red-700 text-white rounded-xl text-sm font-medium hover:bg-red-800 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Cetak PDF
                </a>
            @endif
        </div>

        @if(!$pendaftaran)
            <div class="bg-white rounded-2xl p-12 text-center border border-gray-100">
                <div class="text-5xl mb-4">📋</div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Pendaftaran</h2>
                <p class="text-gray-500 mb-6">Anda belum mengisi formulir pendaftaran.</p>
                <a href="{{ route('pendaftaran.create') }}" class="px-6 py-3 bg-red-700 text-white rounded-xl font-medium hover:bg-red-800 transition-all">Daftar Sekarang</a>
            </div>
        @else
            @php
                $statusBadge = [
                    'pending'  => 'bg-yellow-100 text-yellow-800',
                    'diterima' => 'bg-green-100 text-green-800',
                    'ditolak'  => 'bg-red-100 text-red-800',
                ];
                $statusLabel = ['pending' => 'Menunggu Verifikasi', 'diterima' => 'Diterima', 'ditolak' => 'Tidak Diterima'];
            @endphp

            {{-- Status Card --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden mb-6">
                <div class="p-6 flex flex-col md:flex-row md:items-center gap-4">
                    <div class="flex-1">
                        <div class="text-sm text-gray-500 mb-1">Nomor Pendaftaran</div>
                        <div class="font-mono font-bold text-2xl text-gray-900">{{ $pendaftaran->no_pendaftaran }}</div>
                        <div class="text-sm text-gray-500 mt-1">Didaftarkan: {{ $pendaftaran->created_at->format('d F Y, H:i') }}</div>
                    </div>
                    <div class="text-center">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-bold {{ $statusBadge[$pendaftaran->status] }}">
                            {{ $statusLabel[$pendaftaran->status] }}
                        </span>
                        @if($pendaftaran->catatan_admin)
                            <p class="text-xs text-gray-500 mt-2 max-w-48">{{ $pendaftaran->catatan_admin }}</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Detail Data --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h2 class="font-bold text-gray-900">Detail Data Pendaftaran</h2>
                </div>
                <div class="p-6">
                    @php
                        $sections = [
                            'Data Pribadi' => [
                                'Nama Lengkap'   => $pendaftaran->nama_lengkap,
                                'NIK'            => $pendaftaran->nik,
                                'Jenis Kelamin'  => $pendaftaran->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan',
                                'Tempat, Tgl Lahir' => $pendaftaran->tempat_lahir . ', ' . \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d F Y'),
                                'Agama'          => $pendaftaran->agama->nama_agama ?? '-',
                                'Alamat'         => $pendaftaran->alamat,
                                'Provinsi'       => $pendaftaran->provinsi->nama_provinsi ?? '-',
                                'Kabupaten/Kota' => $pendaftaran->kabupaten->nama_kabupaten ?? '-',
                                'No. HP'         => $pendaftaran->no_hp,
                                'Email'          => $pendaftaran->email,
                            ],
                            'Data Pendidikan' => [
                                'Asal Sekolah' => $pendaftaran->asal_sekolah,
                                'Jurusan'      => $pendaftaran->jurusan_sekolah,
                                'Tahun Lulus'  => $pendaftaran->tahun_lulus,
                                'NISN'         => $pendaftaran->nisn ?: '-',
                            ],
                            'Pilihan Prodi' => [
                                'Prodi Pilihan 1' => $pendaftaran->prodi_pilihan_1,
                                'Prodi Pilihan 2' => $pendaftaran->prodi_pilihan_2 ?: '-',
                            ],
                        ];
                    @endphp

                    @foreach ($sections as $title => $fields)
                        <h3 class="font-semibold text-red-700 text-sm uppercase tracking-wider mb-3 mt-6 first:mt-0">{{ $title }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                            @foreach ($fields as $label => $value)
                                <div class="bg-gray-50 rounded-xl p-3">
                                    <div class="text-xs text-gray-500 mb-0.5">{{ $label }}</div>
                                    <div class="text-sm font-medium text-gray-900">{{ $value }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection