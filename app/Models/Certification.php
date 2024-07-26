<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $table = 'certifications';

    protected $fillable = [
        'item_kerjasama_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'penyelenggara',
        'masa_berlaku',
        'tanggal_mulai_berlaku',
        'biaya_sertifikasi_peserta',
        'nominal_biaya_dunia_kerja',
        'nominal_biaya_satuan_pendidikan',
        'nominal_biaya_pemerintah_daerah',
        'nominal_biaya_pemerintah_pusat',
        'kompetensi',
        'lampiran_bukti'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Certificationmhs::class, 'certification_id');
    }

    public function dosen()
    {
        return $this->hasMany(Certificationdosen::class, 'certification_id');
    }

    public function penanggungJawab()
    {
        return $this->hasMany(Certificationpj::class, 'certification_id');
    }

    public function itemKerjasama()
    {
        return $this->belongsTo(ItemKerjasama::class, 'item_kerjasama_id');
    }
}