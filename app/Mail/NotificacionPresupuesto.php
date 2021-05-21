<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class NotificacionPresupuesto extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        $venta=DB::table('venta_servicio as v')
        ->join('persona as p','v.id_cliente','=','p.id_persona')
        //->join('detalle_venta as dv','v.id_venta','=','dv.id_venta')
       // ->join('detalle_servicio as ds','v.id_venta','=','ds.id_venta')
        ->join('equipo as e','e.persona','=','p.id_persona')
        ->join('users as u','v.tecnico','=','u.id')
        ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
        ->join('marca as m','e.marca','=','m.id_marca')
        ->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','e.serial','t.nombre as  tipo_equipo','m.nombre as marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos','u.name as tecnico','v.diagnosticoTecnico','v.notas','v.codigo')
        ->where('v.id_venta','=',$this->data)
       // ->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','e.serial','e.tipo_equipo','e.marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos')
        ->first();
        //posiblemete falle el adjuntar el v.importe_total al group by
        $detalles=DB::table('detalle_venta as d')
        ->join('material as a','d.id_material','=','a.id_material')
        ->select('a.nombre as material','d.cantidad_material','d.descuento','d.precio_venta_material')
        ->where('d.id_venta','=',$this->data)
        ->get();
        $detalles_servicio=DB::table('detalle_servicio as ds')
        ->join('servicio as s','ds.id_servicio','=','s.id_servicio')
        ->join('categoria_servicio as cs','cs.id_categoria_servicio','=','s.id_categoria')
        ->select('s.nombre as servicio','ds.descuento_servicio','ds.precio_venta_servicio','cs.nombre as categoria')
        ->where('ds.id_venta','=',$this->data)
        ->get();

        return $this 
        -> from('prudevoltsprueba@gmail.com','PRUDEVOLTS')
         ->view ('emails.notificacionPresupuesto',["venta"=>$venta,"detalles"=>$detalles,"detalles_servicio"=>$detalles_servicio])
        ->subject('Notificacion: Servicio presupuestado')
        ->with($this->data);
    }
}
