<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlasifikasiBakuController extends Controller
{
         public function KlasifikasiBaku()
    {
        return view('admin.createdudi.KlasifikasiBaku.index');
    }
}