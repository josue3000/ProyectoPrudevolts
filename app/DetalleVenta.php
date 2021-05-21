<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_detalle_venta';
    public $timestamps = false;

    protected $filleable =[
        'id_venta',
        'id_material',
        'cantidad_material',
        'precio_venta_material',
        'descuento'
    ];

    protected $guarded = [

    ];
}
