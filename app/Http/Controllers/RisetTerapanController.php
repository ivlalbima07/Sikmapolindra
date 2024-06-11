<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RisetTerapanController extends Controller
{
       public function  RisetTerapan()
    {
        return view('admin.implementation.RisetTerapan.index');
    }
}