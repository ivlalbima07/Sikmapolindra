<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PklDosen extends Model
{
    use HasFactory;

    protected $table = 'pkldosen';

    protected $fillable = [
        'item_kerjasama_id',
        'nama_rombel',
        'tanggal_mulai',
        'tanggal_selesai',
        'file',
        'biaya_per_dosen',
        'biaya_dari_dunia_kerja',
        'biaya_dari_satuan_pendidikan',
        'biaya_dari_pemerintah_daerah',
        'biaya_dari_pemerintah_pusat',
    ];

    public function dosen()
    {
        return $this->hasMany(PklDosentambah::class, 'pkldosen_id');
    }

    public function instruktur()
    {
        return $this->hasMany(PklDoseninstruktur::class, 'pkldosen_id');
    }

    public function penanggungJawab()
    {
        return $this->hasMany(PklDosenpj::class, 'pkldosen_id');
    }

    public function itemKerjasama()
    {
        return $this->belongsTo(ItemKerjasama::class, 'item_kerjasama_id');
    }
}