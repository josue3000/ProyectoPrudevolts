<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaServicio extends Model
{
    protected $table = 'categoria_servicio';
    protected $primaryKey = 'id_categoria_servicio';
    public $timestamps = false;

    protected $filleable =[
        'nombre',
        'descripcion',
        'condicion'
    ];

    protected $guarded = [

    ]; 
}
