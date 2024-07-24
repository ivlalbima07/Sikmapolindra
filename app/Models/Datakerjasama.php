<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakerjasama extends Model
{
    use HasFactory;
     protected $table = 'datakerjasama';

    protected $fillable = [
        'dudi_id',
        'nomor_pks',
        'tanggal_pks',
        'tanggal_mulai',
        'tanggal_selesai',
        'lampiran_bukti',
    ];

    public function dudi()
    {
        return $this->belongsTo(Dudi::class);
    }
 public function itemKerjasama()
    {
        return $this->hasMany(ItemKerjasama::class, 'kerjasama_id');
    }

    public function dosenTamu()
{
    return $this->hasMany(DosenTamu::class, 'kerjasama_id');
}
}