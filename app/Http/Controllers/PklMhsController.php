<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use Illuminate\Http\Request;

class PklMhsController extends Controller
{
    public function Pkl_mahasiswa()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Praktek Kerja Lapangan (PKL) Mahasiswa');
        }])->get();

        return view('admin.implementation.Pkl_Mahasiswa.index', compact('datakerjasama'));
    }

    public function lihat($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.Pkl_Mahasiswa.lihatpelaksanaan', compact('itemKerjasama'));
    }
}