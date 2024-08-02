<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function dudis()
    {
        return $this->hasMany(Dudi::class, 'kriteria_id');
    }
}