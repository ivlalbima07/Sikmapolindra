<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class TambahdudiController extends Controller
{
     public function tambahDudi()
    {
        $data['provinces']  = Province::get();
        return view('admin.createdudi.index', $data);
    }
}