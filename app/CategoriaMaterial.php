<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Codec\TimestampFirstCombCodec;

class CategoriaMaterial extends Model
{
    protected $table = 'categoria_material';
    protected $primaryKey = 'id_categoria_material';
    public $timestamps = false;

    protected $filleable =[
        'nombre',
        'descripcion',
        'condicion'
    ];

    protected $guarded = [

    ]; 
}
