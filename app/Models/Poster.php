<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected $fillable = ['user_id', 'branding_id', 'category_id', 'title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branding()
    {
        return $this->belongsTo(Branding::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

