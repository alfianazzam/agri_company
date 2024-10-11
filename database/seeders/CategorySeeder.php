<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Agro Culture',
                'slug' => 'agro-culture',
                'description' => 'Kategori ini mencakup berbagai topik terkait pertanian, tanaman, hasil bumi, dan teknologi pertanian yang modern.',
                'tags' => json_encode(['Agriculture', 'Farming', 'Crops', 'Agro Tech', 'Sustainable Farming']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Kamu bisa menambahkan data kategori lain jika diperlukan
            [
                'name' => 'Agro Technology',
                'slug' => 'agro-technology',
                'description' => 'Kategori ini berfokus pada teknologi dalam pertanian, mulai dari alat canggih hingga teknik pemrosesan hasil panen.',
                'tags' => json_encode(['Tech', 'Farming Tools', 'Automation']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
