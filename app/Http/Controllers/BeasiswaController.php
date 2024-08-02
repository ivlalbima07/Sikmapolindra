<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use App\Models\MahasiswaBeasiswa;
use App\Models\PenanggungJawabBeasiswa;

class BeasiswaController extends Controller
{
    public function Beasiswa()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Beasiswa/Ikatan Dinas');
        }])->get();

        return view('admin.implementation.Beasiswa.index', compact('datakerjasama'));
    }

    public function isiBeasiswa($id)
    {
        $beasiswa = Beasiswa::with('mahasiswa', 'penanggungJawab')->where('item_kerjasama_id', $id)->get();

        $itemKerjasama = ItemKerjasama::findOrFail($id);

        return view('admin.implementation.Beasiswa.isiBeasiswa',[
            'itemKerjasama' => $itemKerjasama,
            'beasiswa' => $beasiswa,
            'itemKerjasamaId' => $itemKerjasama->id
        ]);
    }

    public function show($id)
    {
        $beasiswa = Beasiswa::with(['mahasiswa', 'penanggungJawab', 'itemKerjasama'])->findOrFail($id);

        return view('admin.implementation.Beasiswa.view', compact('beasiswa'));
    }

    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'nama_keterangan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'nominal_biaya_dudi' => 'nullable|numeric',
            'nominal_biaya_dunia_kerja' => 'nullable|numeric',
            'nominal_biaya_satuan_pendidikan' => 'nullable|numeric',
            'nominal_biaya_pemerintah_daerah' =>    'nullable|numeric',
            'nominal_biaya_pemerintah_pusat' => 'nullable|numeric',
            'mahasiswa_beasiswa.*.nama' => 'required|string|max:255',
            'mahasiswa_beasiswa.*.nim' => 'required|string|max:255',
            'mahasiswa_beasiswa.*.tempat_lahir' => 'required|string|max:255',
            'mahasiswa_beasiswa.*.tanggal_lahir' => 'required|date',
            'mahasiswa_beasiswa.*.jenis_kelamin' => 'required|string|max:255',
            'penanggungjawab_mahasiswa.*.nama' => 'required|string|max:255',
            'penanggungjawab_mahasiswa.*.nidn' => 'required|string|max:255',
            'penanggungjawab_mahasiswa.*.prodi' => 'required|string|max:255',
            'item_kerjasama_id' => 'required|exists:item_kerjasama,id',
        ]);

        $beasiswaData = [
            'nama_keterangan' => $validatedData['nama_keterangan'],
            'tanggal_mulai' => $validatedData['tanggal_mulai'],
            'tanggal_selesai' => $validatedData['tanggal_selesai'],
            'nominal_biaya_dudi' => $validatedData['nominal_biaya_dudi'] ?? 0,
            'nominal_biaya_dunia_kerja' => $validatedData['nominal_biaya_dunia_kerja'] ?? 0,
            'nominal_biaya_satuan_pendidikan' => $validatedData['nominal_biaya_satuan_pendidikan'] ?? 0,
            'nominal_biaya_pemerintah_daerah' => $validatedData['nominal_biaya_pemerintah_daerah'] ?? 0,
            'nominal_biaya_pemerintah_pusat' => $validatedData['nominal_biaya_pemerintah_pusat'] ?? 0,
            'item_kerjasama_id' => $validatedData['item_kerjasama_id'],
        ];

        $beasiswa = Beasiswa::create($beasiswaData);

        if ($request->has('mahasiswa_beasiswa')) {
            foreach ($request->mahasiswa_beasiswa as $mahasiswa) {
                MahasiswaBeasiswa::create([
                    'beasiswa_id' => $beasiswa->id,
                    'nama' => $mahasiswa['nama'],
                    'nim' => $mahasiswa['nim'],
                    'tempat_lahir' => $mahasiswa['tempat_lahir'],
                    'tanggal_lahir' => $mahasiswa['tanggal_lahir'],
                    'jenis_kelamin' => $mahasiswa['jenis_kelamin'],
                ]);
            }
        }

        if ($request->has('penanggungjawab_mahasiswa')) {
            foreach ($request->penanggungjawab_mahasiswa as $penanggungJawab) {
                PenanggungJawabBeasiswa::create([
                    'beasiswa_id' => $beasiswa->id,
                    'nama' => $penanggungJawab['nama'],
                    'nidn' => $penanggungJawab['nidn'],
                    'prodi' => $penanggungJawab['prodi'],
                ]);
            }
        }

        return response()->json(['success' => 'Data beasiswa berhasil disimpan.']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
}

public function destroy($id)
    {

        try {
            // Cari data PKL Dosen berdasarkan ID
            $beasiswa = Beasiswa::findOrFail($id);
            $itemKerjasamaId = $beasiswa->item_kerjasama_id;
    
            // Hapus data PKL Dosen
            $beasiswa->delete();
    
            // Mengembalikan respon JSON untuk sukses
            return response()->json(['success' => 'Data berhasil dihapus.', 'item_kerjasama_id' => $itemKerjasamaId], 200);
        } catch (\Exception $e) {
            // Mengembalikan respon JSON untuk error
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage()], 500);
        }
    }

}