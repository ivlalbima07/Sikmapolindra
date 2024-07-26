<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteriaData = [
            ['nama' => 'Kriteria 1'],
            ['nama' => 'Kriteria 2'],
            ['nama' => 'Kriteria 3'],
            ['nama' => 'Kriteria 4'],
            // Tambahkan kriteria lainnya di sini
        ];

        foreach ($kriteriaData as $data) {
            Kriteria::create($data);
        }
    }
}