<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\PklMhs;
use App\Models\Mahasiswa;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use Illuminate\Support\Facades\Log;
use App\Models\DosenPenanggungJawab;

class PklMhsController extends Controller
{
    public function Pkl_mahasiswa()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Praktek Kerja Lapangan (PKL) Mahasiswa');
        }])->get();

        // dd($datakerjasama);
        return view('admin.implementation.Pkl_Mahasiswa.index', compact('datakerjasama'));


    }

public function isipelaksanaan($id)
{
    $itemKerjasama = ItemKerjasama::with('pklMhs')->findOrFail($id);
    $data = $itemKerjasama->pklMhs()->withCount(['mahasiswa', 'dosen', 'instruktur', 'dosenPenanggungJawab'])->where('item_kerjasama_id', $id)->get();

    return view('admin.implementation.Pkl_Mahasiswa.isipelaksanaan', [
        'itemKerjasama' => $itemKerjasama,
        'data' => $data,
        'itemKerjasamaId' => $itemKerjasama->id
    ]);
}

public function show($id)
{
    $pklMhs = PklMhs::with([
        'mahasiswa',
        'dosen',
        'itemKerjasama',
        'instruktur',
        'dosenPenanggungJawab'
    ])->findOrFail($id);

    return view('admin.implementation.Pkl_Mahasiswa.view', compact('pklMhs'));
}



public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'nama_rombongan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'foto_dokumen' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
            'biaya_per_mahasiswa' => 'required|numeric',
            'biaya_dunia_kerja' => 'nullable|numeric',
            'biaya_satuan_pendidikan' => 'nullable|numeric',
            'biaya_pemerintah_daerah' => 'nullable|numeric',
            'biaya_pemerintah_pusat' => 'nullable|numeric',
            'biaya_cost_sharing' => 'nullable|numeric',
            'mahasiswa.*.nama' => 'required|string|max:255',
            'mahasiswa.*.nim' => 'required|string|max:255',
            'mahasiswa.*.tempat_lahir' => 'required|string|max:255',
            'mahasiswa.*.tanggal_lahir' => 'required|date',
            'mahasiswa.*.gender' => 'required|in:Laki-Laki,Perempuan',
            'dosen.*.nama' => 'required|string|max:255',
            'dosen.*.nidn' => 'required|string|max:255',
            'dosen.*.tempat_lahir' => 'required|string|max:255',
            'dosen.*.tanggal_lahir' => 'required|date',
            'dosen.*.gender' => 'required|in:Laki-Laki,Perempuan',
            'instruktur.*.nama' => 'required|string|max:255',
            'instruktur.*.no_id' => 'required|string|max:255',
            'instruktur.*.jabatan' => 'required|string|max:255',
            'instruktur.*.no_telepon' => 'required|string|max:255',
            'instruktur.*.email' => 'required|email|max:255',
            'dosen_penanggung_jawab.*.nama' => 'required|string|max:255',
            'dosen_penanggung_jawab.*.nidn' => 'required|string|max:255',
            'dosen_penanggung_jawab.*.prodi' => 'required|string|max:255',
            'item_kerjasama_id' => 'required|exists:item_kerjasama,id'
        ]);

        Log::info('Data validated successfully', ['validated' => $validated]);

        if ($request->hasFile('foto_dokumen')) {
            $fileName = time().'.'.$request->foto_dokumen->extension();
            $request->foto_dokumen->move(public_path('uploads'), $fileName);
            $validated['foto_dokumen'] = $fileName;
            Log::info('Foto dokumen uploaded successfully', ['fileName' => $fileName]);
        }

        Log::info('Before creating PKL MHS');
        $pklMhs = PklMhs::create($validated);
        Log::info('PKL MHS created successfully', ['pklMhs' => $pklMhs]);

        if ($request->has('mahasiswa')) {
            foreach ($request->mahasiswa as $mahasiswa) {
                $pklMhs->mahasiswa()->create($mahasiswa);
                Log::info('Mahasiswa created successfully', ['mahasiswa' => $mahasiswa]);
            }
        }

        if ($request->has('dosen')) {
            foreach ($request->dosen as $dosen) {
                $pklMhs->dosen()->create($dosen);
                Log::info('Dosen created successfully', ['dosen' => $dosen]);
            }
        }

        if ($request->has('instruktur')) {
            foreach ($request->instruktur as $instruktur) {
                $pklMhs->instruktur()->create($instruktur);
                Log::info('Instruktur created successfully', ['instruktur' => $instruktur]);
            }
        }

        if ($request->has('dosen_penanggung_jawab')) {
            foreach ($request->dosen_penanggung_jawab as $dosenPenanggungJawab) {
                $pklMhs->dosenPenanggungJawab()->create($dosenPenanggungJawab);
                Log::info('Dosen Penanggung Jawab created successfully', ['dosenPenanggungJawab' => $dosenPenanggungJawab]);
            }
        }

        Log::info('All related data created successfully');
        return response()->json(['success' => true, 'message' => 'Data berhasil disimpan!']);
    } catch (\Exception $e) {
        Log::error('Error occurred while saving data: ' . $e->getMessage(), ['exception' => $e]);
        return response()->json(['success' => false, 'message' => 'An error occurred while saving data: ' . $e->getMessage()]);
    }
}





}
