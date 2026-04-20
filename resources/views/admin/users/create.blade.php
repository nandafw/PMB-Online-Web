@extends('layouts.admin')
@section('title', 'Tambah User')
@section('page-title', 'Tambah User Baru')
@section('content')

<div class="max-w-lg">
    <a href="{{ route('admin.users.index') }}" class="text-sm text-red-700 hover:underline mb-4 block">← Kembali</a>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-5 text-sm text-red-600">
                @foreach ($errors->all() as $error) <div>• {{ $error }}</div> @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-700 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-700 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Role</label>
                <select name="role" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-700 outline-none">
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                <input type="password" name="password" required minlength="8" class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-700 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-700 outline-none">
            </div>
            <button type="submit" class="w-full py-3 bg-red-800 text-white font-semibold rounded-xl hover:bg-red-900 transition-all">
                Simpan User
            </button>
        </form>
    </div>
</div>

@endsection