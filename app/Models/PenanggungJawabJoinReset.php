<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanggungJawabJoinReset extends Model
{
    use HasFactory;

    protected $table = 'penanggung_jawab_join_resets';

    protected $guarded = [];

    public function joinReset()
    {
        return $this->belongsTo(JoinReset::class);
    }
}
