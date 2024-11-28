<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductores';

    protected $fillable = [
        'item',
        'clave',
        'nombre',
        'unidad',
        'ingreso',
        'vigencia',
        'licencia',
        'psicofisico',
        'antiguedad_licencia',
        'zona',
        'rol',
        'estatus',
        'tecnologias',
        'telefono',
        'incidencias',
    ];
}
