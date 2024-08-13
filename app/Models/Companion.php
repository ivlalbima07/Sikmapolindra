<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;

    protected $table = 'companions';

    protected $fillable = [
        'nama',
        'email',
        'no_telefon',
        'dudi_id',
        'jabatan_dudi',
        'pendidikan_terakhir',
        'keahlian',
    ];

    public function dudi()
    {
        return $this->belongsTo(Dudi::class);
    }
}