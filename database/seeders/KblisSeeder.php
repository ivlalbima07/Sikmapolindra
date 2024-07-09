<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kbli;

class KblisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kblisData = [
            ['nama' => 'KBLI 12345 - Perdagangan Besar Produk A'],
            ['nama' => 'KBLI 67890 - Industri Kecil Produk B'],
            ['nama' => 'KBLI 54321 - Jasa Konsultansi'],
            // Tambahkan data KBLI lainnya di sini
        ];

        foreach ($kblisData as $data) {
            Kbli::create($data);
        }
    }
}