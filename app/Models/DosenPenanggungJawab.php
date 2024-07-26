<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPenanggungJawab extends Model
{
    use HasFactory;
    protected $table = 'dosen_penanggung_jawab';

    protected $fillable = [
        'pkl_mhs_id',
        'nama',
        'nidn',
        'prodi',
    ];
}