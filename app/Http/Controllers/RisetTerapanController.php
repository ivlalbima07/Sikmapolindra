<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RisetTerapanController extends Controller
{
       public function  RisetTerapan()
    {
        return view('admin.implementation.RisetTerapan.index');
    }
       public function  isiRisetTerapan()
    {
        return view('admin.implementation.RisetTerapan.isiRiset');
    }
}