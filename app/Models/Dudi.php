<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    use HasFactory;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];
    protected $table = 'dudis';

    // Relasi ke Province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Relasi ke Regency
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    // Relasi ke District
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // Relasi ke Village
    public function kbli()
    {
        return $this->belongsTo(Kbli::class);
    }

    // Relasi ke Village
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    // Relasi ke Village
    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }

    // Relasi ke Village
    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    // Relasi ke TanggungJawab
    public function penanggungJawabs()
    {
        return $this->hasMany(TanggungJawab::class);
    }

    public function kblis()
    {
        return $this->belongsToMany(Kbli::class, 'dudi_kbli', 'dudi_id', 'kbli_id');
    }
    
}
