<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;
 protected $table = 'instruktur';
    protected $fillable = [
        'pkl_mhs_id',
        'nama',
        'no_id',
        'jabatan',
        'no_telepon',
        'email',
    ];
}