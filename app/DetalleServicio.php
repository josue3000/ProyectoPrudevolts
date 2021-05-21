<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
    protected $table = 'detalle_servicio';
    protected $primaryKey = 'id_detalle_servicio';
    public $timestamps = false;

    protected $filleable =[
        'id_venta',
        'id_servicio',
        'precio_venta_servicio',
        'descuento_servicio'
    ];

    protected $guarded = [

    ];
}
