<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';
    protected $primaryKey = 'id_marca';
    public $timestamps = false;

    protected $filleable =[
        'nombre',
        'descripcion',
        'condicion'
    ];

    protected $guarded = [

    ]; 
}
