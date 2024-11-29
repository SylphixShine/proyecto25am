<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actores extends Model
{
    use HasFactory;
    protected $table='actores';
    protected $fillable=['nombre', 'edad', 'part1', 'part2', 'part3', 'nominaciones', 'peliculas', 'foto'];

}
