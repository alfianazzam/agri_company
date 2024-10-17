<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery'; // Nama tabel di database

    protected $fillable = [
        'title',
        'description',
        'img_url',
        'category_id',
        'user_id',
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(CategoryGallery::class, 'category_id');
    }

    // Relasi ke user (jika ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
