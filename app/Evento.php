<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'id_evento';
    public $timestamps = false;

    protected $filleable =[
        'id_persona',
        'titulo',
        'descripcion',
        'start',
        'end',
        'color',
        'colorText'
    ];

    protected $guarded = [

    ];

}
