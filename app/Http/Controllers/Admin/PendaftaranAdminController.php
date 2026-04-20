<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftaran::with(['user', 'provinsi', 'kabupaten']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                  ->orWhere('no_pendaftaran', 'like', '%' . $request->search . '%');
            });
        }

        $pendaftarans = $query->latest()->paginate(15);
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::with(['user', 'provinsi', 'kabupaten', 'agama'])->findOrFail($id);
        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin.pendaftaran.edit', compact('pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $validated = $request->validate([
            'status'         => 'required|in:pending,diterima,ditolak',
            'catatan_admin'  => 'nullable|string',
        ]);
        $pendaftaran->update($validated);
        return redirect()->route('admin.pendaftaran.show', $id)
            ->with('success', 'Status pendaftaran diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update([
            'status'        => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ]);
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Pendaftaran::findOrFail($id)->delete();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran dihapus.');
    }
}
