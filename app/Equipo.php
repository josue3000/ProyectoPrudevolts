<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';
    protected $primaryKey = 'id_equipo';
    public $timestamps = false;

    protected $filleable =[
        'persona',
        'serial',
        'tipo_equipo',
        'color',
        'marca',
        'imagen',
        'fecha_hora',
        'estado'
    ];

    protected $guarded = [

    ]; 
}
