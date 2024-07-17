<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Klasifikasi;

class KlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $klasifikasiData = [
            ['nama_klasifikasi' => 'Klasifikasi A', 'kriteria_id' => 1],
            ['nama_klasifikasi' => 'Klasifikasi B', 'kriteria_id' => 2],
            ['nama_klasifikasi' => 'Klasifikasi C', 'kriteria_id' => 3],
            // Tambahkan data klasifikasi lainnya di sini
        ];

        foreach ($klasifikasiData as $data) {
            Klasifikasi::create($data);
        }
    }
}