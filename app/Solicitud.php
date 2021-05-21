<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
    protected $primaryKey = 'id_solicitud';
    public $timestamps = false;

    protected $filleable =[
        'cliente',
        'estado',
        'descripcion',
        'condicion',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    protected $guarded = [

    ]; 
}
