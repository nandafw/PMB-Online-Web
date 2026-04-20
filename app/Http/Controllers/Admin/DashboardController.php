<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_pendaftar' => Pendaftaran::count(),
            'pending'         => Pendaftaran::where('status', 'pending')->count(),
            'diterima'        => Pendaftaran::where('status', 'diterima')->count(),
            'ditolak'         => Pendaftaran::where('status', 'ditolak')->count(),
            'total_user'      => User::where('role', 'mahasiswa')->count(),
        ];
        $pendaftaran_terbaru = Pendaftaran::with('user')
            ->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'pendaftaran_terbaru'));
    }
}