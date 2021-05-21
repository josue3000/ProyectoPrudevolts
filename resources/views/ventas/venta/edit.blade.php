

@extends('layouts.admin')
@section('contenido')

    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Editar Datos de Venta de Servicio</h3>
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>                            
                        @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

{{-- 
                    {!!Form::open(array('url'=>'ventas/venta','method'=>'PATCH','autocomplete'=>'off' ))!!}
                    {!! Form::token() !!} --}}

                    {!!Form::model($venta, ['method'=>'PATCH', 'route' => ['venta.update' ,$venta->id_venta]])!!}
                    {!! Form::token() !!}
{{-- CABECERA DEL FORMULARIO LLENADO DE DATOS DE TABLA INGRESO --}}
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="id_cliente">Cliente</label>
                        <select name="id_cliente" id="id_cliente" class="form-control selectpicker" data-live-search="true">
                            @foreach ($persona as $per)
                            @if($per->id_persona == $venta->id_cliente)
                                <option value="{{$per->id_persona}}" selected>{{$per->nombre}}</option>
                            @else
                            <option value="{{$per->id_persona}}">{{$per->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    
                    </div>
                </div>

                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                    <div class="form-group">
                        <label for="equipo">Equipo</label>
                        <select name="equipo" id="equipo" class="form-control selectpicker" data-live-search="true">
                            @foreach ($equipo as $equi)
                            @if($equi->id_equipo == $venta->equipo)
                            <option value="{{$equi->id_equipo}}" selected>{{$equi->tipo_equipo}} : {{$equi->nombre}} : {{$equi->serial}} : {{$equi->marca}}</option>
                            @else
                            <option value="{{$equi->id_equipo}}">{{$equi->tipo_equipo}} : {{$equi->nombre}} : {{$equi->serial}} : {{$equi->marca}}</option>
                            @endif
                            @endforeach
                        </select>
                    
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="aux_total_servicio" id="aux_total_servicio" class="form-control" value="{{$venta->total_servicio}}" placeholder="descuento... ">
                    <input type="hidden" name="total_servicio" id="total_servicio" class="form-control"  placeholder="descuento... ">
                    
                    <input type="hidden" name="aux_total_repuestos" id="aux_total_repuestos" class="form-control" value="{{$venta->total_repuestos}}" placeholder="descuento... ">
                    <input type="hidden" name="total_repuestos" id="total_repuestos" class="form-control"  placeholder="descuento... ">
    
                </div>
               

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="diagnostico">Diagnóstico Preliminar </label>
                        <textarea class="form-control" style="height:120px" id="diagnostico" name="diagnostico" placeholder="Diagnóstico del servicio requerido ..."> {{$venta->diagnostico}} </textarea>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="diagnosticoTecnico">Diagnóstico Técnico </label>
                        <textarea class="form-control" style="height:120px" id="diagnosticoTecnico" name="diagnosticoTecnico" placeholder="Diagnóstico Técnico del servicio ..."> {{$venta->diagnosticoTecnico}} </textarea>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="notas">Notas y Observaciones  </label>
                        <textarea class="form-control" style="height:120px" id="notas" name="notas" placeholder="Notas y observaciones..."> {{$venta->notas}} </textarea>
                    </div>
                </div>
{{-- 
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="">Tipo de Comprobante</label>
                        <select name="tipo_comprobante" id="" class="form-control">
                            @if ($venta->tipo_comprobante == "Recibo")
                                <option value="Recibo" selected>Recibo</option>
                                <option value="Factura">Factura</option>
                                <option value="Tiket">Ticket</option>
                           @elseif($venta->tipo_comprobante == "Ticket")
                                <option value="Recibo">Recibo</option>
                                <option value="Factura">Factura</option>
                                <option value="Tiket" selected>Ticket</option>
                            @else
                                <option value="Factura" selected>Factura</option>
                                <option value="Tiket">Ticket</option>
                                <option value="Recibo">Recibo</option>
                           @endif
                        </select>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_autorizacion">Número de Autorización</label>
                        <input type="text" name="num_autorizacion" value="{{$venta->num_autorizacion}}" class="form-control" placeholder="Número de autorizacion...">
                    </div>
                </div> --}}
                {{-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_factura">Numero de Factura</label>
                        <input type="text" name="num_factura" required value="{{$venta->num_factura}}" class="form-control" placeholder="Número de Factura...">
                    </div>
                </div> --}}
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="codigo">Código </label>
                        <input type="text" name="codigo" required value="{{$venta->codigo}}" class="form-control" placeholder="Codigo del servicio ...">
                    </div>
                 </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="">Estado servicio</label>
                        <select name="estado_servicio" id="" class="form-control" style="background-color: #FA8072">
                            
                        @if($venta->estado_servicio=="Reclamo Atendido")
                            <option value="Reclamo Atendido" selected>Reclamo Entregado</option>
                            <option value="Recibido">Recibido</option>
                            <option value="En reparacion">En reparación</option>
                            <option value="Presupuesto">Presupuesto</option>
                            <option value="Listo para Entregar">Listo para Entregar</option>
                            <option value="Entregado">Entregado</option>
                            <option value="Reclamo">Reclamo</option>
                            
                        @elseif($venta->estado_servicio=="Entregado")
                            <option value="Reclamo Atendido">Reclamo Atendido</option>
                            <option value="Entregado" selected>Entregado</option>
                            <option value="En reparacion">En reparacion</option>
                            <option value="Presupuesto">Presupuesto</option>
                            <option value="Listo para Entregar">Listo para Entregar</option>
                            <option value="Reclamo">Reclamo</option>
                            <option value="Recibido">Recibido</option>
                        @elseif($venta->estado_servicio=="Recibido")
                            <option value="Reclamo Atendido">Reclamo Atendido</option>
                            <option value="Entregado" >Entregado</option>
                            <option value="En reparacion">En reparacion</option>
                            <option value="Presupuesto">Presupuesto</option>
                            <option value="Listo para Entregar">Listo para Entregar</option>
                            <option value="Reclamo">Reclamo</option>
                            <option value="Recibido" selected>Recibido</option>
                        @elseif($venta->estado_servicio=="En reparacion")
                            <option value="Reclamo Atendido">Reclamo Atendido</option>
                            <option value="Entregado">Entregado</option>
                            <option value="En reparacion" selected>En reparación</option>
                            <option value="Presupuesto">Presupuesto</option>
                            <option value="Listo para Entregar">Listo para Entregar</option>
                            <option value="Reclamo">Reclamo</option>
                            <option value="Recibido">Recibido</option>
                        @elseif($venta->estado_servicio=="Presupuesto")
                            <option value="Reclamo Atendido">Reclamo Atendido</option>
                            <option value="Entregado">Entregado</option>
                            <option value="En reparacion">En reparacion</option>
                            <option value="Presupuesto" selected>Presupuesto</option>
                            <option value="Listo para Entregar">Listo para Entregar</option>
                            <option value="Reclamo">Reclamo</option>
                            <option value="Recibido">Recibido</option>
                        @elseif($venta->estado_servicio=="Listo para Entregar")
                            <option value="Reclamo Atendido">Reclamo Atendido</option>
                            <option value="Entregado">Entregado</option>
                            <option value="En reparacion">En reparacion</option>
                            <option value="Presupuesto">Presupuesto</option>
                            <option value="Listo para Entregar" selected>Listo para Entregar</option>
                            <option value="Reclamo">Reclamo</option>
                            <option value="Recibido">Recibido</option>
                        @else
                            <option value="Reclamo Atendido">Reclamo Atendido</option>
                            <option value="Entregado">Entregado</option>
                            <option value="En reparacion">En reparación</option>
                            <option value="Presupuesto" >Presupuesto</option>
                            <option value="Listo para Entregar">Listo para Entregar</option>
                            <option value="Reclamo" selected>Reclamo</option>
                            <option value="Recibido">Recibido</option>
                        @endif
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="">Estado Pago</label>
                        <select name="estado_pago" id="" class="form-control" style="background-color: LightSkyBlue">
                            @if ($venta->estado_pago == "Cancelado")
                                <option value="Cancelado" selected>Cancelado</option>
                                <option value="Deuda">Deuda</option>
                                <option value="Presupuesto">Presupuesto</option>
                                <option value="Por Determinar">Por Determinar</option>
                              @elseif($venta->estado_pago == "Deuda")
                                <option value="Cancelado">Cancelado</option>
                                <option value="Deuda" selected>Deuda</option>
                                <option value="Presupuesto">Presupuesto</option>
                                <option value="Por Determinar">Por Determinar</option>
                             @elseif($venta->estado_pago == "Por Determinar")
                                <option value="Cancelado">Cancelado</option>
                                <option value="Deuda" >Deuda</option>
                                <option value="Presupuesto">Presupuesto</option>
                                <option value="Por Determinar" selected>Por Determinar</option>
                            @else
                            <option value="Cancelado">Cancelado</option>
                            <option value="Deuda">Deuda</option>
                            <option value="Presupuesto" selected>Presupuesto</option>
                            <option value="Por Determinar">Por Determinar</option>
                        @endif
                           
                        </select>
                    </div>
                </div>

              
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="tecnico">Técnico Responsable</label>
                        <select name="tecnico" id="tecnico" class="form-control selectpicker" data-live-search="true">
                            @foreach ($tecnicos as $tecnico)
                            @if($tecnico->id == $venta->tecnico)
                                <option value="{{$tecnico->id}}" selected>{{$tecnico->name}}</option>
                            @else
                            <option value="{{$tecnico->id}}">{{$tecnico->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    
                    </div>
                </div>
              
            </div>
{{-- LLENADO DE LA TABLA DE LOS SERVICIOS REALIZADOS  --}}
<div class="row">   
    <div class="panel panel-primary">
        <div class="panel-body">
            <div  style="background-color: rgb(0, 255, 179)">
                <center> <h4>SERVICIOS REALIZADOS </h4> </center> 
             </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="">Categoria de Servicio</label>
                    <select name="categoria_servicio" class="form-control selectpicker" id="categoria_servicio" data-live-search="true">
                        @foreach ($categoria_servicio as $cat)
                        @if($venta->categoria_servicio == $cat->id_categoria_servicio)
                        <option value="{{$cat->id_categoria_servicio}}" selected>{{$cat->nombre}}</option>
                        @else
                        <option value="{{$cat->id_categoria_servicio}}">{{$cat->nombre}}</option>
                        @endif

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="">Servicio</label>
                    <select name="aux_id_servicio" class="form-control selectpicker" id="aux_id_servicio" data-live-search="true">
                        @foreach ($servicios as $ser)
                        <option value="{{$ser->id_servicio}}_{{$ser->precio_venta_servicio}}">{{$ser->nombre}} : {{$ser->categoria}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="precio_venta_servicio">Precio Venta</label>
                    <input type="number" disabled name="aux_precio_venta_servicio" id="aux_precio_venta_servicio" class="form-control" placeholder="precio de venta del servicio ... ">
                </div>
            </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="descuento_servicio">Descuento del servicio</label>
                    <input type="number" name="aux_descuento_servicio" id="aux_descuento_servicio" class="form-control" placeholder="descuento del servicio... ">
                
                </div>
            </div>
           

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                <button type="button" id="bt_add_servicio" class="btn btn-success">Agregar</button>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalles_servicio" class="table table-striped table-bordered table-condensed table-hoover">
                    <thead style="background-color: #A9d0f5">
                        <th>Opciones</th>
                        <th>Servicio</th>
                        <th>Precio Venta</th>
                        <th>Descuento</th>
                        <th>Subtotal</th>
                    </thead>
                    <tfoot>
                        <th>TOTAL servicios</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h4 id="aux_total_servicio_2">Bs/ 0.00</h4></th>
                    </tfoot>
                    <tbody>
                        @foreach ($detalles_servicio as $det_s)
                        <tr class="selected" id="{{'fila_s'.$loop->iteration}}">
                            <td><button type="button" class="btn btn-warning" onclick="eliminar_servicio('{{$loop->iteration}}');">X</button></td>
                            <td><input type="hidden" name="id_servicio[]" value="{{$det_s->id_servicio}}">{{$det_s->servicio}} : {{$det_s->categoria}}</td>
                            <td><input type="number" name="precio_venta_servicio[]" value="{{$det_s->precio_venta_servicio}}"></td>
                            <td><input type="number" name="descuento_servicio[]" value="{{$det_s->descuento_servicio}}"></td>
                            <td><input type="hidden" id="{{'subtotal_s'.$loop->iteration}}" value="{{$det_s->precio_venta_servicio-$det_s->descuento_servicio}}">  {{$det_s->precio_venta_servicio-$det_s->descuento_servicio}}</td>
                        </tr>
                        @if($loop->first)
                        <p class="hidden">  Our first element of the array</p>
                        @endif
                 
                         <p class="hidden"> <input type="hidden" name="id_detalle_servicio[]" value="{{$det_s->id_detalle_servicio}}"> {{ $loop->iteration . '/' . $loop->count }}</p>
                 
                         @if($loop->last)
                         <p class="hidden"> <input type="hidden" id="contador2" value="{{$loop->count}}"> Our last element of the array</p>
                         @endif
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    {{-- </div> --}}

    
{{-- </div> --}}
{{-- LLENADO DE LA TABLA DE LOS REPUESTOS VENDIDOS --}}

            {{-- <div class="row">    --}}
                {{-- <div class="panel panel-primary"> --}}
                    <div class="panel-body">

                        <div style="background-color:  rgb(0, 255, 179)">
                           <center> <h4>REPUESTOS UTILIZADOS </h4> </center> 
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="">Repuesto</label>
                                <select name="aux_id_material" class="form-control selectpicker" id="aux_id_material" data-live-search="true">
                                    @foreach ($materiales as $material)
                                    <option value="{{$material->id_material}}_{{$material->stock}}_{{round($material->precio_promedio,2)}}">{{$material->material}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                                <label for="cantidad_material">Cantidad</label>
                                <input type="number" name="aux_cantidad" id="aux_cantidad" class="form-control" placeholder="cantidad... ">
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" disabled name="aux_stock" id="aux_stock" class="form-control" placeholder="stock... ">
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                                <label for="precio_venta_material">Precio Venta</label>
                                <input type="number" disabled name="aux_precio_venta" id="aux_precio_venta" class="form-control" placeholder="precio de venta... ">
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                                <label for="descuento">Descuento</label>
                                <input type="number" name="aux_descuento" id="aux_descuento" class="form-control" placeholder="descuento... ">
                            
                            </div>
                        </div>
                   
                            

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                            <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hoover">
                                <thead style="background-color: #A9d0f5">
                                    <th>Opciones</th>
                                    <th>Repuesto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th>Descuento</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    <th>TOTAL repuestos</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="aux_total_repuestos_2">Bs/.00</h4></th>
                                </tfoot>
                                {{-- <script>
                                    var cont=0;
                                    total= "$venta->total_repuestos";
                                    subtotal=[];
                                </script> --}}

                                <tbody>
                                  
                                    @foreach ($detalles as $det )
                                    {{-- <tr class="selected" id="fila'{{'fila'.$loop->iteraction}}'"> --}}
                                    <tr class="selected" id="{{'fila'.$loop->iteration}}">
                                        <td><button type="button" class="btn btn-warning" onclick="eliminar('{{$loop->iteration}}');">X</button></td>
                                        <td><input type="hidden" name="id_material[]" value="{{$det->id_material}}" >{{$det->material}}</td>
                                        <td><input type="number" name="cantidad_material[]" value="{{$det->cantidad_material}}"></td>
                                        <td><input type="number" name="precio_venta_material[]" value="{{$det->precio_venta_material}}"></td>
                                        <td><input type="number" name="descuento[]" value="{{$det->descuento}}"></td>
                                        <td><input type="hidden" name="subtotal[]" id="{{'subtotal'.$loop->iteration}}" value="{{$det->cantidad_material*$det->precio_venta_material-$det->descuento}}"> {{$det->cantidad_material*$det->precio_venta_material-$det->descuento}}</td>
                                    </tr>
                                    @if($loop->first)
                                    <p class="hidden"> Our first element of the array</p>
                                    @endif
                             
                                     <p class="hidden"> <input type="hidden" name="id_detalle_venta[]" value="{{$det->id_detalle_venta}}">  {{ $loop->iteration . 'fila' . $loop->count }}</p>
                             
                                     @if($loop->last)
                                     <p class="hidden"><input type="hidden" id="contador" value="{{$loop->count}}">Our last element of the array</p>
                                     @endif
                                {{-- <script>
                                    subtotal[cont] = $('#subtotal1');
                                    cont++;

                                    console.log("el subtotal es: "+subtotal[cont]);
                                </script> --}}

                                 @endforeach
                                </tbody>

                            </table>
                        </div>

                        {{-- <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12"> --}}
                            <label  class="col-lg-2 col-sm-2 col-md-2 col-xs-12" for="importe_total">IMPORTE TOTAL: Bs/.</label>
                            <div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12" >
                                <input type="text" name="importe_total" id="importe_total" class="form-control" placeholder="Importe Total del servicio y repuestos ... " >
                            </div>

                            <label  class="col-lg-2 col-sm-2 col-md-2 col-xs-12" for="importe_total" hidden>IMPUESTOS: Bs/.</label>
                            <div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12" hidden>
                                <input type="text" name="debito_fiscal" id="debito_fiscal" class="form-control" placeholder="Impuestos ... " >
                            </div>
                        {{-- </div> --}}

                    </div>

                   
                </div>



                {{-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar"> --}}
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                    <div class="form-group">
                        <input name="_token" value="{{ csrf_token() }}" type="hidden">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>

                    </div>
                </div>
            </div>
                   


                    {!! Form::close() !!}

        </div>
    </div>

@push ('scripts')



<script>
    $(document).ready(function()
    {
        $('#bt_add').click(function(){
            agregar();
            actualizar_total();
        });
    
    });





    var cont= $("#contador").val()+1;
    total= $('#aux_total_repuestos').val();
    $("#aux_total_repuestos_2").html("Bs/."+total);
    $("#total_repuestos").val(total);
    impuesto=0;
    subtotal=[];
   //subtotal = $('#subtotal');

    for(var i=1; i<=$("#contador").val() ;i++)
    {
        subtotal[i]= $("#subtotal"+i).val();
    }
    



    $("#guardar").hide();
    $("#aux_id_material").change(mostrarValores);

    function mostrarValores()
    {
        datosMaterial=document.getElementById('aux_id_material').value.split('_');
        $("#aux_precio_venta").val(datosMaterial[2]);
        $("#aux_stock").val(datosMaterial[1]);
    }
    
    function agregar()
    {

        datosMaterial=document.getElementById('aux_id_material').value.split('_');
       
        id_material=datosMaterial[0];
        material=$("#aux_id_material option:selected").text();
        cantidad_material = $("#aux_cantidad").val();
        descuento=$("#aux_descuento").val();
        precio_venta_material=$("#aux_precio_venta").val();
        stock=$("#aux_stock").val();

        if (id_material!="" && material!="" && cantidad_material!="" && cantidad_material>0 && descuento!="" && precio_venta_material!="")
        {
            if((stock*1) >= (cantidad_material*1))
            {
            subtotal[cont]=(cantidad_material*precio_venta_material-descuento);
            total=(total*1)+(subtotal[cont]*1);
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_material[]" value="'+id_material+'">'+material+'</td><td><input type="number"  name="cantidad_material[]" value="'+cantidad_material+'"></td><td><input type="number"  name="precio_venta_material[]" value="'+precio_venta_material+'"></td><td><input type="number"  name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpiar();
            $("#aux_total_repuestos_2").html("Bs/."+total);
            $("#aux_total_repuestos").val(total);
            $("#total_repuestos").val(total);
            evaluar();
            $('#detalles').append(fila);
            }
            else
            {
                alert('la cantidad de repuestos a vender supera el stock');
            }
          
            
        }
        else
        {
            alert("Error al ingresar el detalle de la venta, revise los datos del repuesto");
        }
    }
    function limpiar()
    {
        $("#aux_cantidad").val("");    
        $("#aux_stock").val(""); 
        $("#aux_descuento").val("");   
        $("#aux_precio_venta").val("");          
    }

    function evaluar ()
    {
        if(total>0)
        {
            $("#guardar").show();
        }
        else
        {
            $("#guardar").hide();
        }
    } 
    
    function eliminar(index)
    {
        total=(total*1)-(subtotal[index]*1);
        $("#aux_total_repuestos_2").html("Bs/. "+total);
        $("#aux_total_repuestos").val(total);
        $("#total_repuestos").val(total);
        $("#fila" + index).remove();
        evaluar();
        actualizar_total();
        console.log("el subtotal es: "+subtotal[cont]);
        console.log("el total es: "+total+"  contador en :"+cont);
    }
    
</script>









{{-- codigo javaScrip para el llenado de la tabla de servicios  --}}
    <script>
 $(document).ready(function()
        {
            $('#bt_add_servicio').click(function(){
                agregar_servicio();
                actualizar_total();
            });
        });

        var conta=$('#contador2').val();
        total_s=$('#aux_total_servicio').val();
        $("#aux_total_servicio_2").html("Bs/. "+total_s);
        $("#total_servicio").val(total_s);
        subtotal_s=[];

        


           total_todo=(total_s*1)+(total*1);
           $('#importe_total').val(total_todo); 
           impuesto = (total_todo*0.16);
           $('#debito_fiscal').val(impuesto);
           conta=conta+1;


        for(var j=1; j<=$('#contador2').val() ; j++)
        {
            subtotal_s[j] = $('#subtotal_s'+j).val();
        }

        $("#guardar").hide();
        $("#aux_id_servicio").change(mostrarValores_servicio);

        function mostrarValores_servicio()
        {
            datosServicio=document.getElementById('aux_id_servicio').value.split('_');
            $("#aux_precio_venta_servicio").val(datosServicio[1]);
           
        }
        
        function agregar_servicio()
        {

            datosServicio=document.getElementById('aux_id_servicio').value.split('_');
           
            id_servicio=datosServicio[0];
            servicio=$("#aux_id_servicio option:selected").text();
            //cantidad_material = $("#aux_cantidad").val();
            descuento_servicio=$("#aux_descuento_servicio").val();
            precio_venta_servicio=$("#aux_precio_venta_servicio").val();
            // stock=$("#aux_stock").val();

            if (id_servicio!="" && servicio!=""  && descuento_servicio!="" && precio_venta_servicio!="")
            {
                
                subtotal_s[conta]=(precio_venta_servicio*1)-(descuento_servicio*1);
                total_s=(total_s*1)+(subtotal_s[conta]*1);
                var fila_s='<tr class="selected" id="fila_s'+conta+'"><td><button type="button" class="btn btn-warning" onclick="eliminar_servicio('+conta+');">X</button></td><td><input type="hidden"  name="id_servicio[]" value="'+id_servicio+'">'+servicio+'</td><td><input type="number"  name="precio_venta_servicio[]" value="'+precio_venta_servicio+'"></td><td><input type="number"  name="descuento_servicio[]" value="'+descuento_servicio+'"></td><td>'+subtotal_s[conta]+'</td></tr>';
                conta++;
                limpiar_servicio();
                $("#aux_total_servicio_2").html("Bs/."+total_s);
                $("#aux_total_servicio").val(total_s);
                $("#total_servicio").val(total_s);
                evaluar_servicio();
                $('#detalles_servicio').append(fila_s);
                
            }
            else
            {
                alert("Error al ingresar el detalle de servicios, revise los datos del servicio");
            }
        }
        function limpiar_servicio()
        {
            //$("#aux_cantidad").val("");    
            //$("#aux_stock").val(""); 
            $("#aux_descuento_servicio").val("");   
            $("#aux_precio_venta_servicio").val("");          
        }

        function evaluar_servicio ()
        {
            if(total_s>0)
            {
                $("#guardar").show();
            }
            else
            {
                $("#guardar").hide();
            }
        } 
        function eliminar_servicio(index)
        {
            total_s=(total_s*1)-(subtotal_s[index]*1);
            $("#aux_total_servicio_2").html("Bs/. "+total_s);
            $("#aux_total_servicio").val(total_s);
            $("#total_servicio").val(total_s);
            $("#fila_s" + index).remove();
            evaluar_servicio();
            actualizar_total();
        }



var total_todo=0;
        function actualizar_total()
        {
            total_todo=(total_s*1)+(total*1);
           $('#importe_total').val(total_todo); 
           impuesto = (total_todo*0.16);
           $('#debito_fiscal').val(impuesto); 
        }
// var cont_t=0;

//         function agregar_totales(index)
//         {
//             if(total!= "" && total_s = "" )
//             {
//                 total_todo = total_s+total;
//                 var fila_t='<tr class="selected" id="fila'+cont_t+'"><td>'+total_s+'</td><td>'+total+'</td><td>'+total_t+'</td></tr>';
//                 $('#totales').append(fila_s);
//                 cont_t++;
//             }
//             else
//             {
//                 alert("totales vacios");
//             }
//         }

//         function limpiar_totales(index)
//         {
//             total_todo=total_s-subtotal_s[index];
//             $("#total_servicio").html("Bs/. "+total_s);
//             $("#importe_total").val(total_s);
//             $("#fila_t" + index).remove();
//             evaluar_servicio();
//         }
    </script>

{{-- llenado de los valores de detallles de venta y servicios iniciales  --}}

{{-- // cont_ss=0;
// subtotal_ss=0;
         

//             while(cont_ss< count($'detalles_servicio'))
//             {
//                 subtotal_ss = $detalles_servicio->precio_venta_servicio - $detalles_servicio->descuento_servicio;
//                 var fila_s='<tr class="selected" id="fila_ss'+cont_ss+'"><td><button type="button" class="btn btn-warning" onclick="eliminar_servicio('+cont_ss+');">X</button></td><td><input type="hidden"  name="id_servicio[]" value="'+$detalles_servicio->id_servicio+'">'+$detalles_servicio->servicio+'</td><td><input type="number"  name="precio_venta_servicio[]" value="'+$detalles_servicio->precio_venta_servicio+'"></td><td><input type="number"  name="descuento_servicio[]" value="'+$detalles_servicio->descuento_servicio+'"></td><td>'+subtotal_s[cont_ss]+'</td></tr>';
//                 cont_ss++;
//                 id_de_se=$detalles_servicio->id_detalle_servicio;
//                 $('#detalles_servicio').append(fila_s);
//             }
         
// cont_vv=0;
// subtotal_vv=0;


//             while(cont_vv < count('$detalles'))
//             {
//                 subtotal_vv = $('detalles->precio_venta_material') - $('detalles->descuento');
//                 var fila='<tr class="selected" id="fila'+cont_vv+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont_vv+');">X</button></td><td><input type="hidden" name="id_material[]" value="{{$detalles->id_material}}">{{$detalles->material}}</td><td><input type="number"  name="cantidad_material[]" value="{{$detalles->cantidad_material}}"></td><td><input type="number"  name="precio_venta_material[]" value="{{$detalles->precio_venta_material}}"></td><td><input type="number"  name="descuento[]" value="{{$detalles->descuento}}"></td><td>'+subtotal_vv[cont_vv]+'</td></tr>';
//                 cont_ss++;
//                 id_de_ve='$detalles->id_detalle_venta';
//                 $('#detalles').append(fila);
//             }
        
 --}}

@endpush

@endsection 

