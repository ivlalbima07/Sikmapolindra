<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyerapan extends Model
{
    use HasFactory;

    protected $table = 'penyerapan';

    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasMany(PenyerapanMahasiswa::class);
    }

    public function dosen()
    {
        return $this->hasMany(PenyerapanDosen::class);
    }

    public function penanggungJawab()
    {
        return $this->hasMany(PenyerapanPenanggungJawab::class);
    }
}
