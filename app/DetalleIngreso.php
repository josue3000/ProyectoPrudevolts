<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table = 'detalle_ingreso';
    protected $primaryKey = 'id_detalle_ingreso';
    public $timestamps = false;

    protected $filleable =[
        'id_ingreso',
        'id_material',
        'cantidad',
        'precio_compra',
        'precio_venta'
    ];

    protected $guarded = [

    ];
}
