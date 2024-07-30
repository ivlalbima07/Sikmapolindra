<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RisetPenanggungJawab extends Model
{
    use HasFactory;

    protected $table = 'riset_penanggung_jawab'; // Nama tabel

    protected $guarded = []; // Semua atribut dapat diisi secara massal

    public function research()
    {
        return $this->belongsTo(Research::class);
    }
}