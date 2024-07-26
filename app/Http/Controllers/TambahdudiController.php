<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use App\Models\Kbli;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Kriteria;
use App\Models\Province;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Models\Penanggungjawab;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TambahdudiController extends Controller
{
    public function index()
    {
        $data['provinces'] = Province::all();
        $data['kriterias'] = Kriteria::all();
        $data['klasifikasis'] = Klasifikasi::all();
        $data['kblis'] = Kbli::all();
        $data['dudis'] = Dudi::with(['provinsi', 'kabupaten', 'kecamatan', 'desa', 'kriteria', 'user'])->get();

        // dd(Auth::id());
        return view('admin.createdudi.index', $data);
    }

    public function tambahDudi()
    {
        $data['provinces'] = Province::all();
        $data['kriterias'] = Kriteria::all();
        $data['klasifikasis'] = Klasifikasi::all();
        $data['kblis'] = Kbli::all();

        return view('admin.createdudi.index', $data);
    }

    public function store(Request $request)
{
    // Validasi data input
    $validatedData = $request->validate([
        'nama_perseroan' => 'required',
        'nib' => 'required',
        'tanggal_terbit' => 'required|date',
        'tipe' => 'required',
        'alamat' => 'required',
        'province_id' => 'required|exists:provinces,id',
        'regency_id' => 'required|exists:regencies,id',
        'district_id' => 'required|exists:districts,id',
        'village_id' => 'required|exists:villages,id',
        'email_mitra' => 'required|email',
        'no_telp_mitra' => 'required',
        'klasifikasi_baku' => 'required|array',
        'lingkupkerjasama' => 'required',
        'kriteria_id' => 'required|exists:kriterias,id',
        'klasifikasi_id' => 'required|exists:klasifikasis,id',
        'penanggung_jawab' => 'nullable|array',
        'penanggung_jawab.*.nama' => 'nullable|string',
        'penanggung_jawab.*.email' => 'nullable|email',
        'penanggung_jawab.*.nomor_hp' => 'nullable|string',
        'penanggung_jawab.*.jenis_kelamin' => 'nullable|string',
        'penanggung_jawab.*.jenis_identitas' => 'nullable|string',
        'penanggung_jawab.*.nomor_identitas' => 'nullable|string',
        'penanggung_jawab.*.kewarganegaraan' => 'nullable|string',
    ]);

    // Create Dudi
    $dudi = Dudi::create([
        'nama_perseroan' => $request->input('nama_perseroan'),
        'nib' => $request->input('nib'),
        'tanggal_terbit' => $request->input('tanggal_terbit'),
        'tipe' => $request->input('tipe'),
        'alamat' => $request->input('alamat'),
        'province_id' => $request->input('province_id'),
        'regency_id' => $request->input('regency_id'),
        'district_id' => $request->input('district_id'),
        'village_id' => $request->input('village_id'),
        'email_mitra' => $request->input('email_mitra'),
        'no_mitra' => $request->input('no_telp_mitra'),
        'klasifikasi_baku' => json_encode($request->input('klasifikasi_baku')),
        'lingkupkerjasama' => $request->input('lingkupkerjasama'),
        'kriteria_id' => $request->input('kriteria_id'),
        'klasifikasi_id' => $request->input('klasifikasi_id'),
        'user_id' => auth()->user()->id, // Assuming you want to save the ID of the logged-in user
    ]);

    // Create Penanggung Jawab
    if ($request->has('penanggung_jawab')) {
        foreach ($request->input('penanggung_jawab') as $penanggungJawab) {
            Penanggungjawab::create([
                'dudi_id' => $dudi->id,
                'nama' => $penanggungJawab['nama'] ?? null,
                'email' => $penanggungJawab['email'] ?? null,
                'nomor_hp' => $penanggungJawab['nomor_hp'] ?? null,
                'jenis_kelamin' => $penanggungJawab['jenis_kelamin'] ?? null,
                'jenis_identitas' => $penanggungJawab['jenis_identitas'] ?? null,
                'nomor_identitas' => $penanggungJawab['nomor_identitas'] ?? null,
                'kewarganegaraan' => $penanggungJawab['kewarganegaraan'] ?? null,
            ]);
        }
    }

    return response()->json([
        'success' => true,
        'message' => 'Data Berhasil disimpan!',
        'data' => $dudi->load('provinsi', 'kabupaten', 'kriteria')
    ]);
}



public function show($id)
{
    $dudi = Dudi::findOrFail($id);
    $penanggungJawab = PenanggungJawab::where('dudi_id', $id)->get();
    $kbli = Kbli::whereIn('id', json_decode($dudi->klasifikasi_baku))->get();

    $data = [
        'nama_perseroan' => $dudi->nama_perseroan,
        'tipe' => $dudi->tipe,
        'nib' => $dudi->nib,
        'tanggal_terbit' => $dudi->tanggal_terbit,
        'alamat' => $dudi->alamat,
        'email_mitra' => $dudi->email_mitra,
        'no_mitra' => $dudi->no_mitra,
        'kriteria' => $dudi->kriteria,
        'klasifikasi' => $dudi->klasifikasi,
        'lingkupkerjasama' => $dudi->lingkupkerjasama,
        'provinsi' => $dudi->provinsi,
        'kabupaten' => $dudi->kabupaten,
        'kecamatan' => $dudi->kecamatan,
        'desa' => $dudi->desa,
        'klasifikasi_baku' => $kbli, // Asumsikan ini adalah koleksi
        'penanggung_jawabs' => $penanggungJawab
    ];

    // dd($data);

    return response()->json($data);
}


   public function edit($id)
    {
        // $dudi = Dudi::with('penanggungJawabs')->findOrFail($id); // Hapus relasi provinsi, kabupaten, kecamatan, desa, dan kriteria
        // $provinces = Province::all();
        // $kriterias = Kriteria::all();
        // $klasifikasis = Klasifikasi::all();
        // $kblis = Kbli::all();

        // return view('admin.createdudi.edit', compact('dudi', 'provinces', 'kriterias', 'klasifikasis', 'kblis'));
        // dd($id);
        $dudi = Dudi::findOrFail($id);
        $penanggungJawab = PenanggungJawab::where('dudi_id', $id)->get();
        $kbli = Kbli::whereIn('id', json_decode($dudi->klasifikasi_baku))->get();

        $data = [
            'id' => $id,
            'nama_perseroan' => $dudi->nama_perseroan,
            'tipe' => $dudi->tipe,
            'nib' => $dudi->nib,
            'tanggal_terbit' => $dudi->tanggal_terbit,
            'alamat' => $dudi->alamat,
            'email_mitra' => $dudi->email_mitra,
            'no_mitra' => $dudi->no_mitra,
            'kriteria' => $dudi->kriteria,
            'klasifikasi' => $dudi->klasifikasi,
            'lingkupkerjasama' => $dudi->lingkupkerjasama,
            'provinsi' => $dudi->provinsi,
            'kabupaten' => $dudi->kabupaten,
            'kecamatan' => $dudi->kecamatan,
            'desa' => $dudi->desa,
            'klasifikasi_baku' => $kbli, // Asumsikan ini adalah koleksi
            'penanggung_jawabs' => $penanggungJawab
        ];

        // dd($data);

        return response()->json($data);
    }


    public function update(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_perseroan' => 'required',
            'nib' => 'required',
            'tanggal_terbit' => 'required|date',
            'tipe' => 'required',
            'alamat' => 'required',
            'province_id' => 'required|exists:provinces,id',
            'regency_id' => 'required|exists:regencies,id',
            'district_id' => 'required|exists:districts,id',
            'village_id' => 'required|exists:villages,id',
            'email_mitra' => 'required|email',
            'no_telp_mitra' => 'required',
            'klasifikasi_baku' => 'required|array',
            'lingkupkerjasama' => 'required',
            'kriteria_id' => 'required|exists:kriterias,id',
            'klasifikasi_id' => 'required|exists:klasifikasis,id',
            'penanggung_jawab' => 'nullable|array',
            'penanggung_jawab.*.id' => 'nullable|integer|exists:penanggungjawabs,id',
            'penanggung_jawab.*.nama' => 'nullable|string',
            'penanggung_jawab.*.email' => 'nullable|email',
            'penanggung_jawab.*.nomor_hp' => 'nullable|string',
            'penanggung_jawab.*.jenis_kelamin' => 'nullable|string',
            'penanggung_jawab.*.jenis_identitas' => 'nullable|string',
            'penanggung_jawab.*.nomor_identitas' => 'nullable|string',
            'penanggung_jawab.*.kewarganegaraan' => 'nullable|string',
            'penanggung_jawab_delete' => 'nullable|array',
            'penanggung_jawab_delete.*' => 'nullable|integer|exists:penanggungjawabs,id',
        ]);

        // Update Dudi
        $dudi = Dudi::findOrFail($id);
        $dudi->update([
            'nama_perseroan' => $request->input('nama_perseroan'),
            'nib' => $request->input('nib'),
            'tanggal_terbit' => $request->input('tanggal_terbit'),
            'tipe' => $request->input('tipe'),
            'alamat' => $request->input('alamat'),
            'province_id' => $request->input('province_id'),
            'regency_id' => $request->input('regency_id'),
            'district_id' => $request->input('district_id'),
            'village_id' => $request->input('village_id'),
            'email_mitra' => $request->input('email_mitra'),
            'no_telp_mitra' => $request->input('no_telp_mitra'),
            'klasifikasi_baku' => json_encode($request->input('klasifikasi_baku')),
            'lingkupkerjasama' => $request->input('lingkupkerjasama'),
            'kriteria_id' => $request->input('kriteria_id'),
            'klasifikasi_id' => $request->input('klasifikasi_id'),
            'user_id' => Auth::id(),
        ]);

        // Update or delete Penanggung Jawab
        foreach ($request->input('penanggung_jawab', []) as $penanggungJawab) {
            if (isset($penanggungJawab['id'])) {
                // Update existing penanggung jawab
                $pj = Penanggungjawab::find($penanggungJawab['id']);
                if ($pj) {
                    $pj->update([
                        'nama' => $penanggungJawab['nama'] ?? $pj->nama,
                        'email' => $penanggungJawab['email'] ?? $pj->email,
                        'nomor_hp' => $penanggungJawab['nomor_hp'] ?? $pj->nomor_hp,
                        'jenis_kelamin' => $penanggungJawab['jenis_kelamin'] ?? $pj->jenis_kelamin,
                        'jenis_identitas' => $penanggungJawab['jenis_identitas'] ?? $pj->jenis_identitas,
                        'nomor_identitas' => $penanggungJawab['nomor_identitas'] ?? $pj->nomor_identitas,
                        'kewarganegaraan' => $penanggungJawab['kewarganegaraan'] ?? $pj->kewarganegaraan,
                    ]);
                }
            }
        }

        // Handle deletion of Penanggung Jawab
        if ($request->has('penanggung_jawab_delete')) {
            Penanggungjawab::whereIn('id', $request->input('penanggung_jawab_delete'))->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Di Update!',
            'data' => $dudi->load('provinsi', 'kabupaten', 'kriteria')
        ]);
    }


    public function destroy($id)
    {
        $dudi = Dudi::findOrFail($id);

        // Hapus data penanggung jawab yang terkait
        $dudi->penanggungJawabs()->delete();

        // Hapus data Dudi
        $dudi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!'
        ]);
    }

    public function getKlasifikasi($kriteriaId)
    {
        $klasifikasis = Klasifikasi::where('kriteria_id', $kriteriaId)->get();
        // dd($klasifikasis);
        return response()->json($klasifikasis);
    }
}
