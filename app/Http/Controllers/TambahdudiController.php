<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Kriteria;
use App\Models\Klasifikasi;
use App\Models\Kbli;
use Illuminate\Http\Request;

class TambahdudiController extends Controller
{
    public function tambahDudi()
    {
        $data['provinces'] = Province::all();
        $data['kriterias'] = Kriteria::all();
        $data['klasifikasis'] = Klasifikasi::all();
        $data['kblis'] = Kbli::all();

        return view('admin.createdudi.index', $data);
    }
}
