<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahdudiController extends Controller
{
     public function tambahDudi()
    {
        return view('admin.createdudi.index');
    }
}