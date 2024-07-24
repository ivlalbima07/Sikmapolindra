<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Certificationmhs;
use App\Models\Certificationdosen;
use App\Models\Certificationpj;
use App\Models\ItemKerjasama;
use App\Models\Datakerjasama;
use Illuminate\Http\Request;

class SertifikasiController extends Controller
{
    public function Sertifikasi()
    {
        $datakerjasama = Datakerjasama::with(['dudi', 'itemKerjasama' => function ($query) {
            $query->where('jenis_kerjasama', 'Sertifikasi Kompetensi');
        }])->get();

        return view('admin.implementation.sertifikasi.index', compact('datakerjasama'));
    }

    public function IsiSertifikasi($id)
    {
        $itemKerjasama = ItemKerjasama::findOrFail($id);
        $certifications = Certification::with(['mahasiswa', 'dosen', 'penanggungJawab'])->where('item_kerjasama_id', $id)->get();

        return view('admin.implementation.sertifikasi.isisertifikasi', compact('itemKerjasama', 'certifications'));
    }

    public function show($id)
    {
        $certification = Certification::with(['mahasiswa', 'dosen', 'penanggungJawab', 'itemKerjasama'])->findOrFail($id);

        return view('admin.implementation.sertifikasi.view', compact('certification'));
    }

public function store(Request $request)
{

    // Validasi input
    $validated = $request->validate([
        'item_kerjasama_id' => 'required|exists:item_kerjasama,id',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'penyelenggara' => 'required|string|max:255',
        'masa_berlaku' => 'required|string|max:255',
        'tanggal_mulai_berlaku' => 'required|date',
        'biaya_sertifikasi_peserta' => 'nullable|numeric',
        'nominal_biaya_dunia_kerja' => 'nullable|numeric',
        'nominal_biaya_satuan_pendidikan' => 'nullable|numeric',
        'nominal_biaya_pemerintah_daerah' => 'nullable|numeric',
        'nominal_biaya_pemerintah_pusat' => 'nullable|numeric',
        'kompetensi' => 'required|string',
        'lampiran_bukti' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
        'certificationmhs.*.nama' => 'required|string|max:255',
        'certificationmhs.*.nim' => 'required|string|max:255',
        'certificationmhs.*.tempat_lahir' => 'nullable|string|max:255',
        'certificationmhs.*.tanggal_lahir' => 'nullable|date',
        'certificationmhs.*.jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
        'certificationdosens.*.nama' => 'required|string|max:255',
        'certificationdosens.*.nidn' => 'required|string|max:255',
        'certificationdosens.*.tempat_lahir' => 'nullable|string|max:255',
        'certificationdosens.*.tanggal_lahir' => 'nullable|date',
        'certificationdosens.*.jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
        'certificationpjs.*.nama' => 'required|string|max:255',
        'certificationpjs.*.nidn' => 'required|string|max:255',
        'certificationpjs.*.prodi' => 'nullable|string|max:255',
    ]);
    dd($request->all());


        // Menangani upload file
        if ($request->hasFile('lampiran_bukti')) {
            $fileName = time() . '.' . $request->file('lampiran_bukti')->extension();
            $request->file('lampiran_bukti')->move(public_path('uploads'), $fileName);
            $validated['lampiran_bukti'] = $fileName;
        }

        // Membuat certification
        $certification = Certification::create($validated);

        // Menyimpan data mahasiswa
        foreach ($request->certificationmhs as $mahasiswa) {
            $certification->mahasiswa()->create($mahasiswa);
        }

        // Menyimpan data dosen
        foreach ($request->certificationdosens as $dosen) {
            $certification->dosen()->create($dosen);
        }

        // Menyimpan data penanggung jawab
        foreach ($request->certificationpjs as $penanggungJawab) {
            $certification->penanggungJawab()->create($penanggungJawab);
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
}

    public function destroy($id)
    {
        $certification = Certification::findOrFail($id);
        $itemKerjasamaId = $certification->item_kerjasama_id;
        $certification->delete();

        return redirect()->route('IsiSertifikasi', ['id' => $itemKerjasamaId])->with('success', 'Data berhasil dihapus.');
    }
}