<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use App\Models\Dudi;
use Illuminate\Http\Request;

class CompanionController extends Controller
{
    public function index()
    {
    $companions = Companion::all();
    $dudi = Dudi::all();
    $companion = Companion::first(); // atau Companion::find($id) jika menggunakan edit spesifik
    return view('admin.companion.index', compact('companions', 'dudi', 'companion'));
    }

    public function create()
    {
        return view('admin.companion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:companions,email',
            'no_telefon' => 'required|string|max:15',
            'dudi_id' => 'required',
            'jabatan_dudi' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'keahlian' => 'required|string|max:255',
        ]);

        Companion::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telefon' => $request->no_telefon,
            'dudi_id' => $request->dudi_id,
            'jabatan_dudi' => $request->jabatan_dudi,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'keahlian' => $request->keahlian,
        ]);

        return redirect()->route('companions.index')->with('status', 'Companion created successfully.');
    }

    public function edit($id)
    {
        // Cari data companion berdasarkan ID
        $companion = Companion::findOrFail($id);

        // Mengembalikan data dalam format JSON
        return response()->json($companion);
    }


    // public function edit(string $id)
    // {
    //     $companion = Companion::findOrFail($id);
    //     $dudi = Dudi::all();
    //     return view('admin.companion.edit', compact('companion', 'dudi'));
    // }

    public function update(Request $request, string $id)
    {
        $companion = Companion::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:companions,email,' . $companion->id,
            'no_telefon' => 'required|string|max:15',
            'dudi_id' => 'required',
            'jabatan_dudi' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'keahlian' => 'required|string|max:255',
        ]);

        $companion->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telefon' => $request->no_telefon,
            'dudi_id' => $request->dudi_id,
            'jabatan_dudi' => $request->jabatan_dudi,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'keahlian' => $request->keahlian,
        ]);

        return redirect()->route('companions.index')->with('status', 'Companion updated successfully.');
    }

    public function destroy(string $id)
    {
        $companion = Companion::findOrFail($id);
        $companion->delete();

        return redirect()->route('companions.index')->with('status', 'Companion deleted successfully.');
    }
}