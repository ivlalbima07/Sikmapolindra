<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosentamuController extends Controller
{
    public function DosenTamu()
    {
        return view('admin.implementation.dosentamu.index');
    }
    public function IsiData()
    {
        return view('admin.implementation.dosentamu.isidata');
    }
}