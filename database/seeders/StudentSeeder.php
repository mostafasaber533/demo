<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Track;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class StudentSeeder extends Seeder
{
    private $studentNames = [
        'Ahmed Mohamed', 'Sara Ahmed', 'Omar Ali', 'Nour Ibrahim',
        'Mostafa Mahmoud', 'Rana Hassan', 'Youssef Khaled', 'Mariam Sameh'
    ];

    public function run(): void
    {
        if (!Schema::hasTable('students')) {
            Artisan::call('migrate', [
                '--path' => 'database/migrations/2024_02_17_000001_create_students_table.php'
            ]);
        }

        Track::all()->each(function ($track) {
            // Create 3 students per track with customized data
            foreach (array_slice($this->studentNames, 0, 3) as $index => $name) {
                Student::create([
                    'name' => $name,
                    'email' => strtolower(str_replace(' ', '.', $name)) . '@example.com',
                    'gender' => $index % 2 == 0 ? 'male' : 'female',
                    'image' => 'storage/students/default.png',
                    'track_id' => $track->id
                ]);
            }
        });
    }
}
