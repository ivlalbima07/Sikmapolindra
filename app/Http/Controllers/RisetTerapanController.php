<?php
namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use Illuminate\Http\Request;

class RisetTerapanController extends Controller
{
    public function RisetTerapan()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Riset Terapan');
        }])->get();

        return view('admin.implementation.RisetTerapan.index', compact('datakerjasama'));
    }

    public function isiRisetTerapan($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.RisetTerapan.isiRiset', compact('itemKerjasama'));
    }
}