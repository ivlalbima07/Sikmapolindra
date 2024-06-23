<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{
     public function Klasifikasi()
    {
        return view('admin.createdudi.klasifikasi.index');
    }
}