<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use Illuminate\Http\Request;

class SertifikasiController extends Controller
{
    public function Sertifikasi()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Sertifikasi Kompetensi');
        }])->get();

        return view('admin.implementation.Sertifikasi.index', compact('datakerjasama'));
    }

    public function IsiSertifikasi($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.Sertifikasi.isiSertifikasi', compact('itemKerjasama'));
    }
}