<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaBeasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'mahasiswa_beasiswa';

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class);
    }
}
