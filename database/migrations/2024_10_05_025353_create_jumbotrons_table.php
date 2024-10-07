<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJumbotronsTable extends Migration
{
    public function up()
    {
        Schema::create('jumbotrons', function (Blueprint $table) {
            $table->id();
            $table->string('title');        // Title of the Jumbotron
            $table->string('subtitle');     // Subtitle for the Jumbotron
            $table->string('image_url');    // Path to the uploaded image
            $table->timestamps();           // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('jumbotrons');
    }
}
