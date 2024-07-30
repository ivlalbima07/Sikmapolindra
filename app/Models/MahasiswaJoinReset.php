<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaJoinReset extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_join_resets';

    protected $guarded = [];

    public function joinReset()
    {
        return $this->belongsTo(JoinReset::class);
    }

    
}
