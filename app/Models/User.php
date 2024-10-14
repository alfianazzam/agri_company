<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi one-to-many ke Poster
    public function posters()
    {
        return $this->hasMany(Poster::class);
    }

    // Relasi one-to-many ke Project
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
