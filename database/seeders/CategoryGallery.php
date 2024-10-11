<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryGallery extends Seeder
{
    public function run()
    {
        DB::table('category_gallery')->insert([
            [
                'name' => 'Pertanian Berkelanjutan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknologi Pertanian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inovasi Agribisnis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk Pertanian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kegiatan Komunitas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
