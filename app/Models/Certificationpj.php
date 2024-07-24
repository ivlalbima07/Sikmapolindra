<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificationpj extends Model
{
    use HasFactory;

    protected $table = 'certificationpjs';

    protected $fillable = [
        'certifications_id',
        'nama',
        'nidn',
        'prodi'
    ];

    public function certification()
    {
        return $this->belongsTo(Certification::class, 'certification_id');
    }
}