<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $primaryKey = 'id_material';
    public $timestamps = false;

    protected $filleable =[
        'id_categoria',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estado',
        'saldo'
    ];

    protected $guarded = [

    ]; 
}
