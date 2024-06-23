<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CooperationController extends Controller
{
    public function cooperation()
    {
        return view('admin.cooperation.index');
    }
    public function DataDocument()
    {
        return view('admin.cooperation.document');
    }
}