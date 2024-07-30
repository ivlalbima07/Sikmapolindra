<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RisetMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'riset_mahasiswa'; // Nama tabel

    protected $guarded = []; // Semua atribut dapat diisi secara massal
    public function research()
    {
        return $this->belongsTo(Research::class);
    }
}
