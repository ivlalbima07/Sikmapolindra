<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PklDosenpj extends Model
{
    use HasFactory;

    protected $table = 'pkldosenpj';

    protected $fillable = [
        'pkldosen_id',
        'nama',
        'nidn',
        'prodi',
    ];

    public function pklDosen()
    {
        return $this->belongsTo(PklDosen::class, 'pkldosen_id');
    }
}