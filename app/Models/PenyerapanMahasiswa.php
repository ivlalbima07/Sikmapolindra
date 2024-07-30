<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyerapanMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'penyerapan_mahasiswa';

    protected $guarded = [];

    public function penyerapan()
    {
        return $this->belongsTo(Penyerapan::class);
    }
}
