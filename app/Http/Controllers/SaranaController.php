<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use Illuminate\Http\Request;

class SaranaController extends Controller
{
    public function Sarana()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Sarana');
        }])->get();

        return view('admin.implementation.Sarana.index', compact('datakerjasama'));
    }

    public function isiSarana($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.Sarana.isiSarana',);
    }
}