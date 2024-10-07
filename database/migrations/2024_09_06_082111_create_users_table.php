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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama pengguna
            $table->string('username')->unique(); // Username unik
            $table->string('email')->unique(); // Email unik
            $table->string('password'); // Password
            $table->string('role')->default('user'); // Peran pengguna dengan default 'user'
            $table->timestamp('email_verified_at')->nullable(); // Tanggal verifikasi email
            $table->rememberToken(); // Token untuk fitur "remember me"
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
