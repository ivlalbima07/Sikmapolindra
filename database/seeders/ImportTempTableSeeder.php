<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImportTempTableSeeder extends Seeder
{
    public function run()
    {
        // Path to your SQL file
        $sqlFile = database_path('seeders/districts_regency_village.sql');

        // Read the SQL file
        $sql = File::get($sqlFile);

        // Execute the SQL commands
        DB::unprepared($sql);

        // // Insert data into provinces
        // DB::table('provinces')->insertUsing(
        //     ['id', 'name'],
        //     DB::table('provinces')->select('id', 'name')->distinct()
        // );

        // Insert data into regencies
        DB::table('regencies')->insertUsing(
            ['id', 'name', 'province_id'],
            DB::table('regencies')->select('id', 'name', 'province_id')->distinct()
        );

        // Insert data into districts
        DB::table('districts')->insertUsing(
            ['id', 'name', 'regency_id'],
            DB::table('districts')->select('id', 'name', 'regency_id')->distinct()
        );

        // Insert data into villages
        DB::table('villages')->insertUsing(
            ['id', 'name', 'district_id'],
            DB::table('villages')->select('id', 'name', 'district_id')->distinct()
        );
    }
}
