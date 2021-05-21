<?php

namespace App\Exports;

use App\Equipo;
use Maatwebsite\Excel\Concerns\FromCollection;

class EquipoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Equipo::all();
    }
}
