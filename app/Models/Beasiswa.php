<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'beasiswa';

    public function mahasiswa()
    {
        return $this->hasMany(MahasiswaBeasiswa::class);
    }

    public function penanggungJawab()
    {
        return $this->hasMany(PenanggungJawabBeasiswa::class);
    }
}
