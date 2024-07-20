<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenTamu extends Model
{
    use HasFactory;

    protected $table = 'dosen_tamu';

    protected $fillable = [
        'kerjasama_id',
        'no_dokumen',
        'nib',
        'nama_dudi',
        'program_studi',
    ];

    public function kerjasama()
    {
        return $this->belongsTo(Datakerjasama::class, 'kerjasama_id');
    }
}