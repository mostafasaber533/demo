<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    private $tracks = [
        'Web Development' => [
            'description' => 'Full Stack Web Development with modern technologies',
            'courses' => ['HTML/CSS', 'JavaScript', 'PHP', 'Laravel', 'React']
        ],
        'Mobile Development' => [
            'description' => 'Native and cross-platform mobile development',
            'courses' => ['Flutter', 'React Native', 'iOS', 'Android', 'Kotlin']
        ],
        'Data Science' => [
            'description' => 'Data analysis and machine learning',
            'courses' => ['Python', 'R', 'Machine Learning', 'SQL', 'Statistics']
        ]
    ];

    public function run(): void
    {
        foreach ($this->tracks as $name => $details) {
            Track::create([
                'name' => $name,
                'description' => $details['description'],
                'img' => strtolower(str_replace(' ', '-', $name)) . '.png'
            ]);
        }
    }
}
