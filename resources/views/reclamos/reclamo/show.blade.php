@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">
        <div class="x_content"> 
            <section class="content invoice">
                <div class="row">
                    <div class="col-xs-12 invoice-header">
                        <h1>
                                        <i class="fa fa-globe"></i> 
                                        <small class="pull-right">Fecha de registro: {{$cliente->fecha_actualizacion}}</small>
                        </h1>
                      </div>

                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          
                          <address>
                                          <strong><h4>Datos del Cliente</h4></strong>
                                          <br>Cliente: {{$cliente->cliente}}
                                          <br>Dirección: {{$cliente->direccion}}
                                          <br>Teléfono: {{$cliente->telefono}}
                                          
                                          
                         </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          
                          <address>
                                          <strong><h4>Datos del reclamo</h4></strong>
                                          
                                          <br> <strong>Descripcion:</strong>{{$cliente->descripcion}}
                                          
                                          <br><strong>Estado:</strong>{{$cliente->estado}} 
                                          
                                          <br><strong>Servicio:</strong>{{$cliente->id_servicio}} 
                                          
                         </address>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            {{-- <a href="{{ route('venta.pdf',$venta->id_venta) }}"><button type="button" class="btn btn-success"  ><i class="fa fa-print"></i>  Imprimir</button></a> --}}
                            <button type="button" class="btn btn-success" onclick="window.print();" ><i class="fa fa-print"></i>  Imprimir</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
     
    </div>
</div>
@endsection 