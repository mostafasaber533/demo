<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'image' => 'storage/students/default.png',
            'track_id' => function () {
                return \App\Models\Track::inRandomOrder()->first()->id;
            }
        ];
    }
}
