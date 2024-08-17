<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User; // Impor model User

class PermisionSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat atau memperbarui role 'admin'
        $role_admin = Role::updateOrCreate(
            ['name' => 'admin']
        );

        // Membuat atau memperbarui role 'superadmin'
        $role_superadmin = Role::updateOrCreate(
            ['name' => 'superadmin']
        );

        // Membuat atau memperbarui permission 'view_dashboard'
        $permission1 = Permission::updateOrCreate(
            ['name' => 'view_dashboard']
        );

        // Membuat atau memperbarui permission 'view_chart_on_dashboard'
        $permission2 = Permission::updateOrCreate(
            ['name' => 'view_chart_on_dashboard']
        );

        // Memberikan permission kepada role 'admin'
        $role_admin->givePermissionTo($permission1);
        $role_admin->givePermissionTo($permission2);

        // Menemukan user dengan ID 1
        $adminUser = User::find(1);

        if ($adminUser) {
            // Menugaskan role 'admin' kepada user tersebut
            $adminUser->assignRole(['admin']);
        }

        // Menemukan user dengan email 'superadmin@example.com'
        $superAdminUser = User::where('email', 'superadmin@example.com')->first();

        if ($superAdminUser) {
            // Menugaskan role 'superadmin' kepada user tersebut
            $superAdminUser->assignRole(['superadmin']);
        }
    }
}