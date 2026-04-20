@extends('layouts.admin')
@section('title', 'Data Pendaftaran')
@section('page-title', 'Data Pendaftaran')
@section('content')

{{-- Filter & Search --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 mb-6">
    <form method="GET" class="flex flex-wrap gap-3 items-center">
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari nama / nomor pendaftaran..."
            class="flex-1 min-w-48 px-4 py-2 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-700 outline-none">
        <select name="status" class="px-4 py-2 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-700 outline-none">
            <option value="">Semua Status</option>
            <option value="pending"  {{ request('status') === 'pending'  ? 'selected' : '' }}>Pending</option>
            <option value="diterima" {{ request('status') === 'diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="ditolak"  {{ request('status') === 'ditolak'  ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit" class="px-4 py-2 bg-red-800 text-white rounded-xl text-sm font-medium hover:bg-red-900">Cari</button>
        @if(request()->hasAny(['search', 'status']))
            <a href="{{ route('admin.pendaftaran.index') }}" class="px-4 py-2 border border-gray-300 text-gray-600 rounded-xl text-sm hover:bg-gray-50">Reset</a>
        @endif
    </form>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">#</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">No. Pendaftaran</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Nama Lengkap</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Prodi Pilihan 1</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Asal Sekolah</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Tanggal</th>
                    <th class="px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($pendaftarans as $p)
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3 text-gray-400">{{ $loop->iteration + ($pendaftarans->currentPage() - 1) * $pendaftarans->perPage() }}</td>
                        <td class="px-5 py-3 font-mono text-xs">{{ $p->no_pendaftaran }}</td>
                        <td class="px-5 py-3 font-medium text-gray-900">{{ $p->nama_lengkap }}</td>
                        <td class="px-5 py-3 text-gray-600">{{ $p->prodi_pilihan_1 }}</td>
                        <td class="px-5 py-3 text-gray-600">{{ $p->asal_sekolah }}</td>
                        <td class="px-5 py-3">
                            @php $badge = ['pending' => 'bg-yellow-100 text-yellow-700', 'diterima' => 'bg-green-100 text-green-700', 'ditolak' => 'bg-red-100 text-red-700']; @endphp
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $badge[$p->status] }}">{{ ucfirst($p->status) }}</span>
                        </td>
                        <td class="px-5 py-3 text-xs text-gray-500">{{ $p->created_at->format('d M Y') }}</td>
                        <td class="px-5 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.pendaftaran.show', $p->id) }}" class="px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-medium hover:bg-blue-100">Detail</a>
                                <form method="POST" action="{{ route('admin.pendaftaran.destroy', $p->id) }}"
                                      onsubmit="return confirm('Hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-50 text-red-500 rounded-lg text-xs font-medium hover:bg-red-100">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="px-6 py-12 text-center text-gray-400">Belum ada data pendaftaran</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $pendaftarans->withQueryString()->links() }}
    </div>
</div>

@endsection