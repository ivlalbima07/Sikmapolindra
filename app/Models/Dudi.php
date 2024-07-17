<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perseroan',
        'nib',
        'tanggal_terbit',
        'tipe',
        'alamat',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'email_mitra',
        'no_mitra',
        'klasifikasi_baku',
        'lingkupkerjasama',
        'kriteria_id',
        'klasifikasi_id',
    ];

    // Definisikan relasi ke PenanggungJawab
    public function penanggungJawabs()
    {
        return $this->hasMany(PenanggungJawab::class);
    }
    public function kblis()
    {
        return $this->belongsTo(kbli::class, 'klasifikasi_baku');
    }

    // Definisikan relasi ke Kriteria
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    // Definisikan relasi ke Provinsi
    public function provinsi()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    // Definisikan relasi ke Kabupaten
    public function kabupaten()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    // Definisikan relasi ke Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    // Definisikan relasi ke Desa
    public function desa()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }
}