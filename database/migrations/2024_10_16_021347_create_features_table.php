<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('icon_class'); // To store the icon class, e.g., 'icon-lightbulb'
            $table->string('icon_name');  // To store the readable name of the icon, e.g., 'Lightbulb'
            $table->string('title');      // To store the title of the feature
            $table->text('description');  // To store the description of the feature
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
