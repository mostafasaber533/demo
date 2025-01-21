<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique(),
            'description' => $this->faker->paragraph(),
            'img' => 'default-track.png'
        ];
    }
}
