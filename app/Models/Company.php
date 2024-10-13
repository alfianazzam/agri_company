<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'logo_url',
        'description',
        'facebook',
        'instagram',
        'whatsapp',
        'linkedin',
        'twitter', // Add more as needed
    ]; 

    // Assuming you are using a JSON column for social media links
    protected $casts = [
        'social_media' => 'array',
    ];

    public function getSocialMediaAttribute()
    {
        return [
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'whatsapp' => $this->whatsapp,
            'linkedin' => $this->linkedin,
            'twitter' => $this->twitter,
        ];
    }
}
