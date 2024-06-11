<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LulusanController extends Controller
{
        public function PenyerapanLulusan()
    {
        return view('admin.implementation.PenyerapanLulusan.index');
    }
}