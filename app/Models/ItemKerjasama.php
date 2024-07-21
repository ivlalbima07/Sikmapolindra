<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemKerjasama extends Model
{
    use HasFactory;
    protected $table = 'item_kerjasama'; // Nama tabel sesuai dengan migrasi
    protected $fillable = [
        'kerjasama_id',
        'jurusan',
        'jenis_kerjasama',
    ];


    public function pklMhs()
    {
        return $this->hasMany(PklMhs::class, 'item_kerjasama_id');
    }

    public function datakerjasama()
    {
        return $this->belongsTo(Datakerjasama::class, 'kerjasama_id');
    }
}