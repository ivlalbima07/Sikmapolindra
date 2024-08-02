<?php



namespace App\Http\Controllers;

use App\Models\DosenTamu;
use App\Models\Datakerjasama;
use App\Models\DosenPenanggungJawabBaru;
use App\Models\MataKuliah;
use App\Models\ItemKerjasama;
use Illuminate\Http\Request;

class DosenTamuController extends Controller
{
    public function DosenTamu()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Dosen/Tenaga Ahli dari Dunia Kerja (Dosen Tamu)');
        }])->get();

        return view('admin.implementation.dosentamu.index', compact('datakerjasama'));
    }

    public function IsiData($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);
        $dosenTamus = DosenTamu::with(['mataKuliah', 'dosenPenanggungJawab'])->where('item_kerjasama_id', $id)->get();

        return view('admin.implementation.dosentamu.isidata', [
            'itemKerjasama' => $itemKerjasama,
            'dosenTamus' => $dosenTamus,
            'itemKerjasamaId' => $itemKerjasama->id
        ]);
    }

    public function show($id)
    {
        $dosenTamu = DosenTamu::with(['mataKuliah', 'dosenPenanggungJawab', 'itemKerjasama'])->findOrFail($id);

        // dd($dosenTamu);
        return view('admin.implementation.dosentamu.view', compact('dosenTamu'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'item_kerjasama_id' => 'nullable|exists:item_kerjasama,id',
        'nama' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'nominal_biaya_dunia_kerja' => 'nullable|numeric',
        'nominal_biaya_satuan_pendidikan' => 'nullable|numeric',
        'nominal_biaya_pemerintah_daerah' => 'nullable|numeric',
        'nominal_biaya_pemerintah_pusat' => 'nullable|numeric',
        'nominal_biaya_dudi' => 'nullable|numeric',
        'mata_kuliah.*.nama' => 'required|string|max:255',
        'mata_kuliah.*.foto_dokumen' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
        'mata_kuliah.*.jumlah_jpl' => 'required|integer',
        'mata_kuliah.*.honorarium_per_jam' => 'required|numeric',
        'dosen_penanggung_jawab.*.nama' => 'required|string|max:255',
        'dosen_penanggung_jawab.*.nidn' => 'required|string|max:255',
        'dosen_penanggung_jawab.*.prodi' => 'required|string|max:255',
    ]);

    $dosenTamuData = [
        'item_kerjasama_id' => $validated['item_kerjasama_id'] ?? null,
        'nama' => $validated['nama'],
        'tanggal_mulai' => $validated['tanggal_mulai'],
        'tanggal_selesai' => $validated['tanggal_selesai'],
        'nominal_biaya_dunia_kerja' => $validated['nominal_biaya_dunia_kerja'] ?? null,
        'nominal_biaya_satuan_pendidikan' => $validated['nominal_biaya_satuan_pendidikan'] ?? null,
        'nominal_biaya_pemerintah_daerah' => $validated['nominal_biaya_pemerintah_daerah'] ?? null,
        'nominal_biaya_pemerintah_pusat' => $validated['nominal_biaya_pemerintah_pusat'] ?? null,
        'nominal_biaya_dudi' => $validated['nominal_biaya_dudi'] ?? null,
    ];

    $dosenTamu = DosenTamu::create($dosenTamuData);

    foreach ($request->mata_kuliah as $mataKuliah) {
        if (isset($mataKuliah['foto_dokumen'])) {
            $fileName = time() . '.' . $mataKuliah['foto_dokumen']->extension();
            $mataKuliah['foto_dokumen']->move(public_path('uploads'), $fileName);
            $mataKuliah['foto_dokumen'] = $fileName;
        }
        $dosenTamu->mataKuliah()->create($mataKuliah);
    }

    foreach ($request->dosen_penanggung_jawab as $dosenPJ) {
        $dosenTamu->dosenPenanggungJawab()->create($dosenPJ);
    }

    return response()->json(['success' => 'Data Berhasil disimpan!']);
}


public function edit($id)
{
    $dosenTamu = DosenTamu::with(['mataKuliah', 'dosenPenanggungJawab'])->findOrFail($id);
    return response()->json([
        'dosenTamu' => $dosenTamu,
    ]);
}



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'item_kerjasama_id' => 'nullable|exists:item_kerjasama,id',
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'nominal_biaya_dunia_kerja' => 'nullable|numeric',
            'nominal_biaya_satuan_pendidikan' => 'nullable|numeric',
            'nominal_biaya_pemerintah_daerah' => 'nullable|numeric',
            'nominal_biaya_pemerintah_pusat' => 'nullable|numeric',
            'nominal_biaya_dudi' => 'nullable|numeric',
            'mata_kuliah.*.nama' => 'required|string|max:255',
            'mata_kuliah.*.foto_dokumen' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
            'mata_kuliah.*.jumlah_jpl' => 'required|integer',
            'mata_kuliah.*.honorarium_per_jam' => 'required|numeric',
            'dosen_penanggung_jawab.*.nama' => 'required|string|max:255',
            'dosen_penanggung_jawab.*.nidn' => 'required|string|max:255',
            'dosen_penanggung_jawab.*.prodi' => 'required|string|max:255',
        ]);

        $dosenTamu = DosenTamu::findOrFail($id);
        $dosenTamu->update($validated);

        $dosenTamu->mataKuliah()->delete();
        foreach ($request->mata_kuliah as $mataKuliah) {
            if (isset($mataKuliah['foto_dokumen'])) {
                $fileName = time() . '.' . $mataKuliah['foto_dokumen']->extension();
                $mataKuliah['foto_dokumen']->move(public_path('uploads'), $fileName);
                $mataKuliah['foto_dokumen'] = $fileName;
            }
            $dosenTamu->mataKuliah()->create($mataKuliah);
        }

        $dosenTamu->dosenPenanggungJawab()->delete();
        foreach ($request->dosen_penanggung_jawab as $dosenPJ) {
            $dosenTamu->dosenPenanggungJawab()->create($dosenPJ);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil disimpan!'
        ]);
    }

    public function destroy($id)
    {
        $dosenTamu = DosenTamu::findOrFail($id);
        $itemKerjasamaId = $dosenTamu->item_kerjasama_id;
        $dosenTamu->delete();

        return redirect()->route('dosentamu.isidata', ['id' => $itemKerjasamaId])->with('success', 'Data berhasil dihapus.');
    }


}