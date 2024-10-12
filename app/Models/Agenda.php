<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas'; // Nama tabel di database

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'status',
        'img_url',
    ];
}
