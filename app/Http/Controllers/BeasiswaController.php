<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
        public function Beasiswa()
    {
        return view('admin.implementation.Beasiswa.index');
    }
        public function isiBeasiswa()
    {
        return view('admin.implementation.Beasiswa.isiBeasiswa');
    }
}