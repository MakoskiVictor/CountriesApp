<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    // Relaciones de las tablas
    public function activities () {
        return $this->belongsTo(Activities::class);
    }
}
