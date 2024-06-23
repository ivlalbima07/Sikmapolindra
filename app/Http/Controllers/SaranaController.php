<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaranaController extends Controller
{
        public function Sarana()
    {
        return view('admin.implementation.Sarana.index');
    }
        public function isiSarana()
    {
        return view('admin.implementation.Sarana.isiSarana');
    }
}