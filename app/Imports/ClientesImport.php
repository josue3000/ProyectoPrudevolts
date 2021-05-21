<?php

namespace App\Imports;

use App\Persona;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Persona([             //a
            'tipo_persona'=> $row[1],    //b
            'nombre'=> $row[2],          //c
            'tipo_documento'=> $row[3],  //d
            'num_documento'=> $row[4],   //e
            'direccion'=> $row[5],       //f
            'coordenadas'=> $row[6],        //g
            'telefono'=> $row[7],           //h
            'email'=> $row[8],   //i
            'fecha_hora'=> $row[9]       //j
        ]);
    }
}
