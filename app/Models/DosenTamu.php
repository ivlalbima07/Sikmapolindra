<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenTamu extends Model
{
    use HasFactory;
protected $table = 'dosen_tamu';
    protected $fillable = [
        'item_kerjasama_id',
        'nama',
        'tanggal_mulai',
        'tanggal_selesai',
        'nominal_biaya_dunia_kerja',
        'nominal_biaya_satuan_pendidikan',
        'nominal_biaya_pemerintah_daerah',
        'nominal_biaya_pemerintah_pusat',
        'nominal_biaya_dudi',
    ];

  public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }
   public function dosenPenanggungJawab()
    {
        return $this->hasMany(DosenPenanggungJawabBaru::class);
    }

    public function itemKerjasama()
    {
        return $this->belongsTo(ItemKerjasama::class);
    }
}
