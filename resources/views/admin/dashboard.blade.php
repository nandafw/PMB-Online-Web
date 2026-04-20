@extends('layouts.admin')
@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')
@section('content')

{{-- Stat Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4 mb-6">
    @php
        $cards = [
            ['Total Pendaftar', $stats['total_pendaftar'], 'blue',  'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
            ['Pending',         $stats['pending'],         'yellow','M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['Diterima',        $stats['diterima'],        'green', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['Ditolak',         $stats['ditolak'],         'red',   'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['Total User',      $stats['total_user'],      'purple','M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
        ];
    @endphp
    @foreach ($cards as [$label, $val, $color, $icon])
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-{{ $color }}-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-{{ $color }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900">{{ $val }}</div>
            <div class="text-sm text-gray-500 mt-0.5">{{ $label }}</div>
        </div>
    @endforeach
</div>

{{-- Recent Pendaftaran --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="font-bold text-gray-900">Pendaftaran Terbaru</h2>
        <a href="{{ route('admin.pendaftaran.index') }}" class="text-sm text-red-700 hover:underline">Lihat semua →</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">No. Pendaftaran</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Prodi</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($pendaftaran_terbaru as $p)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-mono text-xs text-gray-600">{{ $p->no_pendaftaran }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $p->nama_lengkap }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $p->prodi_pilihan_1 }}</td>
                        <td class="px-6 py-4">
                            @php $badge = ['pending' => 'bg-yellow-100 text-yellow-700', 'diterima' => 'bg-green-100 text-green-700', 'ditolak' => 'bg-red-100 text-red-700']; @endphp
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $badge[$p->status] }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs">{{ $p->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.pendaftaran.show', $p->id) }}" class="text-blue-600 hover:underline text-xs">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-8 text-center text-gray-400">Belum ada data pendaftaran</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection