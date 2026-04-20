@extends('layouts.app')
@section('title', 'Tentang PMB')
@section('content')

<div class="pt-16">
    {{-- Hero --}}
    <section class="bg-gradient-to-br from-red-700 to-red-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-extrabold mb-4">Tentang PMB Online</h1>
            <p class="text-red-200 text-xl max-w-2xl mx-auto">Kenali lebih dalam sistem Penerimaan Mahasiswa Baru Telkom University Purwokerto</p>
        </div>
    </section>

    {{-- Apa itu PMB --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="text-red-600 font-semibold text-sm uppercase tracking-wider mb-2">Sistem Kami</div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Apa itu PMB Online?</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        <strong>PMB Online (Penerimaan Mahasiswa Baru Online)</strong> adalah sistem pendaftaran digital yang memungkinkan calon mahasiswa mendaftar ke Telkom University Purwokerto kapan saja dan di mana saja, tanpa perlu datang langsung ke kampus.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Sistem ini dirancang untuk memudahkan proses seleksi yang transparan, cepat, dan efisien. Mulai dari pengisian formulir, upload dokumen, hingga pengumuman hasil seleksi — semua dilakukan secara online.
                    </p>
                    <div class="flex flex-col gap-3 mt-6">
                        @foreach (['Pendaftaran 24/7 tanpa antri', 'Status pendaftaran real-time', 'Cetak bukti pendaftaran PDF', 'Notifikasi hasil seleksi'] as $f)
                            <div class="flex items-center gap-2 text-gray-700">
                                <div class="w-5 h-5 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                {{ $f }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-3xl p-8 border border-blue-100">
                    <div class="space-y-4">
                        @foreach (['📝 Isi Formulir Online' => '1', '📎 Upload Dokumen' => '2', '✅ Verifikasi Admin' => '3', '📢 Pengumuman' => '4'] as $step => $no)
                            <div class="flex items-center gap-4 bg-white rounded-xl p-4 shadow-sm">
                                <div class="w-8 h-8 rounded-full bg-red-600 text-white font-bold flex items-center justify-center text-sm">{{ $no }}</div>
                                <span class="font-medium text-gray-800">{{ $step }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- VIDEO YOUTUBE --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <div class="text-red-600 font-semibold text-sm uppercase tracking-wider mb-2">Video Profil</div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Lihat Kampus Kami</h2>
            <p class="text-gray-500 mb-8">Saksikan kehidupan kampus dan fasilitas unggulan Telkom University Purwokerto</p>

            {{-- Embed YouTube --}}
            <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-video bg-gray-900">
                <iframe
                    width="1000" 
                    height="560" 
                    src="https://www.youtube.com/embed/KbCrEg0HrUI?si=i-BpFbqG9ZZwH-u2" 
                    title="Profil Telkom University Purwokerto" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                </iframe>
            </div>
            <p class="text-gray-400 text-sm mt-4">💡 YouTube Telkom University Purwokerto</p>
        </div>
    </section>

    {{-- TIM PMB --}}
    <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <div class="text-red-600 font-semibold text-sm uppercase tracking-wider mb-2">PENGELOLA LAYANAN</div>
            <h2 class="text-4xl font-bold text-gray-900">Tim PMB Telkom University Purwokerto</h2>
        </div>

        @php
            $tim = [
                ['Mark Lee', 'Ketua PMB Online', 'Bertanggung jawab atas seluruh proses penerimaan mahasiswa baru.', 'mark.jpg'],
                ['Nanda Fadillah W', 'Koordinator Akademik', 'Mengelola proses verifikasi dokumen dan seleksi akademik calon mahasiswa.', 'nanda.jpeg'],
                ['Nyoman Ayu Carmenita', 'Koordinator Administrasi', 'Mengelola administrasi, registrasi, dan koordinasi keuangan PMB.', 'carmen.jpg'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @foreach ($tim as [$nama, $jabatan, $desc, $foto])

                <div class="text-center bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-all">

                    <!-- FOTO TIM -->
                    <div class="w-20 h-20 mx-auto mb-4">
                        <img src="{{ asset('images/' . $foto) }}" 
                             alt="{{ $nama }}"
                             class="w-full h-full object-cover rounded-full shadow-md ring-2 ring-blue-100">
                    </div>

                    <!-- INFO -->
                    <h3 class="font-bold text-gray-900 text-lg">{{ $nama }}</h3>
                    <div class="text-red-600 text-sm font-medium mt-1 mb-3">
                        {{ $jabatan }}
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        {{ $desc }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
</div>

@endsection