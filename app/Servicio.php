<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    protected $primaryKey = 'id_servicio';
    public $timestamps = false;

    protected $filleable =[
        'id_categoria',
        'codigo',
        'nombre',
        'descripcion',
        'precio_venta_servicio',
        'estado'
    ];

    protected $guarded = [

    ]; 
}
