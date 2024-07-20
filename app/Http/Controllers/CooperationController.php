<?php

namespace App\Http\Controllers;

use App\Models\ItemKerjasama;
use App\Models\Datakerjasama;
use App\Models\Dudi;
use Illuminate\Http\Request;

class CooperationController extends Controller
{
 public function cooperation()
{
    $dudi = Dudi::all(); // Fetch all Dudis
    $datakerjasama = Datakerjasama::with('itemKerjasama')->get(); // Fetch all cooperation data with related ItemKerjasama

    return view('admin.cooperation.index', compact('dudi', 'datakerjasama'));
}

    public function DataDocument()
    {
        return view('admin.cooperation.document');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dudi_id' => 'required',
            'nomor_pks' => 'required',
            'tanggal_pks' => 'required|date',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'lampiran_bukti' => 'nullable|file|max:10240', // max 10MB
        ]);

        // Upload file lampiran jika ada
        if ($request->hasFile('lampiran_bukti')) {
            $lampiran = $request->file('lampiran_bukti');
            $lampiran_nama = time() . '_' . $lampiran->getClientOriginalName();
            $lampiran->storeAs('lampiran', $lampiran_nama, 'public');
        } else {
            $lampiran_nama = null;
        }

        // Simpan data kerjasama
        Datakerjasama::create([
            'dudi_id' => $request->dudi_id,
            'nomor_pks' => $request->nomor_pks,
            'tanggal_pks' => $request->tanggal_pks,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lampiran_bukti' => $lampiran_nama,
        ]);

        // Notifikasi
        $request->session()->flash('status', 'Data kerjasama berhasil ditambahkan.');

        return redirect()->route('cooperation');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_pks' => 'required',
            'tanggal_pks' => 'required|date',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'lampiran_bukti' => 'nullable|file|max:10240', // max 10MB
        ]);

        $kerjasama = Datakerjasama::findOrFail($id);

        // Upload file lampiran jika ada
        if ($request->hasFile('lampiran_bukti')) {
            $lampiran = $request->file('lampiran_bukti');
            $lampiran_nama = time() . '_' . $lampiran->getClientOriginalName();
            $lampiran->storeAs('lampiran', $lampiran_nama, 'public');
            $kerjasama->lampiran_bukti = $lampiran_nama;
        }

        // Update data kerjasama
        $kerjasama->update([
            'nomor_pks' => $request->nomor_pks,
            'tanggal_pks' => $request->tanggal_pks,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        // Notifikasi
        $request->session()->flash('status', 'Data kerjasama berhasil diperbarui.');

        return redirect()->route('cooperation');
    }

    public function storeItemKerjasama(Request $request)
{
    $request->validate([
        'kerjasama_id' => 'required|exists:datakerjasama,id',
        'jurusan' => 'required|string',
        'jenis_kerjasama' => 'required|string',
    ]);

    ItemKerjasama::create([
        'kerjasama_id' => $request->kerjasama_id,
        'jurusan' => $request->jurusan,
        'jenis_kerjasama' => $request->jenis_kerjasama,
    ]);

    return redirect()->route('cooperation')->with('status', 'Item kerjasama berhasil ditambahkan.');
}


    public function destroy($id)
    {
        $kerjasama = Datakerjasama::findOrFail($id);
        $kerjasama->delete();

        session()->flash('status', 'Data kerjasama berhasil dihapus.');

        return redirect()->route('cooperation');
    }
}