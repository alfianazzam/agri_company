<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurWorksTable extends Migration
{
    public function up()
    {
        Schema::create('our_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('work_categories');
            $table->string('image_url');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('our_works');
    }
};
