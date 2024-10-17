<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    // Menentukan nama table jika tidak sesuai dengan konvensi Laravel
    protected $table = 'team';

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'role',
        'image',
        'description',
        'social_links',
    ];

    // Jika Anda ingin mengubah format social_links menjadi array saat diambil dari database
    protected $casts = [
        'social_links' => 'array', // Mengonversi JSON ke array
    ];

    // Jika diperlukan, Anda dapat menambahkan relasi dengan model lain
    // Contoh: relasi dengan User jika ada
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}