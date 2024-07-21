<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
 protected $table = 'dosen';
    protected $fillable = [
        'pkl_mhs_id',
        'nama',
        'nidn',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
    ];
}