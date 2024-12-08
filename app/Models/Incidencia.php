<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'item',
        'clave',
        'colaborador',
        'fecha_incidencia',
        'fecha_baja',
        'incidencia',
        'observacion',
    ];
}
