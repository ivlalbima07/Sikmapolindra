<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Pastikan untuk mengomentari atau menghapus pemanggilan factory jika tidak digunakan
        // \App\Models\User::factory(10)->create();

        // Contoh pemanggilan factory dengan custom data
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Pemanggilan seeder yang benar
        $this->call([
            UsersLoginSeeder::class,
            ImportTempTableSeeder2::class,
            ImportTempTableSeeder::class,

            // Tambahkan seeder lain di sini jika ada
        ]);
         $this->call(KriteriaSeeder::class);
          $this->call(KlasifikasiSeeder::class);
           $this->call(KblisSeeder::class);
    }
}