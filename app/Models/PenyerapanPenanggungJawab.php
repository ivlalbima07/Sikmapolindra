<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyerapanPenanggungJawab extends Model
{
    use HasFactory;

    protected $table = 'penyerapan_penanggung_jawab';

    protected $guarded = [];

    public function penyerapan()
    {
        return $this->belongsTo(Penyerapan::class);
    }
}
