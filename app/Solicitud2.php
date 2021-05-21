<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud2 extends Model
{
    protected $table = 'solicitudes';
    protected $primaryKey = 'id_solicitud';
    public $timestamps = false;

    protected $filleable =[
        'nombre',
        'telefono',
        'direccion',
        'problema',
        'condicion',
        'estado',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    protected $guarded = [

    ]; 
}
