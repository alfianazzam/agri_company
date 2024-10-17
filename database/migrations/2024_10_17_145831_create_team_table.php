<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Nama anggota tim
            $table->string('role'); // Peran anggota tim
            $table->string('image'); // URL gambar anggota tim
            $table->text('description'); // Deskripsi anggota tim
            $table->json('social_links'); // Tautan media sosial dalam format JSON
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team');
    }
}