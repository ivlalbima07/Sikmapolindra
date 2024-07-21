<?php

// app/Models/PklMhs.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PklMhs extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_kerjasama_id', 'nama_rombongan', 'tanggal_mulai', 'tanggal_selesai',
        'foto_dokumen', 'biaya_per_mahasiswa', 'biaya_dunia_kerja', 'biaya_satuan_pendidikan',
        'biaya_pemerintah_daerah', 'biaya_pemerintah_pusat', 'biaya_cost_sharing'
    ];

    public function itemKerjasama()
    {
        return $this->belongsTo(ItemKerjasama::class, 'item_kerjasama_id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }

    public function instruktur()
    {
        return $this->hasMany(Instruktur::class);
    }

    public function dosenPenanggungJawab()
    {
        return $this->hasMany(DosenPenanggungJawab::class);
    }
}