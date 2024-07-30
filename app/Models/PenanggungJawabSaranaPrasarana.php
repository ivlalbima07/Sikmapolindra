<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanggungJawabSaranaPrasarana extends Model
{
    use HasFactory;

    protected $table = 'penanggung_jawab_sarana_prasarana';
    protected $guarded = [];

    public function saranaPrasarana()
    {
        return $this->belongsTo(SaranaPrasarana::class);
    }
}
