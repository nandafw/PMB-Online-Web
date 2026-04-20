@extends('layouts.app')
@section('title', 'Daftar Akun')
@section('content')
<div class="min-h-screen pt-16 flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-white to-white-100 flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <img src="{{ asset('images/logotelu.png') }}" 
                        alt="logo"
                        class="w-15 h-15 object-contain">
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Buat Akun Baru</h1>
                <p class="text-gray-500 text-sm mt-1">Daftar untuk mulai proses pendaftaran</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-700 focus:border-transparent outline-none transition-all"
                        placeholder="Nama lengkap Anda">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-700 focus:border-transparent outline-none transition-all"
                        placeholder="nama@email.com">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                    <input type="password" name="password" required minlength="8"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-700 focus:border-transparent outline-none transition-all"
                        placeholder="Minimal 8 karakter">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-700 focus:border-transparent outline-none transition-all"
                        placeholder="Ulangi password">
                </div>
                <button type="submit"
                    class="w-full py-3 bg-red-800 hover:bg-red-900 text-white font-semibold rounded-xl transition-all shadow-sm">
                    Buat Akun
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-red-700 font-semibold hover:underline">Masuk di sini</a>
            </div>
        </div>
    </div>
</div>
@endsection