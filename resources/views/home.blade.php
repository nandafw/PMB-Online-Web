@extends('layouts.app')
@section('title', 'Beranda PMB')
@section('content')

{{-- HERO SECTION --}}
<section class="relative min-h-screen flex items-center pt-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-red-900 via-red-800 to-gray-700"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="inline-flex items-center gap-2 bg-red-500/20 border border-red-600 text-gray-200 text-sm font-medium px-4 py-1.5 rounded-full mb-6">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    Pendaftaran {{ date('Y') }}/{{ date('Y') + 1 }} Dibuka
                </div>
                <h1 class="text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    Raih Masa<br>
                    <span class="text-amber-400">Depan Cerah</span><br>
                    Bersama Tel-U
                </h1>
                <p class="text-lg text-gray-100 leading-relaxed mb-8 max-w-lg">
                    Bergabunglah menjadi mahasiswa berprestasi di Telkom University. Daftarkan diri Anda sekarang juga melalui platform PMB Online.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('pendaftaran.create') }}"
                       class="px-8 py-4 bg-amber-400 hover:bg-amber-300 text-red-900 font-bold rounded-xl text-center transition-all shadow-lg hover:shadow-amber-400/30 hover:-translate-y-0.5">
                        Daftar Sekarang →
                    </a>
                    <a href="{{ route('tentang') }}"
                       class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl text-center border border-white/20 transition-all backdrop-blur-sm">
                        Pelajari Lebih Lanjut
                    </a>
                </div>

                <div class="mt-12 grid grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white">10+</div>
                        <div class="text-gray-200 text-sm mt-1">Program Studi</div>
                    </div>
                    <div class="text-center border-x border-white/50">
                        <div class="text-3xl font-bold text-white">10K+</div>
                        <div class="text-gray-200 text-sm mt-1">Mahasiswa</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white">95%</div>
                        <div class="text-gray-200 text-sm mt-1">Alumni Bekerja</div>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block">
                <div class="relative">
                    <div class="absolute -inset-4 bg-white/5 rounded-3xl backdrop-blur-sm border border-white/10"></div>
                    <div class="relative bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-8 text-white">
                        <div class="text-lg font-bold mb-4 text-white-300">📅 Jadwal PMB {{ date('Y') }}/{{ date('Y') + 1 }}</div>
                        <div class="space-y-4">
                            @php
                                $jadwal = [
                                    ['Gelombang I', 'Maret — April ' . date('Y'), true],
                                    ['Gelombang II', 'Mei — Juni ' . date('Y'), false],
                                    ['Gelombang III', 'Juli — Agustus ' . date('Y'), false],
                                    ['Pengumuman', 'September ' . date('Y'), false],
                                ];
                            @endphp
                            @foreach ($jadwal as [$nama, $waktu, $aktif])
                                <div class="flex items-center gap-3 p-3 rounded-xl {{ $aktif ? 'bg-amber-400/20 border border-amber-400/40' : 'bg-white/5' }}">
                                    <div class="w-2 h-2 rounded-full {{ $aktif ? 'bg-amber-300' : 'bg-red-400' }}"></div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-sm">{{ $nama }}
                                            @if($aktif)<span class="text-amber-300 text-xs ml-1">(Sekarang!)</span>@endif
                                        </div>
                                        <div class="text-red-200 text-xs">{{ $waktu }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Section 2 --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="text-red-600 font-semibold text-sm uppercase tracking-wider mb-2">Program Unggulan</div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Pilih Program Studi Anda</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Kami menawarkan berbagai program studi berkualitas yang siap membekali Anda dengan keahlian relevan di era digital.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $prodis = [
                    ['💻', 'Teknik Informatika', 'S1 — Akreditasi A', 'Pelajari pemrograman, AI, dan rekayasa perangkat lunak untuk solusi teknologi masa depan.'],
                    ['🧠', 'Sistem Informasi', 'S1 — Akreditasi A', 'Menggabungkan teknologi dan bisnis untuk membangun sistem informasi yang efektif dan efisien.'],
                    ['📊', 'Sains Data', 'S1 — Akreditasi B', 'Menganalisis data besar, machine learning, dan AI untuk pengambilan keputusan berbasis data.'],
                    ['⚙️', 'Rekayasa Perangkat Lunak', 'S1 — Akreditasi A', 'Fokus pada pengembangan software berkualitas, scalable, dan sesuai kebutuhan industri.'],
                    ['⚡', 'Teknik Elektro', 'S1 — Akreditasi A', 'Mempelajari sistem listrik, elektronika, kontrol, dan teknologi perangkat keras modern.'],
                    ['📈', 'Bisnis Digital', 'S1 — Akreditasi B', 'Menggabungkan teknologi digital, marketing, dan inovasi bisnis di era ekonomi digital.'],
                ];
            @endphp
            @foreach ($prodis as [$icon, $nama, $level, $desc])
                <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:border-red-200 hover:shadow-lg transition-all group">
                    <div class="text-3xl mb-4">{{ $icon }}</div>
                    <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-red-700 transition-colors">{{ $nama }}</h3>
                    <div class="text-xs text-red-600 font-medium mb-3">{{ $level }}</div>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Section 3 --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="text-red-600 font-semibold text-sm uppercase tracking-wider mb-2">Mengapa Kami</div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Universitas Terbaik untuk Masa Depan Bersama Teknolgi dan Digital</h2>
                <div class="space-y-4">
                    @php
                        $fitur = [
                            ['🏆', 'Akreditasi Institusi A', 'Tel-U menjadi Perguruan Tinggi Swasta Terbaik di Indonesia yang telah terakreditasi Unggul dari BAN-PT'],
                            ['👨‍🏫', 'Dosen Berpengalaman', '90% dosen bergelar S3 dengan pengalaman industri nyata.'],
                            ['🤝', 'Kemitraan Industri', 'Lebih dari 200 mitra perusahaan untuk magang dan penempatan kerja.'],
                            ['💡', 'Fasilitas Modern', 'Lab komputer terkini, studio kreatif, dan ruang kolaborasi 24 jam.'],
                        ];
                    @endphp
                    @foreach ($fitur as [$icon, $judul, $desc])
                        <div class="flex gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                            <span class="text-2xl">{{ $icon }}</span>
                            <div>
                                <h4 class="font-semibold text-gray-900">{{ $judul }}</h4>
                                <p class="text-gray-500 text-sm mt-0.5">{{ $desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-3xl p-8 flex items-stretch justify-center">
            <div class="w-full h-full flex items-stretch justify-center">
                <img 
                    src="{{ asset('images/telkomuniv.jpg') }}" 
                    alt="Gambar Kampus"
                    class="w-full h-full object-cover rounded-2xl shadow-lg">
            </div>
        </div>
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="py-20 bg-gradient-to-r from-red-700 to-red-900">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-white mb-4">Siap Memulai Perjalananmu di Telkom Unversity?</h2>
        <p class="text-red-200 text-lg mb-8">Daftarkan diri sekarang dan jadilah TelUtizen.</p>
        <a href="{{ route('pendaftaran.create') }}"
           class="inline-block px-10 py-4 bg-amber-400 hover:bg-amber-300 text-red-900 font-bold rounded-xl text-lg transition-all shadow-lg hover:-translate-y-0.5">
            Daftar Sekarang!
        </a>
    </div>
</section>

@endsection