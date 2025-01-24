<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        collect(['students', 'courses', 'tracks'])->each(fn($table) => DB::table($table)->truncate());

        $this->call([
            TrackSeeder::class,
            CourseSeeder::class,
            StudentSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
