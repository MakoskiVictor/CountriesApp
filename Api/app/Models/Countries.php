<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    // Linea 12, 13 y 14 son importantes para la generacion de uuid
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Relaciones de las tablas
    public function activities () {
        return $this->belongsToMany(Activities::class, 'country_activity');
    }
}
