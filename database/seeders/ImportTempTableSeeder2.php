<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImportTempTableSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Path to your SQL file
        $sqlFile = database_path('seeders/provinces.sql');

        // Read the SQL file
        $sql = File::get($sqlFile);

        // Execute the SQL commands
        DB::unprepared($sql);

        // Insert data into provinces
        DB::table('provinces')->insertUsing(
            ['id', 'name'],
            DB::table('provinces')->select('id', 'name')->distinct()
        );
    }
}
