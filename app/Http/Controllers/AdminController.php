<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use App\Models\ItemKerjasama;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function recap()
    {
        $jenisKerjasama = [
            'Dosen/Tenaga Ahli dari Dunia Kerja (Dosen Tamu)',
            'Praktek Kerja Lapangan (PKL) Mahasiswa',
            'Praktek Kerja Lapangan (PKL) Dosen',
            'Sertifikasi Kompetensi',
            'Riset Terapan',
            'Penyerapan Lulusan',
            'Beasiswa/Ikatan Dinas',
            'Sarana',
            'Joint Research',
        ];
    
        $data = [];
        foreach ($jenisKerjasama as $jenis) {
            $dudis = Dudi::with(['dataKerjasama.itemKerjasama' => function ($query) use ($jenis) {
                $query->where('jenis_kerjasama', $jenis);
            }])->get();
    
            // Menghitung jumlah dudi unik
            $jumlahMitraDudi = $dudis->filter(function($dudi) use ($jenis) {
                return $dudi->dataKerjasama->filter(function($kerjasama) use ($jenis) {
                    return $kerjasama->itemKerjasama->where('jenis_kerjasama', $jenis)->count() > 0;
                })->count() > 0;
            })->count();
    
            // Menghitung jumlah jurusan unik dalam setiap dudi meskipun sama tapi beda DUDI
            $jurusanUnik = collect();
            foreach ($dudis as $dudi) {
                foreach ($dudi->dataKerjasama as $kerjasama) {
                    foreach ($kerjasama->itemKerjasama as $item) {
                        if ($item->jenis_kerjasama == $jenis) {
                            $jurusanUnik->push($dudi->id . '-' . $item->jurusan); // Menggabungkan ID DUDI dan jurusan untuk memastikan keunikan
                        }
                    }
                }
            }
            $jumlahProgramStudi = $jurusanUnik->unique()->count();
    
            $data[] = [
                'jenis_kerjasama' => $jenis,
                'jumlah_mitra_dudi' => $jumlahMitraDudi,
                'jumlah_program_studi' => $jumlahProgramStudi,
            ];
        }
    
        return view('admin.recap.index', compact('data'));
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }



    public function implementation()
    {
        return view('admin.implementation.index');
    }

    public function companion()
    {
        return view('admin.companion.index');
    }


    public function resetpassword()
    {
        return view('admin.reset_password.index');
    }
    // public function DosenTamu()
    // {
    //     return view('admin.implementation.dosentamu.index');
    // }


}