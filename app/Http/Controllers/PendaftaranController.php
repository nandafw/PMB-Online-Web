<?php
namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Kabupaten;
use App\Models\Pendaftaran;
use App\Models\Provinsi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    public function create()
    {
        if (Pendaftaran::where('user_id', auth()->id())->exists()) {
            return redirect()->route('pendaftaran.index')
                ->with('error', 'Anda sudah melakukan pendaftaran.');
        }

        $provinsis = Provinsi::orderBy('nama_provinsi')->get();
        $agamas    = Agama::all();
        $prodis    = [
            'Teknik Informatika', 'Sistem Informasi', 'Sains Data',
            'Rekayasa Perangkat Lunak', 'Teknik Elektro', 'Bisnis Digital',
            'Desain Komunikasi Visual', 'Teknologi Pangan', 'Teknik Industri', 'Teknik Telekomunikasi',
            'Teknik Biomedis', 'Desain Produk',
        ];
        return view('pendaftaran.create', compact('provinsis', 'agamas', 'prodis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'nik'             => 'required|digits:16',
            'jenis_kelamin'   => 'required|in:L,P',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date|before:today',
            'agama_id'        => 'required|exists:agamas,id',
            'alamat'          => 'required|string',
            'provinsi_id'     => 'required|exists:provinsis,id',
            'kabupaten_id'    => 'required|exists:kabupatens,id',
            'kode_pos'        => 'required|digits_between:5,10',
            'no_hp'           => 'required|numeric|digits_between:10,15',
            'email'           => 'required|email',
            'asal_sekolah'    => 'required|string|max:255',
            'jurusan_sekolah' => 'required|string|max:100',
            'tahun_lulus'     => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            'nisn'            => 'nullable|string|max:20',
            'prodi_pilihan_1' => 'required|string',
            'prodi_pilihan_2' => 'nullable|string|different:prodi_pilihan_1',
        ]);

        $validated['user_id']       = auth()->id();
        $validated['no_pendaftaran'] = 'PMB-' . date('Y') . '-' . strtoupper(Str::random(6));

        Pendaftaran::create($validated);

        return redirect()->route('pendaftaran.riwayat')
            ->with('success', 'Pendaftaran berhasil! Nomor pendaftaran Anda: ' . $validated['no_pendaftaran']);
    }

    public function riwayat()
    {
        $pendaftaran = Pendaftaran::with(['provinsi', 'kabupaten', 'agama'])
            ->where('user_id', auth()->id())
            ->first();
        return view('pendaftaran.riwayat', compact('pendaftaran'));
    }

    public function cetak($id)
    {
        $pendaftaran = Pendaftaran::with(['provinsi', 'kabupaten', 'agama', 'user'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        $pdf = Pdf::loadView('pendaftaran.cetak-pdf', compact('pendaftaran'));
        return $pdf->download('bukti-pendaftaran-' . $pendaftaran->no_pendaftaran . '.pdf');
    }
}