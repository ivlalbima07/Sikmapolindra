<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function recap()
    {
        return view('admin.recap.index');
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }



    public function implementation()
    {
        return view('admin.implementation.index');
    }

    public function companion()
    {
        return view('admin.companion.index');
    }


    public function resetpassword()
    {
        return view('admin.reset_password.index');
    }
    // public function DosenTamu()
    // {
    //     return view('admin.implementation.dosentamu.index');
    // }
    public function Pkl_mahasiswa()
    {
        return view('admin.implementation.Pkl_Mahasiswa.index');
    }
    public function isipelaksanaan()
    {
        return view('admin.implementation.Pkl_Mahasiswa.isipelaksanaan');
    }
}