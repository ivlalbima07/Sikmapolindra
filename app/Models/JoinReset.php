<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinReset extends Model
{
    use HasFactory;

    protected $table = 'join_resets';

    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasMany(MahasiswaJoinReset::class, 'join_reset_id');
    }

    public function dosen()
    {
        return $this->hasMany(DosenJoinReset::class, 'join_reset_id');
    }

    public function penanggungJawab()
    {
        return $this->hasMany(PenanggungJawabJoinReset::class, 'join_reset_id');
    }
}