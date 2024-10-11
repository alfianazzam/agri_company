<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPoster extends Model
{
    use HasFactory;

    protected $table = 'category_poster'; // Nama tabel baru
    protected $fillable = ['name', 'description', 'slug', 'tags']; // Tambahkan properti yang sesuai

    // Relasi many-to-many ke Poster
    public function posters()
    {
        return $this->belongsToMany(Poster::class, 'category_poster'); 
    }
}
