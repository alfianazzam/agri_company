<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branding extends Model
{

     // Override nama tabel yang digunakan oleh model ini
    protected $table = 'branding';  // Secara default, Laravel akan mencari 'brandings', tapi kita ubah menjadi 'branding'
    protected $fillable = ['name', 'logo', 'description'];

    public function posters()
    {
        return $this->hasMany(Poster::class);
    }
}
