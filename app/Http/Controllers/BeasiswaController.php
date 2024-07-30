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
        $beasiswa = Beasiswa::with('mahasiswa', 'penanggungJawab')->get();

        return view('admin.implementation.Beasiswa.isiBeasiswa', compact('beasiswa'));
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

}