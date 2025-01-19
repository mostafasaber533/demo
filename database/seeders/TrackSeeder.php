<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    public function run(): void
    {
        $tracks = [
            [
                'name' => 'Web Development',
                'description' => 'Learn web development technologies'
            ],
            [
                'name' => 'Mobile Development',
                'description' => 'Learn mobile app development'
            ],
            [
                'name' => 'Data Science',
                'description' => 'Learn data analysis and machine learning'
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'Learn user interface and experience design'
            ],
        ];

        foreach ($tracks as $track) {
            Track::create($track);
        }
    }
}
