<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PklDoseninstruktur extends Model
{
    use HasFactory;

    protected $table = 'pkldoseninstruktur';

    protected $fillable = [
        'pkldosen_id',
        'no_id',
        'nama',
        'jabatan',
        'no_telepon',
        'email',
    ];

    public function pklDosen()
    {
        return $this->belongsTo(PklDosen::class, 'pkldosen_id');
    }
}