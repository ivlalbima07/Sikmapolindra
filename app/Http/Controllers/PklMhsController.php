<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PklMhsController extends Controller
{
    public function lihat()
    {
        return view('admin.implementation.Pkl_Mahasiswa.lihatpelaksanaan');
    }
}