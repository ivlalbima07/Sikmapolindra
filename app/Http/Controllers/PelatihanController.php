<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelatihanController extends Controller
{
        public function pelatihan()
    {
        return view('admin.implementation.Pelatihan.index');
    }
}