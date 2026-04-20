@extends('layouts.admin')
@section('title', 'Detail Pendaftaran')
@section('page-title', 'Detail Pendaftaran')
@section('content')

<div class="max-w-4xl">
    <div class="mb-4">
        <a href="{{ route('admin.pendaftaran.index') }}" class="text-sm text-red-700 hover:underline flex items-center gap-1">
            ← Kembali ke Daftar
        </a>
    </div>

    {{-- Header Card --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="text-sm text-gray-500 mb-1">Nomor Pendaftaran</div>
                <div class="font-mono font-bold text-2xl text-gray-900">{{ $pendaftaran->no_pendaftaran }}</div>
                <div class="text-sm text-gray-500 mt-1">{{ $pendaftaran->created_at->format('d F Y, H:i') }} WIB</div>
            </div>
            <div class="flex flex-col gap-2">
                {{-- Form Update Status --}}
                <form method="POST" action="{{ route('admin.pendaftaran.update', $pendaftaran->id) }}" class="flex gap-2 items-center">
                    @csrf @method('PUT')
                    <select name="status" class="px-3 py-2 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-700 outline-none">
                        <option value="pending"  {{ $pendaftaran->status === 'pending'  ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ $pendaftaran->status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak"  {{ $pendaftaran->status === 'ditolak'  ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    <input type="text" name="catatan_admin" value="{{ $pendaftaran->catatan_admin }}"
                        placeholder="Catatan (opsional)" class="px-3 py-2 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-700 outline-none">
                    <button type="submit" class="px-4 py-2 bg-red-800 text-white rounded-xl text-sm font-medium hover:bg-red-900">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Data Detail --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-6 space-y-6">
            @php
                $sections = [
                    ['Data Pribadi', [
                        'Nama Lengkap'  => $pendaftaran->nama_lengkap,
                        'NIK'           => $pendaftaran->nik,
                        'Jenis Kelamin' => $pendaftaran->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan',
                        'Agama'         => $pendaftaran->agama->nama_agama ?? '-',
                        'Tempat Lahir'  => $pendaftaran->tempat_lahir,
                        'Tanggal Lahir' => \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d F Y'),
                        'Alamat'        => $pendaftaran->alamat,
                        'Provinsi'      => $pendaftaran->provinsi->nama_provinsi ?? '-',
                        'Kabupaten'     => $pendaftaran->kabupaten->nama_kabupaten ?? '-',
                        'No. HP'        => $pendaftaran->no_hp,
                        'Email'         => $pendaftaran->email,
                    ]],
                    ['Data Pendidikan', [
                        'Asal Sekolah'  => $pendaftaran->asal_sekolah,
                        'Jurusan'       => $pendaftaran->jurusan_sekolah,
                        'Tahun Lulus'   => $pendaftaran->tahun_lulus,
                        'NISN'          => $pendaftaran->nisn ?: '-',
                    ]],
                    ['Pilihan Prodi', [
                        'Prodi Pilihan 1' => $pendaftaran->prodi_pilihan_1,
                        'Prodi Pilihan 2' => $pendaftaran->prodi_pilihan_2 ?: '-',
                    ]],
                ];
            @endphp

            @foreach ($sections as [$title, $fields])
                <div>
                    <h3 class="font-semibold text-red-700 text-xs uppercase tracking-wider mb-3 border-b border-blue-100 pb-2">{{ $title }}</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach ($fields as $label => $value)
                            <div class="bg-gray-50 rounded-xl p-3">
                                <div class="text-xs text-gray-500 mb-0.5">{{ $label }}</div>
                                <div class="text-sm font-medium text-gray-900">{{ $value }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            
        </div>
    </div>
</div>

@endsection