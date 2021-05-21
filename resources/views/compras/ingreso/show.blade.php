@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            

{{-- CABECERA DEL FORMULARIO LLENADO DE DATOS DE TABLA INGRESO --}}
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="id_proveedor">Proveedor</label>
                       <p>{{$ingreso->nombre}}</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="">Tipo de Comprobante</label>
                       <p>{{$ingreso->tipo_comprobante}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_autorizacion">Número de Autorizacion</label>
                        <p>{{$ingreso->num_autorizacion}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_factura">Numero de Factura</label>
                        <p>{{$ingreso->num_factura}}</p>
                    </div>
                </div>
            </div>


{{-- LLENADO DE LA TABLA F --}}

            <div class="row">   
                <div class="panel panel-primary">
                    <div class="panel-body">
                        
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hoover">
                                <thead style="background-color: #A9d0f5">
                                    {{-- <th>Opciones</th> --}}
                                    <th>Repuesto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    {{-- <th>TOTAL</th> --}}
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">Bs. {{$ingreso->total}}</h4></th>
                                </tfoot>
                                <tbody>
                                    @foreach ($detalles as $det)
                                        <tr>
                                            <td>{{$det->material}}</td>
                                            <td>{{$det->cantidad}}</td>
                                            <td>{{$det->precio_compra}}</td>
                                            <td>{{$det->precio_venta}}</td>
                                            <td>{{$det->cantidad*$det->precio_compra}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                
            </div>
                   
       

        </div>
    </div>



@endsection 

