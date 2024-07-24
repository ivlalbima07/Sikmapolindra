<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function pelatihan()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Pelatihan Kepada dunia kerja');
        }])->get();

        return view('admin.implementation.Pelatihan.index', compact('datakerjasama'));
    }

    public function isiPelatihan($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.Pelatihan.isiPelatihan', compact('itemKerjasama'));
    }
}