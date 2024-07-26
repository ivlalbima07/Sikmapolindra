<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificationdosen extends Model
{
    use HasFactory;

    protected $table = 'certificationdosens';

    protected $fillable = [
        'certifications_id',
        'nama',
        'nidn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    public function certification()
    {
        return $this->belongsTo(Certification::class, 'certification_id');
    }
}