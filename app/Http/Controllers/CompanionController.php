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
        return view('admin.companion.index', compact('companions', 'dudi'));
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

        return redirect()->route('admin.companion.index')->with('success', 'Companion created successfully.');
    }

    // public function edit($id)
    // {
    //     $companion = Companion::findOrFail($id);
    //     $dudi = Dudi::all();
    //     return view('companions.edit', compact('companion', 'dudi'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:companions,email,' . $id,
    //         'phone' => 'required|string|max:15',
    //         'dudi_id' => 'required',
    //         'position' => 'required|string|max:255',
    //         'last_education' => 'required|string|max:255',
    //         'expertise' => 'required|string|max:255',
    //     ]);

    //     $companion = Companion::findOrFail($id);
    //     $companion->update($request->all());

    //     return redirect()->route('admin.companion.index')->with('success', 'Companion updated successfully.');
    // }

    // public function destroy($id)
    // {
    //     $companion = Companion::findOrFail($id);
    //     $companion->delete();

    //     return redirect()->route('admin.companion.index')->with('success', 'Companion deleted successfully.');
    // }
}