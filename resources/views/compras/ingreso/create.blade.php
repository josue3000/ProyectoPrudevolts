@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Nuevo Ingreso</h3>
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


                    {{-- {!!Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off' ))!!} --}}
                    {!!Form::open(array('route'=>'ingreso.store','method'=>'POST','autocomplete'=>'off' ))!!}
                    {!! Form::token() !!}
{{-- CABECERA DEL FORMULARIO LLENADO DE DATOS DE TABLA INGRESO --}}
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="id_proveedor">Proveedor</label>
                        <select name="id_proveedor" id="id_proveedor" class="form-control selectpicker" data-live-search="true">
                            @foreach ($personas as $persona)
                            <option value="{{$persona->id_persona}}">{{$persona->nombre}}</option>
                            @endforeach
                        </select>
                    
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="">Tipo de Comprobante</label>
                        <select name="tipo_comprobante" id="" class="form-control">
                            
                                <option value="Recibo">Recibo</option>
                                <option value="Factura">Factura</option>
                                <option value="Tiket">Tiket</option>
                           
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_autorizacion">Número de Autorizacion</label>
                        <input type="text" name="num_autorizacion" value="{{old('num_autorizacion')}}" class="form-control" placeholder="Número de autorizacion...">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_factura">Numero de Factura</label>
                        <input type="text" name="num_factura" required value="{{old('num_factura')}}" class="form-control" placeholder="Número de Factura...">
                    </div>
                </div>
            </div>


{{-- LLENADO DE LA TABLA de datalles del ingreso --}}

            <div class="row">   
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="">Repuesto</label>
                                <select name="aux_id_material" class="form-control selectpicker" id="aux_id_material" data-live-search="true">
                                    @foreach ($materiales as $material)
                                    <option value="{{$material->id_material}}">{{$material->material}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="aux_cantidad" id="aux_cantidad" class="form-control" placeholder="cantidad... ">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                                <label for="precio_compra">Precio Compra</label>
                                <input type="number" name="aux_precio_compra" id="aux_precio_compra" class="form-control" placeholder="precio de compra... ">
                            
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12" hidden>
                            <div class="form-group">
                                <label for="precio_venta">Precio Venta</label>
                                <input type="number" name="aux_precio_venta" id="aux_precio_venta" value="0" class="form-control" placeholder="precio de venta... ">
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
                                    <th>Precio Compra</th>
                                    <th hidden>Precio Venta</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th hidden></th>
                                    <th><h4 id="total">Bs/. 0.00</h4></th>
                                </tfoot>
                                <tbody>

                                </tbody>

                            </table>
                        </div>
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

@push ('scripts')
    <script>

        $(document).ready(function()
        {
            $('#bt_add').click(function(){
                agregar();
            });
        });

        var cont=0;
        total=0;
        subtotal=[];

        $("#guardar").hide();
        
        function agregar()
        {
            id_material=$("#aux_id_material").val();
            material=$("#aux_id_material option:selected").text();
            cantidad=$("#aux_cantidad").val();
            precio_compra=$("#aux_precio_compra").val();
            precio_venta=$("#aux_precio_venta").val();

            if (id_material!="" && material!="" && cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!="")
            {
                subtotal[cont]=(cantidad*precio_compra);
                total=total+subtotal[cont];
                var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_material[]" value="'+id_material+'">'+material+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td hidden><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
                cont++;
                limpiar();
                $("#total").html("Bs/."+total);
                evaluar();
                $('#detalles').append(fila);
                
            }
            else
            {
                alert("Error al ingresar el detalle del ingreso, revise los datos del repuesto");
            }
        }
        function limpiar()
        {
            $("#aux_cantidad").val("");    
            $("#aux_precio_compra").val("");   
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
            $("#total").html("Bs/. "+total);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endpush

@endsection 

