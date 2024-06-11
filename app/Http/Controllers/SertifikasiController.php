<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SertifikasiController extends Controller
{
        public function Sertifikasi()
    {
        return view('admin.implementation.Sertifikasi.index');
    }
}