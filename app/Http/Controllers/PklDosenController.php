<?php

namespace App\Http\Controllers;

use App\Models\Pkldosen;
use App\Models\Pkldosentambah;
use App\Models\Pkldoseninstruktur;
use App\Models\Pkldosenpj;
use App\Models\ItemKerjasama;
use App\Models\Datakerjasama;
use Illuminate\Http\Request;

class   PklDosenController extends Controller
{
    public function PklDosen()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Praktek Kerja Lapangan (PKL) Dosen');
        }])->get();

        return view('admin.implementation.PKLdosen.index', compact('datakerjasama'));
    }

    public function IsiDatapkldosen($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);
        $pkldosens = PklDosen::with(['dosen', 'instruktur', 'penanggungJawab'])->where('item_kerjasama_id', $id)->get();

        return view('admin.implementation.PKLdosen.isidatatenagapendidik', compact('itemKerjasama', 'pkldosens'));
    }

    public function show($id)
    {
        $pkldosen = PklDosen::with(['dosen', 'instruktur', 'penanggungJawab', 'itemKerjasama'])->findOrFail($id);

        return view('admin.implementation.PKLdosen.view', compact('pkldosen'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'item_kerjasama_id' => 'required|exists:item_kerjasama,id',
        'nama_rombel' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'file' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
        'biaya_per_dosen' => 'nullable|numeric',
        'biaya_dari_dunia_kerja' => 'nullable|numeric',
        'biaya_dari_satuan_pendidikan' => 'nullable|numeric',
        'biaya_dari_pemerintah_daerah' => 'nullable|numeric',
        'biaya_dari_pemerintah_pusat' => 'nullable|numeric',
        'pkldosentambah.*.nama' => 'required|string|max:255',
        'pkldosentambah.*.nidn' => 'required|integer',
        'pkldosentambah.*.tempat_lahir' => 'nullable|string|max:255',
        'pkldosentambah.*.tanggal_lahir' => 'nullable|date',
        'pkldosentambah.*.jenis_kelamin' => 'required|string|in:Male,Female',
        'pkldoseninstruktur.*.no_id' => 'required|integer',
        'pkldoseninstruktur.*.nama' => 'required|string|max:255',
        'pkldoseninstruktur.*.jabatan' => 'nullable|string|max:255',
        'pkldoseninstruktur.*.no_telepon' => 'nullable|string|max:255',
        'pkldoseninstruktur.*.email' => 'nullable|email|max:255',
        'pkldosenpj.*.nama' => 'required|string|max:255',
        'pkldosenpj.*.nidn' => 'required|integer',
        'pkldosenpj.*.prodi' => 'nullable|string|max:255',
    ]);

    if ($request->hasFile('file')) {
        $fileName = time() . '.' . $request->file('file')->extension();
        $request->file('file')->move(public_path('uploads'), $fileName);
        $validated['file'] = $fileName;
    }

    $dosenPKLData = [
        'item_kerjasama_id' => $validated['item_kerjasama_id'],
        'nama_rombel' => $validated['nama_rombel'],
        'tanggal_mulai' => $validated['tanggal_mulai'],
        'tanggal_selesai' => $validated['tanggal_selesai'],
        'biaya_per_dosen' => $validated['biaya_per_dosen'] ?? null,
        'biaya_dari_dunia_kerja' => $validated['biaya_dari_dunia_kerja'] ?? null,
        'biaya_dari_satuan_pendidikan' => $validated['biaya_dari_satuan_pendidikan'] ?? null,
        'biaya_dari_pemerintah_daerah' => $validated['biaya_dari_pemerintah_daerah'] ?? null,
        'biaya_dari_pemerintah_pusat' => $validated['biaya_dari_pemerintah_pusat'] ?? null,
        'file' => $validated['file'] ?? null,
    ];

    try {
        $pkldosen = PklDosen::create($dosenPKLData);

        if ($request->has('pkldosentambah')) {
            foreach ($request->pkldosentambah as $dosen) {
                $pkldosen->dosen()->create($dosen);
            }
        }

        if ($request->has('pkldoseninstruktur')) {
            foreach ($request->pkldoseninstruktur as $instruktur) {
                $pkldosen->instruktur()->create($instruktur);
            }
        }

        if ($request->has('pkldosenpj')) {
            foreach ($request->pkldosenpj as $penanggungJawab) {
                $pkldosen->penanggungJawab()->create($penanggungJawab);
            }
        }

        return response()->json(['success' => true, 'message' => 'Data berhasil disimpan.']);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
    }
}



public function destroy($id)
{
    try {
        // Cari data PKL Dosen berdasarkan ID
        $pkldosen = PklDosen::findOrFail($id);
        $itemKerjasamaId = $pkldosen->item_kerjasama_id;

        // Hapus data PKL Dosen
        $pkldosen->delete();

        // Mengembalikan respon JSON untuk sukses
        return response()->json(['success' => 'Data berhasil dihapus.', 'item_kerjasama_id' => $itemKerjasamaId], 200);
    } catch (\Exception $e) {
        // Mengembalikan respon JSON untuk error
        return response()->json(['error' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage()], 500);
    }
}


}