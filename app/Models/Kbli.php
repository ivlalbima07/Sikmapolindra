<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kbli extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'kblis';


    public function dudis()
    {
        return $this->belongsToMany(Dudi::class, 'dudi_kbli', 'kbli_id', 'dudi_id');
    }
    
}