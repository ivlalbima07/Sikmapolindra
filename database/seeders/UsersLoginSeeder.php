<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'polindi',
                'email' => 'polindi@gmail.com',
                'phone_number' => '1241214441',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'polindah',
                'email' => 'polindah@gmail.com',
                'phone_number' => '1221414141421',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Ivlal Bima Nugraha',
                'email' => 'ivlal2@gmail.com',
                'phone_number' => '1234567890',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'phone_number' => $user['phone_number'],
                    'password' => $user['password'],
                ]
            );
        }
    }
}