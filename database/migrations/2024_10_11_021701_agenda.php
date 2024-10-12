<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class agenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul agenda
            $table->text('description'); // Deskripsi acara
            $table->dateTime('date'); // Tanggal dan waktu acara
            $table->string('location'); // Lokasi acara
            $table->string('status')->default('upcoming'); // Status acara: upcoming, ongoing, completed
            $table->string('img_url')->nullable(); // URL gambar untuk agenda
            $table->timestamps(); // Created_at dan Updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
