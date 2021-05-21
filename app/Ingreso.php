<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingreso';
    protected $primaryKey = 'id_ingreso';
    public $timestamps = false;

    protected $filleable =[
        'id_proveedor',
        'tipo_comprobante',
        'num_factura',
        'num_autorizacion',
        'fecha_hora',
        'importe_credito_fiscal',
        'estado'
    ];

    protected $guarded = [

    ];
}
