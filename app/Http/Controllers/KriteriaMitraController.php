<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaMitraController extends Controller
{
     public function Kriteria()
    {
        return view('admin.createdudi.kriteria.index');
    }
}