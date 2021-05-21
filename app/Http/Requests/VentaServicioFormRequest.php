<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaServicioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_cliente'=>'required',
            'equipo'=>'required',
           // 'tipo_comprobante'=>'required|max:20',
           'tipo_comprobante'=>'max:20',
            'diagnostico'=>'required',
            'num_factura'=>'numeric',
            'num_autorizacion'=>'max:15',
            //'id_material'=>'numeric',
            //'id_servicio'=>'numeric',
            'equipo'=>'required',
            //'cantidad_material'=>'numeric',
            //'precio_venta_material'=>'numeric',
            //'precio_venta_servicio'=>'numeric',
            //'descuento'=>'numeric',
            //'descuento_servicio'=>'numeric',
            // 'importe_total'=>'required',
            //'total_servicio'=>'numeric',
            //'total_repuestos'=>'numeric',
            //'categoria_servicio'=> 'numeric'
             'tecnico' => 'required'
            
        ];
    }
}
