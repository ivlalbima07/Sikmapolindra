<?php

namespace App\Http\Controllers;

use App\Models\Penyerapan;
use Illuminate\Http\Request;
use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use App\Models\PenyerapanDosen;
use App\Models\PenyerapanMahasiswa;
use App\Models\PenyerapanPenanggungJawab;

class LulusanController extends Controller
{
    public function PenyerapanLulusan()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Penyerapan Lulusan');
        }])->get();

        return view('admin.implementation.PenyerapanLulusan.index', compact('datakerjasama'));
    }

    public function isiPenyerapan($id)
    {
        $penyerapan = Penyerapan::with('mahasiswa', 'dosen', 'penanggungJawab')->get();


        return view('admin.implementation.PenyerapanLulusan.isiPenyerapan', compact('penyerapan'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'status_serapan' => 'required|string|max:255',
                'gaji' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'tanggal_mulai_kerja' => 'required|date',
                'penyerapan_mahasiswa.*.nama' => 'required|string|max:255',
                'penyerapan_mahasiswa.*.nim' => 'required|string|max:255',
                'penyerapan_mahasiswa.*.tempat_lahir' => 'required|string|max:255',
                'penyerapan_mahasiswa.*.tanggal_lahir' => 'required|date',
                'penyerapan_mahasiswa.*.jenis_kelamin' => 'required|string|max:255',
                'penyerapan_dosen.*.nama' => 'required|string|max:255',
                'penyerapan_dosen.*.nidn' => 'required|string|max:255',
                'penyerapan_dosen.*.tempat_lahir' => 'required|string|max:255',
                'penyerapan_dosen.*.tanggal_lahir' => 'required|date',
                'penyerapan_dosen.*.jenis_kelamin' => 'required|string|max:255',
                'penyerapan_penanggung_jawab.*.nama' => 'required|string|max:255',
                'penyerapan_penanggung_jawab.*.nidn' => 'required|string|max:255',
                'penyerapan_penanggung_jawab.*.prodi' => 'required|string|max:255',
            ]);

            $penyerapanData = [
                'tanggal_mulai' => $validatedData['tanggal_mulai'],
                'tanggal_selesai' => $validatedData['tanggal_selesai'],
                'status_serapan' => $validatedData['status_serapan'],
                'gaji' => $validatedData['gaji'],
                'jabatan' => $validatedData['jabatan'],
                'tanggal_mulai_kerja' => $validatedData['tanggal_mulai_kerja'],
            ];

            $penyerapan = Penyerapan::create($penyerapanData);

            if ($request->has('penyerapan_mahasiswa')) {
                foreach ($request->penyerapan_mahasiswa as $mahasiswa) {
                    PenyerapanMahasiswa::create([
                        'penyerapan_id' => $penyerapan->id,
                        'nama' => $mahasiswa['nama'],
                        'nim' => $mahasiswa['nim'],
                        'tempat_lahir' => $mahasiswa['tempat_lahir'],
                        'tanggal_lahir' => $mahasiswa['tanggal_lahir'],
                        'jenis_kelamin' => $mahasiswa['jenis_kelamin'],
                    ]);
                }
            }

            if ($request->has('penyerapan_dosen')) {
                foreach ($request->penyerapan_dosen as $dosen) {
                    PenyerapanDosen::create([
                        'penyerapan_id' => $penyerapan->id,
                        'nama' => $dosen['nama'],
                        'nidn' => $dosen['nidn'],
                        'tempat_lahir' => $dosen['tempat_lahir'],
                        'tanggal_lahir' => $dosen['tanggal_lahir'],
                        'jenis_kelamin' => $dosen['jenis_kelamin'],
                    ]);
                }
            }

            if ($request->has('penyerapan_penanggung_jawab')) {
                foreach ($request->penyerapan_penanggung_jawab as $penanggungJawab) {
                    PenyerapanPenanggungJawab::create([
                        'penyerapan_id' => $penyerapan->id,
                        'nama' => $penanggungJawab['nama'],
                        'nidn' => $penanggungJawab['nidn'],
                        'prodi' => $penanggungJawab['prodi'],
                    ]);
                }
            }

            return response()->json(['success' => 'Data penyerapan berhasil disimpan.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}