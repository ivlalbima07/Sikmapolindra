<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Province;
use App\Models\Kriteria;
use App\Models\Klasifikasi;
use App\Models\Kbli;
use App\Models\Dudi;
use App\Models\Penanggungjawab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TambahdudiController extends Controller
{
    public function index()
    {
        $data['provinces'] = Province::all();
        $data['kriterias'] = Kriteria::all();
        $data['klasifikasis'] = Klasifikasi::all();
        $data['kblis'] = Kbli::all();
        $data['dudis'] = Dudi::with(['provinsi', 'kabupaten', 'kecamatan', 'desa', 'kriteria'])->get();

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
            'nama_perseroan'  => 'required',
            'nib'             => 'required',
            'tanggal_terbit'  => 'required|date',
            'tipe'            => 'required',
            'alamat'          => 'required',
            'provinsi'        => 'required|exists:provinces,id',
            'kabupaten'       => 'required|exists:regencies,id',
            'kecamatan'       => 'required|exists:districts,id',
            'desa'            => 'required|exists:villages,id',
            'email_mitra'     => 'required|email',
            'no_mitra'        => 'required',
            'klasifikasi_baku'=> 'required|array',
            'lingkupkerjasama'=> 'required',
            'kriteria'        => 'required|exists:kriterias,id',
            'klasifikasi'     => 'required|exists:klasifikasis,id',
            'pj'              => 'required|array',
            'pj.*.pj_nama'            => 'required|string',
            'pj.*.pj_email'           => 'required|email',
            'pj.*.pj_nomor_hp'        => 'required|string',
            'pj.*.pj_jenis_kelamin'   => 'required|string',
            'pj.*.pj_jenis_identitas' => 'required|string',
            'pj.*.pj_nomor_identitas' => 'required|string',
            'pj.*.pj_kewarganegaraan' => 'required|string',
        ]);
        // dd( $validatedData);
        // Create Dudi
        $dudi = Dudi::create([
            'nama_perseroan'     => $request->input('nama_perseroan'),
            'nib'                => $request->input('nib'),
            'tanggal_terbit'     => $request->input('tanggal_terbit'),
            'tipe'               => $request->input('tipe'),
            'alamat'             => $request->input('alamat'),
            'province_id'        => $request->input('provinsi'),
            'regency_id'         => $request->input('kabupaten'),
            'district_id'        => $request->input('kecamatan'),
            'village_id'         => $request->input('desa'),
            'email_mitra'        => $request->input('email_mitra'),
            'no_mitra'           => $request->input('no_mitra'),
            'klasifikasi_baku'   => json_encode($request->input('klasifikasi_baku')),
            'lingkupkerjasama'   => $request->input('lingkupkerjasama'),
            'kriteria_id'        => $request->input('kriteria'),
            'klasifikasi_id'     => $request->input('klasifikasi'),
        ]);

        // Create Penanggung Jawab
        if ($request->has('pj')) {
            foreach ($request->input('pj') as $penanggungJawab) {
                Penanggungjawab::create([
                    'dudi_id'         => $dudi->id,
                    'nama'            => $penanggungJawab['pj_nama'],
                    'email'           => $penanggungJawab['pj_email'],
                    'nomor_hp'        => $penanggungJawab['pj_nomor_hp'],
                    'jenis_kelamin'   => $penanggungJawab['pj_jenis_kelamin'],
                    'jenis_identitas' => $penanggungJawab['pj_jenis_identitas'],
                    'nomor_identitas' => $penanggungJawab['pj_nomor_identitas'],
                    'kewarganegaraan' => $penanggungJawab['pj_kewarganegaraan'],
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
    $dudi = Dudi::with('penanggungJawabs', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'kriteria')->findOrFail($id);
    $dudi->klasifikasi_baku = json_decode($dudi->klasifikasi_baku);
    return response()->json($dudi);
}


    public function edit($id)
    {
        $dudi = Dudi::with('penanggungJawabs', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'kriteria')->findOrFail($id);
        $provinces = Province::all();
        $kriterias = Kriteria::all();
        $klasifikasis = Klasifikasi::all();
        $kblis = Kbli::all();

        return view('admin.createdudi.edit', compact('dudi', 'provinces', 'kriterias', 'klasifikasis', 'kblis'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama_perseroan'  => 'required',
            'nib'             => 'required',
            'tanggal_terbit'  => 'required|date',
            'tipe'            => 'required',
            'alamat'          => 'required',
            'provinsi'        => 'required|exists:provinces,id',
            'kabupaten'       => 'required|exists:regencies,id',
            'kecamatan'       => 'required|exists:districts,id',
            'desa'            => 'required|exists:villages,id',
            'email_mitra'     => 'required|email',
            'no_mitra'        => 'required',
            'klasifikasi_baku'=> 'required|array',
            'lingkupkerjasama'=> 'required',
            'kriteria'        => 'required|exists:kriterias,id',
            'klasifikasi'     => 'required|exists:klasifikasis,id',
            'pj'              => 'required|array',
            'pj.*.pj_nama'            => 'required|string',
            'pj.*.pj_email'           => 'required|email',
            'pj.*.pj_nomor_hp'        => 'required|string',
            'pj.*.pj_jenis_kelamin'   => 'required|string',
            'pj.*.pj_jenis_identitas' => 'required|string',
            'pj.*.pj_nomor_identitas' => 'required|string',
            'pj.*.pj_kewarganegaraan' => 'required|string',
        ]);

        // Update Dudi
        $dudi = Dudi::findOrFail($id);
        $dudi->update([
            'nama_perseroan'     => $request->input('nama_perseroan'),
            'nib'                => $request->input('nib'),
            'tanggal_terbit'     => $request->input('tanggal_terbit'),
            'tipe'               => $request->input('tipe'),
            'alamat'             => $request->input('alamat'),
            'province_id'        => $request->input('provinsi'),
            'regency_id'         => $request->input('kabupaten'),
            'district_id'        => $request->input('kecamatan'),
            'village_id'         => $request->input('desa'),
            'email_mitra'        => $request->input('email_mitra'),
            'no_mitra'           => $request->input('no_mitra'),
            'klasifikasi_baku'   => json_encode($request->input('klasifikasi_baku')),
            'lingkupkerjasama'   => $request->input('lingkupkerjasama'),
            'kriteria_id'        => $request->input('kriteria'),
            'klasifikasi_id'     => $request->input('klasifikasi'),
        ]);

        // Update Penanggung Jawab
        $dudi->penanggungJawabs()->delete();
        if ($request->has('pj')) {
            foreach ($request->input('pj') as $penanggungJawab) {
                Penanggungjawab::create([
                    'dudi_id'         => $dudi->id,
                    'nama'            => $penanggungJawab['pj_nama'],
                    'email'           => $penanggungJawab['pj_email'],
                    'nomor_hp'        => $penanggungJawab['pj_nomor_hp'],
                    'jenis_kelamin'   => $penanggungJawab['pj_jenis_kelamin'],
                    'jenis_identitas' => $penanggungJawab['pj_jenis_identitas'],
                    'nomor_identitas' => $penanggungJawab['pj_nomor_identitas'],
                    'kewarganegaraan' => $penanggungJawab['pj_kewarganegaraan'],
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil diupdate!',
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
        return response()->json($klasifikasis);
    }
}