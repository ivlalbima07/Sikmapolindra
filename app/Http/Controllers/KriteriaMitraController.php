<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaMitraController extends Controller
{
    // Menampilkan halaman index kriteria
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('admin.createdudi.kriteria.index', compact('kriterias'));
    }

    // Menyimpan kriteria baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kriterias,nama'
        ]);

        Kriteria::create($request->all());

        return response()->json(['success' => 'Kriteria added successfully.']);
    }


    // Mengupdate kriteria yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:kriterias,nama,' . $id
        ]);
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($request->all());

        return response()->json(['success' => 'Kriteria updated successfully.']);
    }

    // Menghapus kriteria
    public function destroy($id)
    {
        Kriteria::findOrFail($id)->delete();
        return response()->json(['success' => 'Kriteria deleted successfully.']);
    }
}