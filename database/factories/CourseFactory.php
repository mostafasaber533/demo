<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    private $coursesByTrack = [
        'Frontend Development' => [
            'HTML & CSS',
            'JavaScript',
            'React.js',
            'Vue.js'
        ],
        'Backend Development' => [
            'PHP',
            'Laravel',
            'MySQL',
            'Node.js'
        ],
        'Mobile Development' => [
            'Flutter',
            'React Native',
            'iOS Swift',
            'Android Kotlin'
        ]
    ];

    public function definition(): array
    {
        $track = $this->faker->randomKey($this->coursesByTrack);
        return [
            'name' => $this->faker->unique()->randomElement($this->coursesByTrack[$track]),
            'description' => $this->faker->paragraph(),
            'logo' => 'default-course.png',
            'track_id' => function () {
                return \App\Models\Track::inRandomOrder()->first()->id;
            }
        ];
    }
}
