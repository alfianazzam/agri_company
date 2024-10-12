<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agendas')->insert([
            'title' => 'Agro Business Seminar',
            'description' => 'A seminar discussing the latest trends in agro business.',
            'date' => '2024-10-25 10:00:00',
            'location' => 'Agro Business Center, Jakarta',
            'status' => 'upcoming',
            'img_url' => 'images/agro_seminar.jpg',
        ]);
    }
}
