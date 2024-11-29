<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;
    protected $table='peliculas';
    protected $fillable=['nombre', 'sinopsis', 'genero', 'duracion', 'fecha', 'link', 'clasificacion', 'idiomas', 'foto'];
}
