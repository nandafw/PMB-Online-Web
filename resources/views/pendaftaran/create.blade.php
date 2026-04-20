@extends('layouts.app')
@section('title', 'Formulir Pendaftaran')
@section('content')
<div class="pt-24 pb-20 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">

        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Formulir Pendaftaran</h1>
            <p class="text-gray-500">PMB Online — Universitas Nusantara {{ date('Y') }}/{{ date('Y') + 1 }}</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-2xl p-5 mb-6">
                <h4 class="font-semibold text-red-700 mb-2">⚠️ Ada kesalahan pada formulir:</h4>
                <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data"
              id="form-pendaftaran" class="space-y-6" novalidate>
            @csrf

            {{--DATA PRIBADI--}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-pink-200 px-6 py-4">
                    <h2 class="text-black font-bold text-lg flex items-center gap-2">
                        <span>👤</span> Data Pribadi Calon Mahasiswa
                    </h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="md:col-span-2">
                        <label class="label-field">Nama Lengkap :<span class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                            class="input-field @error('nama_lengkap') border-red-400 @enderror"
                            placeholder="Nama lengkap sesuai KTP" required>
                        @error('nama_lengkap') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">NIK (16 digit) :<span class="text-red-500">*</span></label>
                        <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16"
                            class="input-field @error('nik') border-red-400 @enderror"
                            placeholder="1234567890123456"
                            oninput="this.value=this.value.replace(/\D/g,'')"
                            onblur="validateNIK(this)" required>
                        @error('nik') <p class="error-msg">{{ $message }}</p> @enderror
                        <p id="nik-error" class="error-msg hidden">NIK harus 16 digit angka</p>
                    </div>

                    <div>
                        <label class="label-field">Jenis Kelamin :<span class="text-red-500">*</span></label>
                        <select name="jenis_kelamin" class="input-field" required>
                            <option value="">— Pilih —</option>
                            <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">Tempat Lahir :<span class="text-red-500">*</span></label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            class="input-field @error('tempat_lahir') border-red-400 @enderror"
                            placeholder="Kota tempat lahir" required>
                        @error('tempat_lahir') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">Tanggal Lahir :<span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="input-field @error('tanggal_lahir') border-red-400 @enderror" required>
                        @error('tanggal_lahir') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">Agama :<span class="text-red-500">*</span></label>
                        <select name="agama_id" class="input-field" required>
                            <option value=""> — Pilih Agama —</option>
                            @foreach ($agamas as $agama)
                                <option value="{{ $agama->id }}" {{ old('agama_id') == $agama->id ? 'selected' : '' }}>
                                    {{ $agama->nama_agama }}
                                </option>
                            @endforeach
                        </select>
                        @error('agama_id') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="label-field">Alamat Lengkap :<span class="text-red-500">*</span></label>
                        <textarea name="alamat" rows="3"
                            class="input-field resize-none @error('alamat') border-red-400 @enderror"
                            placeholder="Jl. Nama Jalan No. XX, RT/RW, Kelurahan, Kecamatan" required>{{ old('alamat') }}</textarea>
                        @error('alamat') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">Provinsi :<span class="text-red-500">*</span></label>
                        <select name="provinsi_id" id="provinsi_id" class="input-field" required onchange="loadKabupaten(this.value)">
                            <option value="">— Pilih Provinsi —</option>
                            @foreach ($provinsis as $provinsi)
                                <option value="{{ $provinsi->id }}" {{ old('provinsi_id') == $provinsi->id ? 'selected' : '' }}>
                                    {{ $provinsi->nama_provinsi }}
                                </option>
                            @endforeach
                        </select>
                        @error('provinsi_id') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">Kabupaten/Kota :<span class="text-red-500">*</span></label>
                        <select name="kabupaten_id" id="kabupaten_id" class="input-field" required>
                            <option value="">— Pilih Kabupaten/Kota —</option>
                        </select>
                        @error('kabupaten_id') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">Kode Pos <span class="text-red-500">*</span></label>
                        <input type="text" name="kode_pos" value="{{ old('kode_pos') }}" maxlength="10"
                            class="input-field @error('kode_pos') border-red-400 @enderror"
                            placeholder="53111" oninput="this.value=this.value.replace(/\D/g,'')" required>
                        @error('kode_pos') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">No. HP : <span class="text-red-500">*</span></label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" id="no_hp"
                            class="input-field @error('no_hp') border-red-400 @enderror"
                            placeholder="08123456789"
                            oninput="this.value=this.value.replace(/\D/g,'')"
                            onblur="validateHP(this, 'hp-error')" required>
                        @error('no_hp') <p class="error-msg">{{ $message }}</p> @enderror
                        <p id="hp-error" class="error-msg hidden">No. HP harus berupa angka (10-15 digit)</p>
                    </div>

                    <div>
                        <label class="label-field">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                            class="input-field @error('email') border-red-400 @enderror"
                            placeholder="nama@email.com" required>
                        @error('email') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                </div>
            </div>

            {{-- DATA PENDIDIKAN --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-green-200 px-6 py-4">
                    <h2 class="text-black font-bold text-lg flex items-center gap-2">
                        <span>🎓</span> Data Pendidikan Terakhir
                    </h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="md:col-span-2">
                        <label class="label-field">Nama Sekolah Asal :<span class="text-red-500">*</span></label>
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                            class="input-field @error('asal_sekolah') border-red-400 @enderror"
                            placeholder="SMA/SMK/MA Nama Sekolah" required>
                        @error('asal_sekolah') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">Jurusan :<span class="text-red-500">*</span></label>
                        <input type="text" name="jurusan_sekolah" value="{{ old('jurusan_sekolah') }}"
                            class="input-field @error('jurusan_sekolah') border-red-400 @enderror"
                            placeholder="IPA / IPS " required>
                        @error('jurusan_sekolah') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">Tahun Lulus :<span class="text-red-500">*</span></label>
                        <input type="number" name="tahun_lulus" value="{{ old('tahun_lulus') }}"
                            class="input-field @error('tahun_lulus') border-red-400 @enderror"
                            placeholder="{{ date('Y') }}" min="2000" max="{{ date('Y') }}" required>
                        @error('tahun_lulus') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="label-field">NISN :</label>
                        <input type="text" name="nisn" value="{{ old('nisn') }}"
                            class="input-field" placeholder="Nomor Induk Siswa Nasional">
                    </div>

                </div>
            </div>

            {{-- PILIHAN PRODI --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-purple-200 px-6 py-4">
                    <h2 class="text-black font-bold text-lg flex items-center gap-2">
                        <span>📚</span> Pilihan Program Studi
                    </h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="label-field">Pilihan 1 :<span class="text-red-500">*</span></label>
                        <select name="prodi_pilihan_1" id="prodi1" class="input-field" required onchange="checkDuplicateProdi()">
                            <option value="">——</option>
                            @foreach ($prodis as $prodi)
                                <option value="{{ $prodi }}" {{ old('prodi_pilihan_1') === $prodi ? 'selected' : '' }}>{{ $prodi }}</option>
                            @endforeach
                        </select>
                        @error('prodi_pilihan_1') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="label-field">Pilihan 2 :</label>
                        <select name="prodi_pilihan_2" id="prodi2" class="input-field" onchange="checkDuplicateProdi()">
                            <option value="">——</option>
                            @foreach ($prodis as $prodi)
                                <option value="{{ $prodi }}" {{ old('prodi_pilihan_2') === $prodi ? 'selected' : '' }}>{{ $prodi }}</option>
                            @endforeach
                        </select>
                        <p id="prodi-dup-error" class="error-msg hidden">Pilihan 1 dan 2 tidak boleh sama</p>
                        @error('prodi_pilihan_2') <p class="error-msg">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex gap-4">
                <button type="submit" id="btn-submit"
                    class="flex-1 py-4 bg-red-800 hover:bg-red-900 text-white font-bold rounded-xl transition-all shadow-sm text-lg">
                    📨 Kirim Pendaftaran
                </button>
                <a href="{{ route('home') }}" class="px-6 py-4 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    .label-field { @apply block text-sm font-medium text-gray-700 mb-1.5; }
    .input-field  { @apply w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all text-sm bg-white; }
    .error-msg    { @apply text-red-500 text-xs mt-1; }
</style>
@endpush

@push('scripts')
<script>
//Load Kabupaten via AJAX
function loadKabupaten(provinsiId) {
    const sel = document.getElementById('kabupaten_id');
    sel.innerHTML = '<option value="">Memuat...</option>';
    if (!provinsiId) { sel.innerHTML = '<option value="">— Pilih Kabupaten/Kota —</option>'; return; }

    fetch(`/api/kabupatens/${provinsiId}`)
        .then(r => r.json())
        .then(data => {
            sel.innerHTML = '<option value="">— Pilih Kabupaten/Kota —</option>';
            data.forEach(k => {
                const opt = document.createElement('option');
                opt.value = k.id;
                opt.textContent = k.nama_kabupaten;
                sel.appendChild(opt);
            });
        })
        .catch(() => { sel.innerHTML = '<option value="">Gagal memuat data</option>'; });
}

function validateNIK(el) {
    const err = document.getElementById('nik-error');
    if (!/^\d{16}$/.test(el.value)) {
        err.classList.remove('hidden');
        el.classList.add('border-red-400');
    } else {
        err.classList.add('hidden');
        el.classList.remove('border-red-400');
    }
}

function validateHP(el, errId) {
    const err = document.getElementById(errId);
    if (!err) return;
    const val = el.value.replace(/\D/g, '');
    if (val && (val.length < 10 || val.length > 15)) {
        err.classList.remove('hidden');
        el.classList.add('border-red-400');
    } else {
        err.classList.add('hidden');
        el.classList.remove('border-red-400');
    }
}

function checkDuplicateProdi() {
    const p1  = document.getElementById('prodi1').value;
    const p2  = document.getElementById('prodi2').value;
    const err = document.getElementById('prodi-dup-error');
    if (p1 && p2 && p1 === p2) {
        err.classList.remove('hidden');
        document.getElementById('prodi2').classList.add('border-red-400');
    } else {
        err.classList.add('hidden');
        document.getElementById('prodi2').classList.remove('border-red-400');
    }
}

document.getElementById('form-pendaftaran').addEventListener('submit', function(e) {
    let valid = true;

    // NIK
    const nik = document.querySelector('[name="nik"]');
    if (!/^\d{16}$/.test(nik.value)) { validateNIK(nik); valid = false; }

    // Prodi duplikat
    const p1 = document.getElementById('prodi1').value;
    const p2 = document.getElementById('prodi2').value;
    if (p1 && p2 && p1 === p2) { checkDuplicateProdi(); valid = false; }

    if (!valid) {
        e.preventDefault();
        alert('⚠️ Mohon perbaiki kesalahan pada formulir sebelum mengirim.');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});

//load kabupaten jika ada nilai lama (old input)
const oldProvinsi = '{{ old('provinsi_id') }}';
if (oldProvinsi) loadKabupaten(oldProvinsi);
</script>
@endpush

@endsection