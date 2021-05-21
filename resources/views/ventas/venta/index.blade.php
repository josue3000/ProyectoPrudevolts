@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Ventas de Servicios 
                    @can('VentaServicio.create')
                    <a href="venta/create0"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    <a href="{{route('venta.excel')}}"><button class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Exportar en Excel</button></a>
                    @endcan
                </h3>
                @include('ventas.venta.search')

            </div>     
        </div>
                    {{-- <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Categorias <a href="categoriaMaterial/create"><button>Nuevo</button></a></h3>
                        @include('almacen.categoriaMaterial.search')
                    </div> --}}
     </div>
     <div class="clearfix"></div>

    <!-- parte del titulo de tabla en el contenido  -->
    <!-- mostrar informacion en tablas  -->
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel"> 
            <div class="table-responsive">
                
                    <table id="datatable" class="table table-striped table-bordered ">
                        <thead style="background-color: #5affdb">
                            {{-- <th>ID</th> --}}
                            <th>Fecha</th>
                            {{-- <th>Fecha actualizada</th> --}}
                            <th>Cliente</th>
                            <th>Código de servicio</th>
                            {{-- <th>Número de Autorización</th>
                            <th>Número de Factura</th> --}}
                            {{-- <th>Debito Fiscal</th> --}}
                            {{-- <th>Equipo</th> --}}
                            <th>Total</th>
                            <th>Estado Servicio</th>
                            <th>Estado Pago</th>
                            <th>Técnico</th>
                            <th>Opciones</th>
                            
                        </thead>
                        @foreach ($ventas as $ven)
                        <tr>
                            {{-- <td>{{ $ven->id_venta}}</td> --}}
                            {{-- <td>{{ $ven->fecha_hora}}</td> --}}
                            <td>{{ $ven->fecha_actual}}</td>
                            <td>{{ $ven->nombre}}</td>
                            {{-- <td>{{ $ven->tipo_comprobante.': '.$ven->num_autorizacion.'- '.$ven->num_factura}}</td> --}}
                            <td>{{ $ven->codigo}}</td>
                            {{--<td>{{ $ven->num_factura}}</td> --}}
                            {{-- <td>{{ $ven->debito_fiscal}}</td> --}}
                            {{-- <td>{{ $ven->tipo_equipo}} : {{$ven->marca}}</td> --}}
                            <td>{{ $ven->importe_total}}</td>
                            <td>{{ $ven->estado_servicio}}</td>
                            <td>{{ $ven->estado_pago}}</td>
                            <td>{{ $ven->name}}</td>

                            <td>
                                @can('VentaServicio.edit')
                                <a href="{{URL::action('VentaServicioController@edit', $ven->id_venta)}}"><button class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('VentaServicio.show')
                                <a href="{{URL::action('VentaServicioController@show', $ven->id_venta)}}"><button class="btn btn-primary"><i class="fa fa-list"></i> Detalles</button></a>
                                @endcan
                                @can('VentaServicio.destroy')
                                <a href="" data-target="#modal-delete-{{$ven->id_venta}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Anular</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('ventas.venta.modal')
                        @endforeach
                        
                    </table>
                
            </div>
        </div> 
        {{$ventas -> render()}}
    </div>
    <div class="clearfix"></div>

{{-- <div class="col-md-12 col-sm-12 col-xs-12">
<label for="">Exportar datos de la tabla en Excel: </label>
<a href="{{ route('venta.excel')}}"><button class="btn btn-success">Excel </button></a>

</div> --}}


</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
