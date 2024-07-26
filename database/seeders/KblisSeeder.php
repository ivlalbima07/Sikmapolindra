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
            ['nama' => 'KBLI 12346 - Perdagangan Produk C'],
            ['nama' => 'KBLI 67891 - Industri Menengah Produk D'],
            ['nama' => 'KBLI 54322 - Jasa Keuangan'],
            ['nama' => 'KBLI 12347 - Perdagangan Produk E'],
            ['nama' => 'KBLI 67892 - Industri Besar Produk F'],
            ['nama' => 'KBLI 54323 - Jasa Pendidikan'],
            ['nama' => 'KBLI 12348 - Perdagangan Produk G'],
            ['nama' => 'KBLI 67893 - Industri Rumah Tangga Produk H'],
            ['nama' => 'KBLI 54324 - Jasa Kesehatan'],
            // Tambahkan data KBLI lainnya di sini
        ];        

        foreach ($kblisData as $data) {
            Kbli::create($data);
        }
    }
}