<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificationmhs extends Model
{
    use HasFactory;

    protected $table = 'certificationmhs';

    protected $fillable = [
        'certifications_id',
        'nama',
        'nim',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    public function certification()
    {
        return $this->belongsTo(Certification::class, 'certification_id');
    }
}