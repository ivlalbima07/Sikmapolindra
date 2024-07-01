<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use App\Models\Kbli;
use App\Models\DudiKbli;
use App\Models\Kriteria;
use App\Models\Province;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahdudiController extends Controller
{
    public function tambahDudi()
    {
        $data['provinces'] = Province::all();
        $data['kriterias'] = Kriteria::all();
        $data['klasifikasis'] = Klasifikasi::all();
        $data['kblis'] = Kbli::all();
        $dudis = Dudi::with('province', 'regency', 'kbli', 'kriteria', 'klasifikasi')->get();

        // dd($data);

        return view('admin.createdudi.index', $data, compact('dudis'));
    }

    
    public function store(Request $request)
{
    $request->validate([
        'nama_rombel' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'nib' => 'required|integer',
        'sk_pendirian' => 'required|date',
        'tipe' => 'required|string|max:255',
        'alamat' => 'nullable|string',
        'province_id' => 'required|exists:provinces,id',
        'regency_id' => 'required|exists:regencies,id',
        'district_id' => 'required|exists:districts,id',
        'village_id' => 'required|exists:villages,id',
        'email_mitra' => 'nullable|email',
        'no_telp_mitra' => 'nullable|string|max:15',
        'kbli' => 'nullable|array',
        'kerjasama' => 'required|in:nasional,internasional',
        'kriteria_id' => 'required|exists:kriterias,id',
        'klasifikasi_id' => 'required|exists:klasifikasis,id',
        'penanggung_jawab' => 'nullable|array',
    ]);

    DB::beginTransaction();

    try {
        // Buat objek Dudi
        $dudi = Dudi::create([
            'nama_rombel' => $request->input('nama_rombel'),
            'nama' => $request->input('nama'),
            'nib' => $request->input('nib'),
            'sk_pendirian' => $request->input('sk_pendirian'),
            'tipe' => $request->input('tipe'),
            'alamat' => $request->input('alamat'),
            'province_id' => $request->input('province_id'),
            'regency_id' => $request->input('regency_id'),
            'district_id' => $request->input('district_id'),
            'village_id' => $request->input('village_id'),
            'email_mitra' => $request->input('email_mitra'),
            'no_telp_mitra' => $request->input('no_telp_mitra'),
            'kerjasama' => $request->input('kerjasama'),
            'kriteria_id' => $request->input('kriteria_id'),
            'klasifikasi_id' => $request->input('klasifikasi_id')
        ]);

        // Commit transaksi untuk memastikan ID Dudi tersedia
        DB::commit();

        $dudi = Dudi::orderBy('id', 'desc')->first();
        
        // dd($dudi->id);

        // Mulai transaksi baru untuk menyimpan relasi dan data penanggung jawab
        DB::beginTransaction();

        // Simpan relasi many-to-many ke tabel dudi_kbli
        if ($request->has('kbli')) {
            foreach ($request->input('kbli') as $kbli_id) {
                DudiKbli::create([
                    'dudi_id' => $dudi->id,
                    'kbli_id' => $kbli_id
                ]);
            }
        }

        // Simpan data penanggung jawab
        if ($request->has('penanggung_jawab')) {
            foreach ($request->input('penanggung_jawab') as $pj) {
                if (!empty($pj['nama']) || !empty($pj['email']) || !empty($pj['no_hp'])) {
                    $dudi->penanggungJawabs()->create([
                        'dudi_id' => $dudi->id,
                        'nama' => $pj['nama'],
                        'email' => $pj['email'],
                        'no_hp' => $pj['no_hp'],
                        'jenis_kelamin' => $pj['jenis_kelamin'],
                        'jenis_identitas' => $pj['jenis_identitas'],
                        'nomor_identitas' => $pj['nomor_identitas'],
                        'kewarganegaraan' => $pj['kewarganegaraan'],
                    ]);
                }
            }
        }

        DB::commit();

        return response()->json(['success' => 'Dudi added successfully.']);
    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function show($id)
    {
        $dudi = Dudi::with('province', 'regency', 'kblis', 'kriteria', 'klasifikasi', 'district', 'village', 'penanggungJawabs')->find($id);
        // dd($dudi);
        if ($dudi) {
            return response()->json($dudi);
        } else {
            return response()->json(['message' => 'Data not found'], 404);
        }
    }

    public function edit($id)
{
    // dd($id);
    $dudi = Dudi::with(['province', 'regency', 'kblis', 'kriteria', 'klasifikasi', 'district', 'village', 'penanggungJawabs'])->findOrFail($id);
    // dd($dudi);
    return response()->json($dudi);
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_rombel' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'nib' => 'required|integer',
        'sk_pendirian' => 'required|date',
        'tipe' => 'required|string|max:255',
        'alamat' => 'required|string',
        'province_id' => 'required|exists:provinces,id',
        'regency_id' => 'required|exists:regencies,id',
        'district_id' => 'required|exists:districts,id',
        'village_id' => 'required|exists:villages,id',
        'email_mitra' => 'nullable|email',
        'no_telp_mitra' => 'nullable|string|max:15',
        'kbli' => 'nullable|array',
        'kerjasama' => 'required|in:nasional,internasional',
        'kriteria_id' => 'required|exists:kriterias,id',
        'klasifikasi_id' => 'required|exists:klasifikasis,id',
        'penanggung_jawab' => 'nullable|array',
    ]);

    try {
        DB::beginTransaction();

        $dudi = Dudi::findOrFail($id);
        $dudi->update([
            'nama_rombel' => $request->input('nama_rombel'),
            'nama' => $request->input('nama'),
            'nib' => $request->input('nib'),
            'sk_pendirian' => $request->input('sk_pendirian'),
            'tipe' => $request->input('tipe'),
            'alamat' => $request->input('alamat'),
            'province_id' => $request->input('province_id'),
            'regency_id' => $request->input('regency_id'),
            'district_id' => $request->input('district_id'),
            'village_id' => $request->input('village_id'),
            'email_mitra' => $request->input('email_mitra'),
            'no_telp_mitra' => $request->input('no_telp_mitra'),
            'kerjasama' => $request->input('kerjasama'),
            'kriteria_id' => $request->input('kriteria_id'),
            'klasifikasi_id' => $request->input('klasifikasi_id')
        ]);

        // Update relasi many-to-many ke tabel dudi_kbli
        if ($request->has('kbli')) {
            $dudi->kblis()->sync($request->input('kbli'));
        }

        // Update data penanggung jawab
        $dudi->penanggungJawabs()->delete();
        if ($request->has('penanggung_jawab')) {
            foreach ($request->input('penanggung_jawab') as $pj) {
                if (!empty($pj['nama']) || !empty($pj['email']) || !empty($pj['no_hp'])) {
                    $dudi->penanggungJawabs()->create([
                        'nama' => $pj['nama'],
                        'email' => $pj['email'],
                        'no_hp' => $pj['no_hp'],
                        'jenis_kelamin' => $pj['jenis_kelamin'],
                        'jenis_identitas' => $pj['jenis_identitas'],
                        'nomor_identitas' => $pj['nomor_identitas'],
                        'kewarganegaraan' => $pj['kewarganegaraan'],
                    ]);
                }
            }
        }

        DB::commit();

        return response()->json(['success' => 'Dudi updated successfully.']);
    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    public function destroy($id)
    {
        $dudi = Dudi::findOrFail($id);
        $dudi->delete();

        return redirect()->route('dudi.index')->with('success', 'Dudi deleted successfully.');
    }
}
