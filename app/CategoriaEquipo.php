<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaEquipo extends Model
{
    protected $table = 'categoria_equipo';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;

    protected $filleable =[
        'nombre',
        'descripcion',
        'condicion'
    ];

    protected $guarded = [

    ]; 
}
