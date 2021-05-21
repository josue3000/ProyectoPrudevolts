@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   <center><h3>Creación de un nuevo registro de Servicio</h3></center> 
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

            <div class="clearfix"></div>
                    {{-- {!!Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off' ))!!} --}}
                          
                    {!!Form::open(array('route'=>'ventaServicio.store','method'=>'POST','autocomplete'=>'off' ))!!}
                    {!! Form::token() !!}  
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2> <small>Creación de un nuevo registro de servicio </small></h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                  </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
          
          







                            <div class="x_content" >
              
                              <!-- Tabs -->
                              <div id="wizard_verticle" class="form_wizard wizard_verticle" >
                                <ul class="list-unstyled wizard_steps">
                                  {{-- <li>
                                    <a href="#step-11">
                                      <span class="step_no">1</span>
                                    </a>
                                  </li> --}}
                                  {{-- <li>
                                    <a href="#step-22">
                                      <span class="step_no">2</span>
                                    </a>
                                  </li> --}}
                                  <li>
                                    <a href="#step-33">
                                      <span class="step_no">3</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#step-44">
                                      <span class="step_no">4</span>
                                    </a>
                                  </li>
                                  
                                </ul>
          {{-- 1er paso seleccion de un cliente o la creacion de uno nuevo  --}}
                                {{-- <div id="step-11">
                                  <h2 class="StepTitle">Paso 1 Seleccione el cliente o cree uno nuevo y seleccionelo</h2>
                                  <form class="form-horizontal form-label-left">
                                    <span class="section"><small>Seleccione un cliente</small> </span>
                                    

                                    @include('ventas.venta.cliente')

                                   
                                    
                                   
 
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <span class="section"><small>O Registre un nuevo cliente un nuevo cliente</small> </span>
                                    </div>

                                    <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
                                        <div class="form-group pull-right">
                                          
                                           <a href="../cliente/create2"><button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Nuevo Registro</button></a> 
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <span class="section"><small>Nota: Al registrar un nuevo cliente el sistema lo redireccionará a un formulario de registro de equipo!
                                        </small> </span>
                                    </div>
                                  </form>
                                </div> --}}


                               
                                {{-- 2do paso seleccion de un equipo o la creacion de uno nuevo  --}}
                                {{-- <div id="step-22">
                                    <span class="section"><small>Seleccione un Equipo</small> </span>
                                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                        <div class="form-group">
                                            <label for="equipo">Equipo</label>
                                            <select name="equipo" id="equipo" class="form-control selectpicker" data-live-search="true">
                                                @foreach ($equipos as $equi)
                                                <option value="{{$equi->id_equipo}}">{{$equi->tipo_equipo}} : {{$equi->nombre}} : {{$equi->serial}}: {{$equi->marca}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                      
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <span class="section"><small>O Registre un nuevo Equipo</small> </span>
                                    </div>

                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <th>Nombre</th>
                                            <th>Opcion</th>
                                        </thead>
                                        @foreach ($propietarios as $prop)
                                        <tr>
                                            <td>{{ $prop->nombre}}</td>
                                            <td><a href={{url("ventas/equipo/create3",$prop->id_persona)}}><button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Nuevo Registro</button></a> 
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                   


                                   

                                  
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <span class="section"><small>Nota: Al registrar un nuevo Equipo el sistema lo redireccionará al inicio del formulario, porque actualizará la información guardada!</small> 
                                        </span>
                                    </div>

                                </div> --}}
                                <div id="step-33">
                                  <h3 class="StepTitle">Paso 3, seleccione la Categoría de servicio y el técnico responsable</h3>
                                  
                                  
                
                                 {{-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Tipo de Comprobante</label>
                                        <select name="tipo_comprobante" id="" class="form-control">
                                            
                                                <option value="Recibo">Recibo</option>
                                                <option value="Factura">Factura</option>
                                                <option value="Tiket">Tiket</option>
                                           
                                        </select>
                                    </div>
                                 </div> --}}
                                 {{-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="num_autorizacion">Número de Autorización</label>
                                        <input type="text" name="num_autorizacion" value="{{old('num_autorizacion')}}" class="form-control" placeholder="Número de autorizacion...">
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="num_factura">Numero de Factura</label>
                                        <input type="text" name="num_factura" required value="{{old('num_factura')}}" class="form-control" placeholder="Número de Factura...">
                                    </div>
                                 </div> --}}

                                 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="codigo">Código </label>
                                        <input type="text" name="codigo"  value="{{$ultimo->id_venta + 1}}-{{$personas->telefono}}" class="form-control" placeholder="Codigo del servicio ...">
                                    </div>
                                 </div>

                                 {{-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="num_factura">Numero de Factura</label>
                                        <input type="text" name="num_factura" required value="{{old('num_factura')}}" class="form-control" placeholder="Número de Factura...">
                                    </div>
                                 </div> --}}



                
                                 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Estado servicio</label>
                                        <select name="estado_servicio" id="" class="form-control" style="background-color: #FA8072">
                                                
                                                <option value="Recibido" selected>Recibido</option>
                                                <option value="Presupuesto">Presupuesto</option>
                                                <option value="En reparacion">En reparación</option>
                                                <option value="Listo para Entregar">Listo para Entregar</option>
                                                <option value="Entregado">Entregado</option>
                                                <option value="Reclamo">Reclamo</option>
                                                <option value="Reclamo Atendido">Reclamo Atendido</option>
                                           
                                        </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Estado Pago</label>
                                        <select name="estado_pago" id="" class="form-control" style="background-color: LightSkyBlue">
                                            
                                                <option value="Cancelado">Cancelado</option>
                                                <option value="Deuda">Deuda</option>
                                                <option value="Presupuesto">Presupuesto</option>
                                                <option value="Por Determinar" selected>Por Determinar</option>
                                           
                                        </select>
                                    </div>
                                 </div>
                
                                 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Técnico Responsable</label>
                                        <select name="tecnico" id="tecnico" class="form-control selectpicker" data-live-search="true">
                                            @foreach ($tecnicos as $tecnico)
                                            <option value="{{$tecnico->id}}">{{$tecnico->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 </div>
                                  

                                 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="diagnostico">Diagnóstico Preliminar</label>
                                        <textarea class="form-control" style="height:120px" id="diagnostico" name="diagnostico" placeholder="Diagnóstico preliminar del servicio requerido ..."></textarea>
                                    </div>
                                  </div>

                                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="diagnosticoTecnico">Diagnóstico Técnico</label>
                                        <textarea class="form-control" style="height:120px" id="diagnosticoTecnico" name="diagnosticoTecnico" placeholder="Diagnóstico tecnico del servicio requerido ..."></textarea>
                                    </div>
                                  </div>

                                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="notas">Notas y Observaciones</label>
                                        <textarea class="form-control" style="height:120px" id="notas" name="notas" placeholder="Notas y Observaciones ..."></textarea>
                                    </div>
                                  </div>

                             </div>


                                <div id="step-44">
                                  <h2 class="StepTitle">Paso 4 seleccionar los servicios y repuestos utilizados</h2>
                                  
{{-- CABECERA DEL FORMULARIO LLENADO DE DATOS DE TABLA INGRESO --}}
<div class="row">
    {{-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="form-group">
            <label for="id_cliente">Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-control selectpicker" data-live-search="true">
                @foreach ($personas as $persona)
                <option value="{{$persona->id_persona}}">{{$persona->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div> --}}

    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12" hidden>
        <div class="form-group">
            <label for="id_cliente">Cliente ID</label>
            <input type="text" name="id_cliente" value="{{$personas->id_persona}}" class="form-control" placeholder="cliente ...">
        </div>
     </div>
     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" hidden>
        <div class="form-group">
            <label for="">Cliente</label>
            <input type="text" name="" value="{{$personas->nombre}}" class="form-control" placeholder="cliente ...">
        </div>
     </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" hidden>
        <div class="form-group">
            <label for="equipo">Equipo</label>
            <select name="equipo" id="equipo" class="form-control selectpicker" data-live-search="true">
                @foreach ($equipos as $equi)
                <option value="{{$equi->id_equipo}}">{{$equi->tipo_equipo}} : {{$equi->nombre}} : {{$equi->serial}}: {{$equi->marca}}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
        <div class="form-group">
            <label for="equipo">Equipo</label>
            <select name="equipo" id="equipo" class="form-control selectpicker" data-live-search="true">
                @foreach ($equipos as $equi)
                <option value="{{$equi->id_equipo}}">{{$equi->tipo_equipo}} : {{$equi->nombre}} : {{$equi->serial}}: {{$equi->marca}}</option>
                @endforeach
            </select>
        
        </div>
    </div> --}}


    <div class="form-group">
        {{-- <input type="hidden" name="aux_total_servicio" id="aux_total_servicio" class="form-control" value="{{$venta->total_servicio}}" placeholder="descuento... "> --}}
        <input type="hidden" name="total_servicio" id="total_servicio" class="form-control"  placeholder="descuento... ">
        
        {{-- <input type="hidden" name="aux_total_repuestos" id="aux_total_repuestos" class="form-control" value="{{$venta->total_repuestos}}" placeholder="descuento... "> --}}
        <input type="hidden" name="total_repuestos" id="total_repuestos" class="form-control"  placeholder="descuento... ">

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
            @foreach ($categoria_servicios as $cat)
            <option value="{{$cat->id_categoria_servicio}}">{{$cat->nombre}}</option>
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
        <label for="descuento_servicio">Descuento</label>
        <input type="number" name="aux_descuento_servicio" id="aux_descuento_servicio" class="form-control" placeholder="descuento del servicio... " value="0">
    
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
            <th><h4 id="aux_total_servicio">Bs/. 0.00</h4></th>
        </tfoot>
        <tbody>

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
                    <input type="number" name="aux_descuento" id="aux_descuento" class="form-control" placeholder="descuento... " value="0">
                
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
                        <th><h4 id="aux_total_repuestos">Bs/. 0.00</h4></th>
                    </tfoot>
                    <tbody>

                    </tbody>

                </table>
            </div>

            {{-- <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12"> --}}
                <label  class="col-lg-2 col-sm-2 col-md-2 col-xs-12" for="importe_total">IMPORTE TOTAL: Bs/.</label>
                <div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12" >
                    <input type="text" name="importe_total" id="importe_total" class="form-control" placeholder="Importe Total del servicio y repuestos ... ">
                </div>

                <label  class="col-lg-2 col-sm-2 col-md-2 col-xs-12" for="importe_total">IMPUESTOS: Bs/.</label>
                <div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12" >
                    <input type="text" name="debito_fiscal" id="debito_fiscal" class="form-control" placeholder="Impuestos ... ">
                </div>
            {{-- </div> --}}

        </div>

       
    </div>



    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
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
                              <!-- End SmartWizard Content -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  {{-- </div> --}}
            


                   
               

                    

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

        var cont=0;
        total=0;
        impuesto=0;
        subtotal=[];

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
                total=total+subtotal[cont];
                var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_material[]" value="'+id_material+'">'+material+'</td><td><input type="number"  name="cantidad_material[]" value="'+cantidad_material+'"></td><td><input type="number"  name="precio_venta_material[]" value="'+precio_venta_material+'"></td><td><input type="number"  name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
                cont++;
                limpiar();
                $("#aux_total_repuestos").html("Bs/."+total);
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
            total=total-subtotal[index];
            $("#aux_total_repuestos").html("Bs/. "+total);
            $("#total_repuestos").val(total);
            $("#fila" + index).remove();
            evaluar();
            actualizar_total();
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

        var conta=0;
        total_s=0;
        subtotal_s=[];

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
                
                subtotal_s[conta]=(precio_venta_servicio-descuento_servicio);
                total_s=total_s+subtotal_s[conta];
                var fila_s='<tr class="selected" id="fila_s'+conta+'"><td><button type="button" class="btn btn-warning" onclick="eliminar_servicio('+conta+');">X</button></td><td><input type="hidden"  name="id_servicio[]" value="'+id_servicio+'">'+servicio+'</td><td><input type="number"  name="precio_venta_servicio[]" value="'+precio_venta_servicio+'"></td><td><input type="number"  name="descuento_servicio[]" value="'+descuento_servicio+'"></td><td>'+subtotal_s[conta]+'</td></tr>';
                conta++;
                limpiar_servicio();
                $("#aux_total_servicio").html("Bs/."+total_s);
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
            total_s=total_s-subtotal_s[index];
            $("#aux_total_servicio").html("Bs/. "+total_s);
            $("#importe_total_servicio").val(total_s);
            $("#total_servicio").val(total_s);
            $("#fila_s" + index).remove();
            evaluar_servicio();
            actualizar_total();
        }



var total_todo=0;
        function actualizar_total()
        {
            total_todo=total_s+total;
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
@endpush

@endsection 

