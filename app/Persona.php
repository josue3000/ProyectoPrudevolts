<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'id_persona';
    public $timestamps = false;

    protected $filleable =[
        'tipo_persona',
        'nombre'=> 'required',
        'tipo_documento' => 'required',
        'num_documento',
        'direccion'=> 'required',
        'telefono'=>'required',
        'email',
        'coordenadas',
        'fecha_hora'
    ];

    protected $guarded = [

    ]; 
}
