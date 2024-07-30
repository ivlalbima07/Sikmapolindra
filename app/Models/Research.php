<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_riset', 'tanggal_mulai', 'tanggal_selesai', 'bidang_riset', 'nama_peserta_lain',
        'luaran', 'tahun_pembiayaan', 'nominal_biaya_dunia_kerja', 'nominal_biaya_satuan_pendidikan',
        'nominal_biaya_pemerintah_daerah', 'nominal_biaya_pemerintah_pusat'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(RisetMahasiswa::class);
    }

    public function dosen()
    {
        return $this->hasMany(RisetDosen::class);
    }

    public function penanggungJawab()
    {
        return $this->hasMany(RisetPenanggungJawab::class);
    }
}
