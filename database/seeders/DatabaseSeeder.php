<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the PostersTableSeeder
        $this->call(PostersTableSeeder::class);
         $this->call(BrandingsTableSeeder::class);
    }
}
