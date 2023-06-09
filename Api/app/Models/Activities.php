<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    // Relaciones de las tablas
    public function countries () {
        return $this->belongsTo(Countries::class);
    }
}
