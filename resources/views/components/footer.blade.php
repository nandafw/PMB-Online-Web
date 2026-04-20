<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-md">
                        <img src="{{ asset('images/logotelu.png') }}" 
                            alt="logo"
                            class="w-10 h-10 object-contain">
                    </div>
                    <div>
                        <div class="font-bold text-white">Telkom University Purwokerto</div>
                        <div class="text-xs text-gray-400">PMB Online</div>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed max-w-xs">
                    Sistem Penerimaan Mahasiswa Baru Online. Daftar sekarang dan raih masa depan bersama kami.
                </p>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-4">FAQ</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="{{ route('tentang') }}" class="hover:text-white transition-colors">Tentang PMB</a></li>
                    <li><a href="{{ route('pendaftaran.index') }}" class="hover:text-white transition-colors">Pendaftaran</a></li>
                    <li><a href="{{ route('kontak') }}" class="hover:text-white transition-colors">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-4">Kontak</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        info@smbbtelkom.ac.id
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        0812 2831 9222
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-gray-800 my-8">
        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500 gap-2">
            <p>&copy; {{ date('Y') }} PMB Telkom University Purwokerto.</p>
            <p>Sistem PMB Online</p>
        </div>
    </div>
</footer>