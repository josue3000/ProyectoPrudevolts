@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            

{{-- CABECERA DEL FORMULARIO LLENADO DE DATOS DE TABLA INGRESO --}}

<div class="x_content"> 
    <section class="content invoice">
        <div class="row">
            <div class="col-xs-12 invoice-header">
              <h1>
                              <i class="fa fa-globe"></i> 
                              <small class="pull-right">Fecha: {{$venta->fecha_actual}}</small>
                          </h1>
            </div>
          </div>

          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              
              <address>
                              <strong>Prudevolts.</strong>
                              <br>Zona Alto Irpavi,Av.Jorge Muñoz Reyes # 18A
                              <br>La Paz - Bolivia
                              <br>Teléfono: 2-2796576
                              <br>Teléfono: 70626476
                              <br>Teléfono: 61157300
                              <br>Email: prude.volts@gmail.com
             </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              
              <address>
                              <strong>Cliente:</strong>
                              <br>{{$venta->nombre}}
                              <br><strong>Equipo:</strong>
                              <br>{{$venta->tipo_equipo}} : {{$venta->serial}} : {{$venta->marca}}
                              <br><strong>Diagnóstico Preliminar:</strong>
                              <br>{{$venta->diagnostico}}
                              <br><strong>Diagnóstico Técnico:</strong>
                              <br>{{$venta->diagnosticoTecnico}}
                              <br><strong>Notas y observaciones:</strong>
                              <br>{{$venta->notas}}
                              
                              
                              {{-- <strong>Diagnostico:</strong>
                              <br>Email: jon@ironadmin.com --}}
             </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Codigo de servicio: {{$venta->codigo}}</b>
              <br>
              {{-- <b>Factura# {{$venta->num_factura}}</b>
              <br>
              <b>Autorización: {{$venta->num_autorizacion}}</b>
              <br> --}}
              <br><strong>Técnico Responsable:</strong>
              <br>{{$venta->tecnico}}
              <br>
              <b>Estado Servicio:</b> {{$venta->estado_servicio}}
              <br>
              <b>Estado Pago:</b> {{$venta->estado_pago}}
              <br>
              {{-- <b>Account:</b> 968-34567 --}}
            </div>
            <!-- /.col -->
          </div>

    </section>
</div>












{{-- 
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="id_cliente">Cliente:</label>
                       <p>{{$venta->nombre}}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="equipo">Equipo:</label>
                       <p>{{$venta->tipo_equipo}} : {{$venta->nombre}} : {{$venta->serial}}</p>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="diagnostico">Diagnostico:</label>
                       <p>{{$venta->diagnostico}}</p>
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="estado_pago">Estado pago:</label>
                       <p>{{$venta->estado_pago}}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="estado_servicio">Estado Servicio:</label>
                       <p>{{$venta->estado_servicio}} </p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="">Tipo de Comprobante:</label>
                       <p>{{$venta->tipo_comprobante}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_autorizacion">Número de Autorizacion:</label>
                        <p>{{$venta->num_autorizacion}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_factura">Numero de Factura:</label>
                        <p>{{$venta->num_factura}}</p>
                    </div>
                </div>
            </div> --}}


            



            <div class="row">   
                <div class="panel panel-primary">
                    <div class="panel-body">


                        {{-- LLENADO de la tabla de servicios --}}

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="table-responsive">
                <table id="detalles_servicio" class="table table-striped table-bordered table-condensed table-hoover">
                    <thead style="background-color: #A9d0f5">
                        {{-- <th>Opciones</th> --}}
                        <th>Servicio</th>
                        <th>Precio Venta</th>
                        <th>Descuento</th>
                        <th>Subtotal</th>
                    </thead>
                    <tfoot>
                        {{-- <th>TOTAL</th> --}}
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                        <th><h4 id="total_servicio">Bs. {{$venta->total_servicio}}</h4></th>
                    </tfoot>
                    <tbody>
                        @foreach ($detalles_servicio as $det_s)
                            <tr>
                                <td>{{$det_s->servicio}} : {{$det_s->categoria}}</td>
                                <td>{{$det_s->precio_venta_servicio}}</td>
                                <td>{{$det_s->descuento_servicio}}</td>
                                <td>{{$det_s->precio_venta_servicio-$det_s->descuento_servicio}}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            </div>



                  {{-- LLENADO DE LA TABLA detallede venta --}}
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="table-responsive">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hoover">
                                <thead style="background-color: #A9d0f5">
                                    {{-- <th>Opciones</th> --}}
                                    <th>Repuesto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th>Precio Descuento</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    {{-- <th>TOTAL</th> --}}
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total_venta">Bs. {{$venta->total_repuestos}}</h4></th>
                                </tfoot>
                                <tbody>
                                    @foreach ($detalles as $det)
                                        <tr>
                                            <td>{{$det->material}}</td>
                                            <td>{{$det->cantidad_material}}</td>
                                            <td>{{$det->precio_venta_material}}</td>
                                            <td>{{$det->descuento}}</td>
                                            <td>{{$det->cantidad_material*$det->precio_venta_material-$det->descuento}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        </div>
{{-- 
                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <label for="importe_total">Importe Total Bs.</label>
                            
                               
                                <h4>{{$venta->importe_total}}</h4>
                            
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <label for="importe_total">Impuestos Bs.</label>
                            
                                
                                <h4>{{$venta->debito_fiscal}}</h4>
                            
                        </div> --}}




                        <div class="form-group">
                            <h4><label class="col-sm-4 control-label" for="importe_total">Importe Total Bs.   {{$venta->importe_total}}</label></h4>
                            {{-- <div class="col-sm-2"> --}}
                              {{-- <input type="text" class="form-control" id="title" name="title"> --}}
                            
                            {{-- </div> --}}
                        </div>

                        <div class="form-group" hidden>
                            <h4><label class="col-sm-4 control-label" for="importe_total">Impuestos Bs. {{$venta->debito_fiscal}}</label></h4>
                            {{-- <div class="col-sm-2"> --}}
                              {{-- <input type="text" class="form-control" id="title" name="title"> --}}
                              
                            {{-- </div> --}}
                        </div>


                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                {{-- <a href="{{ route('venta.pdf',$venta->id_venta) }}"><button type="button" class="btn btn-success"  ><i class="fa fa-print"></i>  Imprimir</button></a> --}}
                                <button type="button" class="btn btn-success ocultar-al-imprimir" onclick="window.print();" ><i class="fa fa-print"></i>  Imprimir</button>
                            </div>
                        </div>

                          {{-- <a href="{{ URL::action('VentaServicioController@imprimir',$venta->id_venta) }}"><button type="button" class="btn btn-success" onclick="window.print();" ><i class="fa fa-print"></i>  Imprimir</button></a> --}}

                    </div>
                </div>

                
            </div>
                   
       

        </div>
    </div>



@endsection 

