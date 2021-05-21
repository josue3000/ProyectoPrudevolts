<?php

namespace App\Exports;

use App\VentaServicio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ServiciosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ventas =DB::table('venta_servicio as v')
        ->join('persona as p','v.id_cliente','=','p.id_persona')
        ->join('users as u','v.tecnico','=','u.id')

        ->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
        //->where('p.nombre','LIKE','%'.$query.'%')
        //->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
        //->where('v.estado_servicio','=','En Reparacion')
        ->where('condicion','=','1')

        ->orderBy('v.id_venta','desc')
        ->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
        //->paginate(10);
        ->get();
        //return VentaServicio::all();
        return $ventas;
    }
}
