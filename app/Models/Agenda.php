<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // Method untuk menentukan status secara otomatis berdasarkan tanggal
    public function getStatusAttribute()
    {
        $now = Carbon::now();
        $eventDate = Carbon::parse($this->date); // Pastikan date diubah menjadi objek Carbon

        if ($eventDate > $now) {
            return 'upcoming';
        } elseif ($eventDate <= $now && $eventDate->copy()->addHours(2) > $now) { // Salin eventDate sebelum menambah jam
            return 'ongoing';
        } else {
            return 'completed';
        }
    }
}


