<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'research';

    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasMany(RisetMahasiswa::class);
    }

    public function dosen()
    {
        return $this->hasMany(RisetDosen::class);
    }

    public function penanggungJawab()
    {
        return $this->hasMany(RisetPenanggungJawab::class);
    }

    public function itemKerjasama()
    {
        return $this->belongsTo(ItemKerjasama::class, 'item_kerjasama_id');
    }
}
