<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branding;

class BrandingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Branding::insert([
            [
                'name' => 'Agro Corp',
                'logo' => 'agro-corp-logo.png',
                'description' => 'A leading agricultural brand offering innovative solutions to farmers worldwide.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Green Earth',
                'logo' => 'green-earth-logo.png',
                'description' => 'Specializes in organic farming solutions and eco-friendly products.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FarmaTech',
                'logo' => 'farmatech-logo.png',
                'description' => 'Tech-driven agricultural solutions focusing on precision farming.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AgriSolutions',
                'logo' => 'agrisolutions-logo.png',
                'description' => 'Provides innovative tools and technologies for modern agriculture.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AgriPro',
                'logo' => 'agripro-logo.png',
                'description' => 'Professional agricultural products and services for large-scale farms.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
