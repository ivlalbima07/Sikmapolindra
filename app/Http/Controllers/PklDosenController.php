<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use Illuminate\Http\Request;

class PklDosenController extends Controller
{
    public function PklDosen()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Praktek Kerja Lapangan (PKL) Dosen');
        }])->get();

        return view('admin.implementation.PKLdosen.index', compact('datakerjasama'));
    }

    public function IsiDatapkldosen($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.PKLdosen.isidatatenagapendidik', compact('itemKerjasama'));
    }
}