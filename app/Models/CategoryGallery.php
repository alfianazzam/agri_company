<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model
{
    use HasFactory;

    protected $table = 'category_gallery';

    protected $fillable = [
        'id',
        'name'
    ];

    // Relasi ke galeri
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
