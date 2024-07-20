<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function Beasiswa()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Beasiswa/Ikatan Dinas');
        }])->get();

        return view('admin.implementation.Beasiswa.index', compact('datakerjasama'));
    }

    public function isiBeasiswa($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.Beasiswa.isiBeasiswa', compact('itemKerjasama'));
    }
}