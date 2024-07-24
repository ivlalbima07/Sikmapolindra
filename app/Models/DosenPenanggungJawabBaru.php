<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPenanggungJawabBaru extends Model
{
    use HasFactory;
 protected $table = 'dosen_penanggung_jawab_baru';
    protected $fillable = [
        'dosen_tamu_id',
        'nama',
        'nidn',
        'prodi'
    ];

    public function dosenTamu()
    {
        return $this->belongsTo(DosenTamu::class);
    }
}
