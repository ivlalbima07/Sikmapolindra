<?php
namespace App\Http\Controllers;

use App\Models\Datakerjasama;
use App\Models\ItemKerjasama;
use App\Models\Research;
use App\Models\RisetDosen;
use App\Models\RisetMahasiswa;
use App\Models\RisetPenanggungJawab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RisetTerapanController extends Controller
{
    public function RisetTerapan()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Riset Terapan');
        }])->get();

        return view('admin.implementation.RisetTerapan.index', compact('datakerjasama'));
    }

    public function isiRisetTerapan($id)
    {
        $researches = Research::withCount(['mahasiswa', 'dosen'])->get();

        return view('admin.implementation.RisetTerapan.isiRiset', compact('researches'));
    }

    public function store(Request $request)
{
    try {
        // Validasi inputan
        $validatedData = $request->validate([
            'judul_riset' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'bidang_riset' => 'required|string|max:255',
            'nama_peserta_lain' => 'nullable|string',
            'luaran' => 'nullable|array',
            'tahun_pembiayaan' => 'required|integer',
            'nominal_biaya_dunia_kerja' => 'nullable|numeric',
            'nominal_biaya_satuan_pendidikan' => 'nullable|numeric',
            'nominal_biaya_pemerintah_daerah' => 'nullable|numeric',
            'nominal_biaya_pemerintah_pusat' => 'nullable|numeric',
            'mahasiswa_riset.*.nama' => 'required|string|max:255',
            'mahasiswa_riset.*.nim' => 'required|string|max:255',
            'mahasiswa_riset.*.tempat_lahir' => 'required|string|max:255',
            'mahasiswa_riset.*.tanggal_lahir' => 'required|date',
            'mahasiswa_riset.*.jenis_kelamin' => 'required|string|max:255',
            'dosen.*.nama' => 'required|string|max:255',
            'dosen.*.nidn' => 'required|string|max:255',
            'dosen.*.tempat_lahir' => 'required|string|max:255',
            'dosen.*.tanggal_lahir' => 'required|date',
            'dosen.*.jenis_kelamin' => 'required|string|max:255',
            'penanggung_jawab.*.nama' => 'required|string|max:255',
            'penanggung_jawab.*.nidn' => 'required|string|max:255',
            'penanggung_jawab.*.prodi' => 'required|string|max:255',
        ]);

        // Konversi array luaran menjadi string JSON
        if (isset($validatedData['luaran'])) {
            $validatedData['luaran'] = json_encode($validatedData['luaran']);
        }

        // Simpan data riset
        $riset = Research::create($validatedData);

        // Simpan data mahasiswa_riset
        if (isset($request->mahasiswa_riset)) {
            foreach ($request->mahasiswa_riset as $mahasiswa) {
                RisetMahasiswa::create([
                    'research_id' => $riset->id,
                    'nama' => $mahasiswa['nama'],
                    'nim' => $mahasiswa['nim'],
                    'tempat_lahir' => $mahasiswa['tempat_lahir'],
                    'tanggal_lahir' => $mahasiswa['tanggal_lahir'],
                    'jenis_kelamin' => $mahasiswa['jenis_kelamin'],
                ]);
            }
        }

        // Simpan data dosen
        if (isset($request->dosen)) {
            foreach ($request->dosen as $dosen) {
                RisetDosen::create([
                    'research_id' => $riset->id,
                    'nama' => $dosen['nama'],
                    'nidn' => $dosen['nidn'],
                    'tempat_lahir' => $dosen['tempat_lahir'],
                    'tanggal_lahir' => $dosen['tanggal_lahir'],
                    'jenis_kelamin' => $dosen['jenis_kelamin'],
                ]);
            }
        }

        // Simpan data penanggung_jawab
        if (isset($request->penanggung_jawab)) {
            foreach ($request->penanggung_jawab as $penanggungJawab) {
                RisetPenanggungJawab::create([
                    'research_id' => $riset->id,
                    'nama' => $penanggungJawab['nama'],
                    'nidn' => $penanggungJawab['nidn'],
                    'prodi' => $penanggungJawab['prodi'],
                ]);
            }
        }

        return response()->json(['success' => 'Data riset berhasil disimpan.']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}





}