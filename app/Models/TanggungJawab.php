<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggungJawab extends Model
{
    use HasFactory;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];
    protected $table = 'tanggung_jawab';

    // Relasi ke Dudi
    public function dudi()
    {
        return $this->belongsTo(Dudi::class);
    }

}
