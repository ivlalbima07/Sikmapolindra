<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penanggungjawab extends Model
{
    use HasFactory;
        protected $fillable = [
        'dudi_id', 'nama', 'email', 'nomor_hp', 'jenis_kelamin', 'jenis_identitas',
        'nomor_identitas', 'kewarganegaraan'
    ];

    public function dudi()
    {
        return $this->belongsTo(Dudi::class);
    }
}