<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use Illuminate\Http\Request;

class LulusanController extends Controller
{
    public function PenyerapanLulusan()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Penyerapan Lulusan');
        }])->get();

        return view('admin.implementation.PenyerapanLulusan.index', compact('datakerjasama'));
    }

    public function isiPenyerapan($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.PenyerapanLulusan.isiPenyerapan');
    }
}