<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Track;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    private $trackCourses = [
        'Frontend Development' => [
            ['name' => 'HTML & CSS Mastery', 'description' => 'Master web fundamentals'],
            ['name' => 'JavaScript Advanced', 'description' => 'Modern JavaScript programming'],
            ['name' => 'React Complete', 'description' => 'Build reactive web apps'],
        ],
        'Backend Development' => [
            ['name' => 'PHP Development', 'description' => 'Server-side programming with PHP'],
            ['name' => 'Laravel Framework', 'description' => 'Professional web development'],
            ['name' => 'MySQL Database', 'description' => 'Database design and management'],
        ],
        'Mobile Development' => [
            ['name' => 'Flutter & Dart', 'description' => 'Cross-platform mobile apps'],
            ['name' => 'iOS Swift', 'description' => 'Native iOS development'],
            ['name' => 'Android Studio', 'description' => 'Android app development'],
        ]
    ];

    public function run(): void
    {
        foreach ($this->trackCourses as $trackName => $courses) {
            $track = Track::firstWhere('name', 'LIKE', "%$trackName%");
            if ($track) {
                foreach ($courses as $course) {
                    Course::create([
                        'name' => $course['name'],
                        'description' => $course['description'],
                        'logo' => 'course-' . strtolower(str_replace(['&', ' '], '-', $course['name'])) . '.png',
                        'track_id' => $track->id
                    ]);
                }
            }
        }
    }
}
