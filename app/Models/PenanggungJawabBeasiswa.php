<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanggungJawabBeasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'penanggung_jawab_beasiswa';

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class);
    }
}
