<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Klasifikasi;

class KlasifikasiController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $klasifikasis = Klasifikasi::with('kriteria')->get();
        return view('admin.createdudi.klasifikasi.index', compact('kriterias', 'klasifikasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_klasifikasi' => 'required',
            'kriteria_id' => 'required|exists:kriterias,id'
        ]);

        Klasifikasi::create($request->all());

        return response()->json(['success' => 'Klasifikasi added successfully.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_klasifikasi' => 'required',
            'kriteria_id' => 'required|exists:kriterias,id'
        ]);

        $klasifikasi = Klasifikasi::findOrFail($id);
        $klasifikasi->update($request->all());

        return response()->json(['success' => 'Klasifikasi updated successfully.']);
    }

    public function destroy($id)
    {
        Klasifikasi::findOrFail($id)->delete();
        return response()->json(['success' => 'Klasifikasi deleted successfully.']);
    }
}