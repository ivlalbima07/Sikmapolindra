<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
protected $table = 'mata_kuliah';
    protected $fillable = [
        'dosen_tamu_id',
        'nama',
        'foto_dokumen',
        'jumlah_jpl',
        'honorarium_per_jam'
    ];

    public function dosenTamu()
    {
        return $this->belongsTo(DosenTamu::class);
    }
}