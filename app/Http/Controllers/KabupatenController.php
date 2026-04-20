<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;

class KabupatenController extends Controller
{
    public function byProvinsi($provinsi_id)
    {
        $kabupatens = Kabupaten::where('provinsi_id', $provinsi_id)
            ->orderBy('nama_kabupaten')
            ->get(['id', 'nama_kabupaten']);

        return response()->json($kabupatens);
    }
}