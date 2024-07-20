<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use Illuminate\Http\Request;

class DosentamuController extends Controller
{
    public function DosenTamu()
    {
        // Mengambil data berdasarkan jenis kerjasama "Dosen/Tenaga Ahli dari Dunia Kerja (Dosen Tamu)"
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Dosen/Tenaga Ahli dari Dunia Kerja (Dosen Tamu)');
        }])->get();

        return view('admin.implementation.dosentamu.index', compact('datakerjasama'));
    }

    public function IsiData()
    {
        return view('admin.implementation.dosentamu.isidata');
    }
}