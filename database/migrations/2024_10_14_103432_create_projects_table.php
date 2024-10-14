<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            
            // Jumbotron fields
            $table->string('jumbotron_title')->nullable(); // Jumbotron title
            $table->string('jumbotron_subtitle')->nullable(); // Jumbotron subtitle
            $table->string('jumbotron_image')->nullable(); // Jumbotron image URL
            
            // Project details
            $table->text('text_content'); // Main text content
            $table->string('client')->nullable(); // Client's name
            $table->date('date')->nullable(); // Date of the project
            $table->string('location')->nullable(); // Location of the project
            $table->string('website')->nullable(); // Website URL

            // Images as JSON array for multiple uploads
            $table->json('images')->nullable(); // To store multiple image URLs
            
            // Foreign keys
            $table->foreignId('user_id')->constrained(); // Foreign key to users table
            $table->foreignId('category_id')->nullable()->constrained('category_gallery'); // Set to null on delete
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
