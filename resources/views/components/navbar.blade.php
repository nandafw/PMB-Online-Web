<nav class="fixed top-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-md">
                    <img src="{{ asset('images/logotelu.png') }}" 
                        alt="logo"
                        class="w-10 h-10 object-contain">
                </div>
                <div>
                    <div class="font-bold text-red-800 leading-none text-sm">PMB Telkom University Purwokerto</div>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-700 hover:bg-red-50 rounded-lg transition-all {{ request()->routeIs('home') ? 'text-red-700 bg-red-50 font-semibold' : '' }}">Beranda</a>
                <a href="{{ route('tentang') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-700 hover:bg-red-50 rounded-lg transition-all {{ request()->routeIs('tentang') ? 'text-red-700 bg-red-50 font-semibold' : '' }}">Tentang PMB</a>
                <a href="{{ route('pendaftaran.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-700 hover:bg-red-50 rounded-lg transition-all {{ request()->routeIs('pendaftaran.*') ? 'text-red-700 bg-red-50 font-semibold' : '' }}">Pendaftaran</a>
                <a href="{{ route('kontak') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-700 hover:bg-red-50 rounded-lg transition-all {{ request()->routeIs('kontak') ? 'text-red-700 bg-red-50 font-semibold' : '' }}">Kontak</a>
            </div>

            {{-- Auth Button --}}
            <div class="hidden md:flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}"
                       class="px-5 py-2 text-sm font-semibold text-red-800 border-2 border-red-900 rounded-lg hover:bg-red-900 hover:text-white transition-all">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-5 py-2 text-sm font-semibold text-white bg-red-800 rounded-lg hover:bg-red-900 transition-all shadow-sm">
                        Daftar
                    </a>
                @else
                    <div class="relative" x-data="{ dropdown: false }">
                        <button @click="dropdown = !dropdown"
                            class="flex items-center gap-2 px-3 py-1.5 rounded-xl hover:bg-gray-100 transition-all">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-600 to-red-400 flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <div class="text-sm font-semibold text-gray-800 leading-none">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-gray-500 leading-none mt-0.5">{{ auth()->user()->isAdmin() ? 'Admin' : 'Calon Mahasiswa' }}</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-500 transition-transform" :class="{ 'rotate-180': dropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <div x-show="dropdown" @click.away="dropdown = false"
                             x-transition
                             class="absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden">
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-gray-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                    Dashboard Admin
                                </a>
                            @else
                                <a href="{{ route('pendaftaran.riwayat') }}" class="flex items-center gap-2 px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-gray-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    Riwayat Pendaftaran
                                </a>
                            @endif
                            <hr class="border-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            {{-- Mobile Hamburger --}}
            <button @click="open = !open" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-transition class="md:hidden pb-4 border-t border-gray-100 pt-3">
            <div class="flex flex-col gap-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-blue-50 rounded-lg">Beranda</a>
                <a href="{{ route('tentang') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-blue-50 rounded-lg">Tentang PMB</a>
                <a href="{{ route('pendaftaran.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-blue-50 rounded-lg">Pendaftaran</a>
                <a href="{{ route('kontak') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-blue-50 rounded-lg">Kontak</a>
                <hr class="my-2 border-gray-100">
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-blue-700 border border-blue-700 rounded-lg text-center">Masuk</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-semibold text-white bg-blue-700 rounded-lg text-center mt-1">Daftar</a>
                @else
                    <a href="{{ route('pendaftaran.riwayat') }}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">Riwayat Pendaftaran</a>
                    <form method="POST" action="{{ route('logout') }}">@csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg">Keluar</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>