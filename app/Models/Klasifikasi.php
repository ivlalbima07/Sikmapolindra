<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_klasifikasi', 'kriteria_id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}