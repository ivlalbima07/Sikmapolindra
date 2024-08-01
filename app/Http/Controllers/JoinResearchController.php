<?php

namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use App\Models\DosenJoinReset;
use App\Models\ItemKerjasama;
use App\Models\JoinReset;
use App\Models\MahasiswaJoinReset;
use App\Models\PenanggungJawabJoinReset;
use Illuminate\Http\Request;

class JoinResearchController extends Controller
{
    public function JoinResearch()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Joint Research');
        }])->get();

        return view('admin.implementation.JoinResearch.index', compact('datakerjasama'));
    }

    public function isiJoinResearch($id)
    {
        $joinResets = JoinReset::withCount(['mahasiswa', 'dosen', 'penanggungJawab'])->get();

        // Calculate durations and participants counts
        $itemKerjasama = ItemKerjasama::with('pklMhs')->findOrFail($id);

        return view('admin.implementation.JoinResearch.isiJoinResearch',[
            'itemKerjasama' => $itemKerjasama,
            'joinResets' => $joinResets,
            'itemKerjasamaId' => $itemKerjasama->id
        ]);
    }

    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'nama_joint_research' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'bidang_riset' => 'required|string|max:255',
            'produk_riset' => 'nullable|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx',
            'sumber_biaya' => 'required|string|max:255',
            'nominal_biaya_luar_negeri' => 'nullable|numeric',
            'nominal_biaya_apbn' => 'nullable|numeric',
            'mahasiswa.*.nama' => 'required|string|max:255',
            'mahasiswa.*.nim' => 'required|string|max:255',
            'mahasiswa.*.tempat_lahir' => 'required|string|max:255',
            'mahasiswa.*.tanggal_lahir' => 'required|date',
            'mahasiswa.*.jenis_kelamin' => 'required|string|max:255',
            'dosen.*.nama' => 'required|string|max:255',
            'dosen.*.nidn' => 'required|string|max:255',
            'dosen.*.tempat_lahir' => 'required|string|max:255',
            'dosen.*.tanggal_lahir' => 'required|date',
            'dosen.*.jenis_kelamin' => 'required|string|max:255',
            'penanggung_jawab.*.nama' => 'required|string|max:255',
            'penanggung_jawab.*.nidn' => 'required|string|max:255',
            'penanggung_jawab.*.prodi' => 'required|string|max:255',
            'item_kerjasama_id' => 'required|exists:item_kerjasama,id',
        ]);

        // Initialize the data array
        $joinresetData = [
            'nama_joint_research' => $validatedData['nama_joint_research'],
            'tanggal_mulai' => $validatedData['tanggal_mulai'],
            'tanggal_selesai' => $validatedData['tanggal_selesai'],
            'bidang_riset' => $validatedData['bidang_riset'],
            'produk_riset' => $validatedData['produk_riset'],
            'sumber_biaya' => $validatedData['sumber_biaya'],
            'item_kerjasama_id' => $validatedData['item_kerjasama_id'],
        ];

        // Handle file upload
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $path = $file->store('dokumen', 'public');
            $joinresetData['dokumen'] = $path;
        }

        // Handle conditional nominal biaya fields
        switch ($validatedData['sumber_biaya']) {
            case 'Luar Negeri':
                $joinresetData['nominal_biaya_luar_negeri'] = $validatedData['nominal_biaya_luar_negeri'];
                $joinresetData['nominal_biaya_apbn'] = null;
                break;

            case 'APBN':
                $joinresetData['nominal_biaya_luar_negeri'] = null;
                $joinresetData['nominal_biaya_apbn'] = $validatedData['nominal_biaya_apbn'];
                break;

            default:
                throw new \Exception("Invalid sumber biaya");
        }

        // Create joinreset
        $joinreset = JoinReset::create($joinresetData);

        // Handle mahasiswa
        if ($request->has('mahasiswa')) {
            foreach ($request->mahasiswa as $mahasiswa) {
                MahasiswaJoinReset::create([
                    'join_reset_id' => $joinreset->id,
                    'nama' => $mahasiswa['nama'],
                    'nim' => $mahasiswa['nim'],
                    'tempat_lahir' => $mahasiswa['tempat_lahir'],
                    'tanggal_lahir' => $mahasiswa['tanggal_lahir'],
                    'jenis_kelamin' => $mahasiswa['jenis_kelamin'],
                ]);
            }
        }

        // Handle dosen
        if ($request->has('dosen')) {
            foreach ($request->dosen as $dosen) {
                DosenJoinReset::create([
                    'join_reset_id' => $joinreset->id,
                    'nama' => $dosen['nama'],
                    'nidn' => $dosen['nidn'],
                    'tempat_lahir' => $dosen['tempat_lahir'],
                    'tanggal_lahir' => $dosen['tanggal_lahir'],
                    'jenis_kelamin' => $dosen['jenis_kelamin'],
                ]);
            }
        }

        // Handle penanggung jawab
        if ($request->has('penanggung_jawab')) {
            foreach ($request->penanggung_jawab as $penanggungJawab) {
                PenanggungJawabJoinReset::create([
                    'join_reset_id' => $joinreset->id,
                    'nama' => $penanggungJawab['nama'],
                    'nidn' => $penanggungJawab['nidn'],
                    'prodi' => $penanggungJawab['prodi'],
                ]);
            }
        }

        return response()->json(['success' => 'Data joint research berhasil disimpan.']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
}

}