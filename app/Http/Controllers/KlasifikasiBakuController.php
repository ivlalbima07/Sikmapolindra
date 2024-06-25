<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kbli;

class KlasifikasiBakuController extends Controller
{
    public function index()
    {
        $kblis = Kbli::all();
        return view('admin.createdudi.KlasifikasiBaku.index', compact('kblis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kblis'
        ]);

        Kbli::create($request->all());

        return response()->json(['success' => 'KBLI added successfully.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:kblis,nama,'.$id
        ]);

        $kbli = Kbli::findOrFail($id);
        $kbli->update($request->all());

        return response()->json(['success' => 'KBLI updated successfully.']);
    }

    public function destroy($id)
    {
        Kbli::findOrFail($id)->delete();
        return response()->json(['success' => 'KBLI deleted successfully.']);
    }
}