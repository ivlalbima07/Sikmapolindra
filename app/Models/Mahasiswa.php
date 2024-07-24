<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Pastikan nama tabel sesuai

    protected $fillable = [
        'pkl_mhs_id',
        'nama',
        'nim',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
    ];

    public function pklMhs()
    {
        return $this->belongsTo(PklMhs::class);
    }
}