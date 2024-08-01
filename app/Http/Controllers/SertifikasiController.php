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

        return view('admin.implementation.sertifikasi.isisertifikasi',[
            'itemKerjasama' => $itemKerjasama,
            'certifications' => $certifications,
            'itemKerjasamaId' => $itemKerjasama->id
        ]);
    }

    public function show($id)
    {
        $certification = Certification::with(['mahasiswa', 'dosen', 'penanggungJawab', 'itemKerjasama'])->findOrFail($id);

        return view('admin.implementation.sertifikasi.view', compact('certification'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
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
    
            // Menangani upload file
            if ($request->hasFile('lampiran_bukti')) {
                $fileName = time() . '.' . $request->file('lampiran_bukti')->extension();
                $request->file('lampiran_bukti')->move(public_path('uploads'), $fileName);
                $validatedData['lampiran_bukti'] = $fileName;
            }
    
            // Membuat data sertifikasi
            $certificationData = [
                'item_kerjasama_id' => $validatedData['item_kerjasama_id'],
                'tanggal_mulai' => $validatedData['tanggal_mulai'],
                'tanggal_selesai' => $validatedData['tanggal_selesai'],
                'penyelenggara' => $validatedData['penyelenggara'],
                'masa_berlaku' => $validatedData['masa_berlaku'],
                'tanggal_mulai_berlaku' => $validatedData['tanggal_mulai_berlaku'],
                'biaya_sertifikasi_peserta' => $validatedData['biaya_sertifikasi_peserta'] ?? 0,
                'nominal_biaya_dunia_kerja' => $validatedData['nominal_biaya_dunia_kerja'] ?? 0,
                'nominal_biaya_satuan_pendidikan' => $validatedData['nominal_biaya_satuan_pendidikan'] ?? 0,
                'nominal_biaya_pemerintah_daerah' => $validatedData['nominal_biaya_pemerintah_daerah'] ?? 0,
                'nominal_biaya_pemerintah_pusat' => $validatedData['nominal_biaya_pemerintah_pusat'] ?? 0,
                'kompetensi' => $validatedData['kompetensi'],
                'lampiran_bukti' => $validatedData['lampiran_bukti'] ?? null,
            ];
    
            $certification = Certification::create($certificationData);
    
            // Menyimpan data mahasiswa
            if ($request->has('certificationmhs')) {
                foreach ($request->certificationmhs as $mahasiswa) {
                    $certification->mahasiswa()->create($mahasiswa);
                }
            }
    
            // Menyimpan data dosen
            if ($request->has('certificationdosens')) {
                foreach ($request->certificationdosens as $dosen) {
                    $certification->dosen()->create($dosen);
                }
            }
    
            // Menyimpan data penanggung jawab
            if ($request->has('certificationpjs')) {
                foreach ($request->certificationpjs as $penanggungJawab) {
                    $certification->penanggungJawab()->create($penanggungJawab);
                }
            }
    
            return response()->json(['success' => 'Data berhasil disimpan.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    public function destroy($id)
    {
        $certification = Certification::findOrFail($id);
        $itemKerjasamaId = $certification->item_kerjasama_id;
        $certification->delete();

        return redirect()->route('IsiSertifikasi', ['id' => $itemKerjasamaId])->with('success', 'Data berhasil dihapus.');
    }
}