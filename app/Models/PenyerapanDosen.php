<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyerapanDosen extends Model
{
    use HasFactory;

    protected $table = 'penyerapan_dosen';

    protected $guarded = [];

    public function penyerapan()
    {
        return $this->belongsTo(Penyerapan::class);
    }
}
