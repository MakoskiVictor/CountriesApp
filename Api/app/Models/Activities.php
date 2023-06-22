<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    // Linea 12, 13 y 14 son importantes para la generacion de uuid
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Relaciones de las tablas
    public function countries () {
        return $this->belongsToMany(Countries::class, 'country_activity');
    }
}
