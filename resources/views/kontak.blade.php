@extends('layouts.app')
@section('title', 'Kontak PMB')
@section('content')
<div class="pt-16">
    <section class="bg-gradient-to-br from-red-700 to-red-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-extrabold mb-4">Hubungi Kami</h1>
            <p class="text-red-200 text-xl">Ada pertanyaan? Tim kami siap membantu Anda</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">
                {{-- Info Kontak --}}
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Informasi Kontak</h2>
                    <div class="space-y-6">
                        @php
                            $kontak = [
                                ['📍', 'Alamat', 'Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147'],
                                ['📞', 'Telepon', '0812 2831 9222 / 0851 3373 2543'],
                                ['📧', 'Email', 'info@smbbtelkom.ac.id'],
                                ['🕐', 'Jam Layanan', 'Senin — Jumat: 08.00 — 16.30 WIB'],
                            ];
                        @endphp
                        @foreach ($kontak as [$icon, $label, $val])
                            <div class="flex gap-4">
                                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center text-xl flex-shrink-0">{{ $icon }}</div>
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $label }}</div>
                                    <div class="text-gray-600 text-sm mt-0.5">{{ $val }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Google Maps --}}
                    <div class="mt-8 rounded-2xl overflow-hidden shadow-lg border border-gray-200">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.2707632167076!2d109.24686424856318!3d-7.435262351678652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655ea49d9f9885%3A0x62be0b6159700ec9!2sTelkom%20University%20Purwokerto!5e0!3m2!1sid!2sid!4v1776669594221!5m2!1sid!2sid"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p class="text-gray-400 text-xs mt-2"></p>
                </div>

                {{-- Form Pertanyaan --}}
                <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pertanyaan</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" placeholder="Masukkan nama Anda"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all bg-white">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" placeholder="nama@email.com"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all bg-white">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                            <select class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all bg-white">
                                <option value="">Pilih subjek...</option>
                                <option>Informasi Pendaftaran</option>
                                <option>Program Studi</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea rows="5" placeholder="Tulis pertanyaan Anda di sini..."
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all bg-white resize-none"></textarea>
                        </div>
                        <button type="button"
                            onclick="alert('Fitur ini akan dihubungkan ke email server. Silakan hubungi langsung via email atau telepon.')"
                            class="w-full py-3 bg-red-800 hover:bg-red-900 text-white font-semibold rounded-xl transition-all">
                            Kirim Pesan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection