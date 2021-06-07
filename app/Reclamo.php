<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = 'reclamo';
    protected $primaryKey = 'id_reclamo';
    public $timestamps = false;

    protected $filleable =[
        'cliente',
        'id_servicio',
        'descripcion'=> 'required',
        'fecha_creacion',
        'fecha_actualizacion',
        'estado',
        'condicion'
    ];

    protected $guarded = [

    ]; 
}
