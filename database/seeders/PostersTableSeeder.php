<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Poster;
use Illuminate\Support\Str;

class PostersTableSeeder extends Seeder
{
    public function run()
    {
        // Insert dummy data into the posters table
        Poster::insert([
            [
                'user_id' => 1, // You need at least 1 user in the users table
                'branding_id' => 1,
                'category_id' => 1,
                'title' => 'Sustainable Farming Techniques',
                'content' => 'Learn about the latest sustainable farming techniques to maximize crop yield while protecting the environment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'branding_id' => 2,
                'category_id' => 2,
                'title' => 'Organic Farming Benefits',
                'content' => 'Explore the health and environmental benefits of organic farming practices.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'branding_id' => 3,
                'category_id' => 1,
                'title' => 'Precision Agriculture: The Future of Farming',
                'content' => 'Precision agriculture is revolutionizing how farmers manage their crops, optimize water usage, and increase efficiency.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'branding_id' => 4,
                'category_id' => 3,
                'title' => 'Hydroponics: Growing Without Soil',
                'content' => 'Hydroponics offers a new way to grow crops indoors without the need for soil, making it an innovative solution for urban farming.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'branding_id' => 5,
                'category_id' => 4,
                'title' => 'Agriculture and Climate Change',
                'content' => 'Discover how agriculture impacts climate change and what farmers can do to reduce their carbon footprint.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

