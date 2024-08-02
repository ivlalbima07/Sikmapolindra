<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use App\Models\SaranaPrasarana;
use App\Models\PenanggungJawabSaranaPrasarana;

class SaranaController extends Controller
{
    public function Sarana()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Sarana');
        }])->get();

        return view('admin.implementation.Sarana.index', compact('datakerjasama'));
    }

    public function isiSarana($id)
    {
        $SaranaPrasarana = SaranaPrasarana::with('penanggungJawab')->where('item_kerjasama_id', $id)->get();

        $itemKerjasama = ItemKerjasama::with('pklMhs')->findOrFail($id);

        return view('admin.implementation.Sarana.isiSarana',[
            'itemKerjasama' => $itemKerjasama,
            'SaranaPrasarana' => $SaranaPrasarana,
            'itemKerjasamaId' => $itemKerjasama->id
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_alat' => 'required|string|max:255',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'jenis' => 'required|string|max:255',
                'spesifikasi' => 'required|string',
                'jumlah' => 'required|integer',
                'nominal_biaya_dudi' => 'required|integer',
                'nominal_biaya_dunia_kerja' => 'required|integer',
                'nominal_biaya_satuan_pendidikan' => 'required|integer',
                'nominal_biaya_pemerintah_daerah' => 'required|integer',
                'nominal_biaya_pemerintah_pusat' => 'required|integer',
                'penanggung_jawab_sarana_prasarana.*.nama' => 'required|string|max:255',
                'penanggung_jawab_sarana_prasarana.*.nidn' => 'required|string|max:255',
                'penanggung_jawab_sarana_prasarana.*.prodi' => 'required|string|max:255',
                'item_kerjasama_id' => 'required|exists:item_kerjasama,id',
            ]);

            $saranaPrasaranaData = [
                'nama_alat' => $validatedData['nama_alat'],
                'tanggal_mulai' => $validatedData['tanggal_mulai'],
                'tanggal_selesai' => $validatedData['tanggal_selesai'],
                'jenis' => $validatedData['jenis'],
                'spesifikasi' => $validatedData['spesifikasi'],
                'jumlah' => $validatedData['jumlah'],
                'nominal_biaya_dudi' => $validatedData['nominal_biaya_dudi'],
                'nominal_biaya_dunia_kerja' => $validatedData['nominal_biaya_dunia_kerja'],
                'nominal_biaya_satuan_pendidikan' => $validatedData['nominal_biaya_satuan_pendidikan'],
                'nominal_biaya_pemerintah_daerah' => $validatedData['nominal_biaya_pemerintah_daerah'],
                'nominal_biaya_pemerintah_pusat' => $validatedData['nominal_biaya_pemerintah_pusat'],
                'item_kerjasama_id' => $validatedData['item_kerjasama_id'],
            ];

            $saranaPrasarana = SaranaPrasarana::create($saranaPrasaranaData);

            if ($request->has('penanggung_jawab_sarana_prasarana')) {
                foreach ($request->penanggung_jawab_sarana_prasarana as $penanggungJawab) {
                    PenanggungJawabSaranaPrasarana::create([
                        'sarana_prasarana_id' => $saranaPrasarana->id,
                        'nama' => $penanggungJawab['nama'],
                        'nidn' => $penanggungJawab['nidn'],
                        'prodi' => $penanggungJawab['prodi'],
                    ]);
                }
            }

            return response()->json(['success' => 'Data sarana dan prasarana berhasil disimpan.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}