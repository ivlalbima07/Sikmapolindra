<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PklDosentambah extends Model
{
    use HasFactory;

    protected $table = 'pkldosentambah';

    protected $fillable = [
        'pkldosen_id',
        'nama',
        'nidn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    public function pklDosen()
    {
        return $this->belongsTo(PklDosen::class, 'pkldosen_id');
    }
}