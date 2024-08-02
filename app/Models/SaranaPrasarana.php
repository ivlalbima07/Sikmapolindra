<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    use HasFactory;
    
    protected $table = 'sarana_prasarana';
    protected $guarded = [];

    public function penanggungJawab()
    {
        return $this->hasMany(PenanggungJawabSaranaPrasarana::class);
    }

    public function itemKerjasama()
    {
        return $this->belongsTo(ItemKerjasama::class, 'item_kerjasama_id');
    }
}
