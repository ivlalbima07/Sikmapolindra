<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RisetDosen extends Model
{
    use HasFactory;

    protected $table = 'riset_dosen'; // Nama tabel

    protected $guarded = []; // Semua atribut dapat diisi secara massal

    public function research()
    {
        return $this->belongsTo(Research::class);
    }
}
