@extends('layouts.app')
@section('title', 'Login')
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
                <h1 class="text-2xl font-bold text-gray-900">Masuk ke PMB Online</h1>
                <p class="text-gray-500 text-sm mt-1">Silakan masuk untuk melanjutkan</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-700 focus:border-transparent outline-none transition-all @error('email') border-red-400 @enderror"
                        placeholder="nama@email.com">
                </div>
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="text-sm font-medium text-gray-700">Password</label>
                    </div>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-700 focus:border-transparent outline-none transition-all"
                        placeholder="••••••••">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded text-red-600">
                    <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
                </div>
                <button type="submit"
                    class="w-full py-3 bg-red-800 hover:bg-red-900 text-white font-semibold rounded-xl transition-all shadow-sm">
                    Masuk
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-red-700 font-semibold hover:underline">Daftar sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection