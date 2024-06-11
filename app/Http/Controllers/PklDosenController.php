<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PklDosenController extends Controller
{
  public function PklDosen()
    {
        return view('admin.implementation.PKLdosen.index');
    }

    public function IsiDatapkldosen()
    {
        return view('admin.implementation.PKLdosen.isidatatenagapendidik');
    }
}