<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran - {{ $pendaftaran->no_pendaftaran }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 12px; color: #1a1a1a; padding: 30px; }
        .header { text-align: center; border-bottom: 3px solid #9F1521; padding-bottom: 16px; margin-bottom: 20px; }
        .header h1 { font-size: 20px; font-weight: bold; color: #991b1b; }
        .header p { font-size: 11px; color: #555; margin-top: 2px; }
        .no-pendaftaran { background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 8px; padding: 10px 16px; text-align: center; margin: 16px 0; }
        .no-pendaftaran .label { font-size: 10px; color: #555; }
        .no-pendaftaran .value { font-size: 18px; font-weight: bold; color: #9F1521; font-family: monospace; }
        .status-badge { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: bold; }
        .status-pending  { background: #fef9c3; color: #854d0e; }
        .status-diterima { background: #dcfce7; color: #166534; }
        .status-ditolak  { background: #fee2e2; color: #991b1b; }
        .section-title { font-size: 11px; font-weight: bold; text-transform: uppercase; color: #9F1521; letter-spacing: 0.05em; margin: 14px 0 8px; border-bottom: 1px solid #dbeafe; padding-bottom: 4px; }
        .data-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 6px; }
        .data-item { background: #f9fafb; padding: 6px 10px; border-radius: 6px; }
        .data-item .label { font-size: 9px; color: #6b7280; margin-bottom: 2px; }
        .data-item .value { font-size: 11px; font-weight: 600; color: #111; }
        .footer { margin-top: 24px; border-top: 1px solid #e5e7eb; padding-top: 12px; text-align: center; font-size: 10px; color: #9ca3af; }
        .sign-area { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 30px; }
        .sign-box { text-align: center; }
        .sign-box .line { border-top: 1px solid #333; margin-top: 50px; padding-top: 4px; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>TELKOM UNIVERSITY</h1>
        <p>BUKTI PENDAFTARAN MAHASISWA BARU</p>
        <p>Tahun Akademik {{ date('Y') }}/{{ date('Y') + 1 }}</p>
    </div>

    <div class="no-pendaftaran">
        <div class="label">NOMOR PENDAFTARAN</div>
        <div class="value">{{ $pendaftaran->no_pendaftaran }}</div>
        <div style="margin-top:4px;">
            <span class="status-badge status-{{ $pendaftaran->status }}">
                {{ strtoupper($pendaftaran->status) }}
            </span>
        </div>
    </div>

    <div class="section-title">Data Pribadi</div>
    <div class="data-grid">
        <div class="data-item"><div class="label">Nama Lengkap</div><div class="value">{{ $pendaftaran->nama_lengkap }}</div></div>
        <div class="data-item"><div class="label">NIK</div><div class="value">{{ $pendaftaran->nik }}</div></div>
        <div class="data-item"><div class="label">Jenis Kelamin</div><div class="value">{{ $pendaftaran->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</div></div>
        <div class="data-item"><div class="label">Agama</div><div class="value">{{ $pendaftaran->agama->nama_agama }}</div></div>
        <div class="data-item"><div class="label">Tempat, Tgl Lahir</div><div class="value">{{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d/m/Y') }}</div></div>
        <div class="data-item"><div class="label">No. HP</div><div class="value">{{ $pendaftaran->no_hp }}</div></div>
        <div class="data-item" style="grid-column: 1/-1;"><div class="label">Alamat</div><div class="value">{{ $pendaftaran->alamat }}, {{ $pendaftaran->kabupaten->nama_kabupaten }}, {{ $pendaftaran->provinsi->nama_provinsi }}</div></div>
    </div>

    <div class="section-title">Data Pendidikan</div>
    <div class="data-grid">
        <div class="data-item"><div class="label">Asal Sekolah</div><div class="value">{{ $pendaftaran->asal_sekolah }}</div></div>
        <div class="data-item"><div class="label">Jurusan</div><div class="value">{{ $pendaftaran->jurusan_sekolah }}</div></div>
        <div class="data-item"><div class="label">Tahun Lulus</div><div class="value">{{ $pendaftaran->tahun_lulus }}</div></div>
        <div class="data-item"><div class="label">NISN</div><div class="value">{{ $pendaftaran->nisn ?: '-' }}</div></div>
    </div>

    <div class="section-title">Pilihan Program Studi</div>
    <div class="data-grid">
        <div class="data-item"><div class="label">Pilihan 1</div><div class="value">{{ $pendaftaran->prodi_pilihan_1 }}</div></div>
        <div class="data-item"><div class="label">Pilihan 2</div><div class="value">{{ $pendaftaran->prodi_pilihan_2 ?: '-' }}</div></div>
    </div>

    <div class="sign-area">
        <div class="sign-box">
            <div class="line">Pemohon<br><strong>{{ $pendaftaran->nama_lengkap }}</strong></div>
        </div>
        <div class="sign-box">
            <div class="line">Petugas PMB<br><strong>Telkom University Purwokerto</strong></div>
        </div>
    </div>

    <div class="footer">
        Dicetak pada: {{ now()->format('d F Y, H:i') }} WIB — Bukti ini sah tanpa tanda tangan basah
    </div>
</body>
</html>