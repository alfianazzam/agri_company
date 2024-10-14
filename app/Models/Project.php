<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumbotron_title',
        'jumbotron_subtitle',
        'jumbotron_image',
        'text_content',
        'client',
        'date',
        'location',
        'website',
        'images',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'images' => 'array', // Cast the images column to an array
        'date' => 'date', // Cast the date column to a date
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryGallery::class);
    }
}
