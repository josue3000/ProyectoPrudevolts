<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    protected $table = 'tipo_equipo';
    protected $primaryKey = 'id_tipo_equipo';
    public $timestamps = false;

    protected $filleable =[
        'nombre',
        'categoria',
        'descripcion',
        'estado'
    ];

    protected $guarded = [

    ]; 
}
