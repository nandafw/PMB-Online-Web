@extends('layouts.admin')
@section('title', 'Kelola User')
@section('page-title', 'Kelola User')
@section('content')

<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total {{ $users->total() }} user mahasiswa</p>
    <a href="{{ route('admin.users.create') }}"
       class="px-4 py-2 bg-red-800 text-white rounded-xl text-sm font-semibold hover:bg-red-900 transition-all flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah User
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">#</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Nama</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Email</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Role</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Status Daftar</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase">Bergabung</th>
                    <th class="px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3 text-gray-400">{{ $loop->iteration }}</td>
                        <td class="px-5 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold flex items-center justify-center text-sm">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span class="font-medium text-gray-900">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-5 py-3 text-gray-600">{{ $user->email }}</td>
                        <td class="px-5 py-3">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">{{ ucfirst($user->role) }}</span>
                        </td>
                        <td class="px-5 py-3">
                            @if($user->pendaftaran)
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Sudah Daftar</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-500">Belum Daftar</span>
                            @endif
                        </td>
                        <td class="px-5 py-3 text-xs text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-5 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="px-3 py-1 bg-amber-50 text-amber-500 rounded-lg text-xs font-medium hover:bg-amber-100">Edit</a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                      onsubmit="return confirm('Hapus user ini? Semua data pendaftarannya akan ikut terhapus.')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-50 text-red-500 rounded-lg text-xs font-medium hover:bg-red-100">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="px-6 py-12 text-center text-gray-400">Belum ada user</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $users->links() }}
    </div>
</div>

@endsection