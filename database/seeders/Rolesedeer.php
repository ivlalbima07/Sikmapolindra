<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class Rolesedeer extends Seeder
{
    public function run(): void{

        $role_admin = Role::updateOrCreate(
             [
                 'name' => 'admin',
             ],
             ['name' => 'admin']
         );

         $role_superadmin = Role::updateOrCreate(
             [
                 'name' => 'superadmin',
             ],
             ['name' => 'superadmin']
         );
    }
}