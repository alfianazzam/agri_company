<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'img_url', 'user_id', 'category_id'];

    // Relasi many-to-one ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi many-to-one ke Category
    public function category()
    {
        return $this->belongsTo(CategoryPoster::class, 'category_id');
    }

}
