<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use Illuminate\Http\Request;

class JoinResearchController extends Controller
{
    public function JoinResearch()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Joint Research');
        }])->get();

        return view('admin.implementation.JoinResearch.index', compact('datakerjasama'));
    }

    public function isiJoinResearch($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.JoinResearch.isiJoinResearch', compact('itemKerjasama'));
    }
}