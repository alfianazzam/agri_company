<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Pertanian',
                'description' => 'Kategori ini mencakup segala hal yang berkaitan dengan pertanian, termasuk teknik bercocok tanam, pemupukan, dan manajemen hasil pertanian.',
                'slug' => 'pertanian',
                'tags' => json_encode(['tanaman', 'bercocok tanam', 'pertanian organik']),
            ],
            [
                'name' => 'Peternakan',
                'description' => 'Kategori ini mencakup informasi mengenai pemeliharaan hewan, jenis-jenis ternak, dan praktik peternakan berkelanjutan.',
                'slug' => 'peternakan',
                'tags' => json_encode(['hewan ternak', 'daging', 'susui']),
            ],
            [
                'name' => 'Perikanan',
                'description' => 'Kategori ini berisi informasi tentang budidaya ikan, pengelolaan kolam, dan teknik perikanan yang berkelanjutan.',
                'slug' => 'perikanan',
                'tags' => json_encode(['ikan', 'kolam', 'budidaya']),
            ],
            [
                'name' => 'Agroforestri',
                'description' => 'Kategori ini menggabungkan pertanian dan kehutanan, dengan fokus pada penggunaan pohon dalam sistem pertanian.',
                'slug' => 'agroforestri',
                'tags' => json_encode(['pohon', 'pertanian', 'keberlanjutan']),
            ],
            [
                'name' => 'Hasil Pertanian',
                'description' => 'Kategori ini berisi informasi mengenai berbagai hasil pertanian, termasuk buah-buahan, sayuran, dan biji-bijian.',
                'slug' => 'hasil-pertanian',
                'tags' => json_encode(['buah', 'sayuran', 'biji-bijian']),
            ],
        ]);
    }
}
