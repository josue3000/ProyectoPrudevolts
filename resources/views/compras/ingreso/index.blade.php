@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Compras de repuestos  
                    @can('Ingreso.create')
                    <a href="ingreso/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                @include('compras.ingreso.search')

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
            {{-- <div class="x_content"> --}}
                
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead style="background-color: #5affdb">
                            {{-- <th>ID</th> --}}
                            <th>Fecha de Registro</th>
                            <th>Proveedor</th>
                            <th>Comprobante</th>
                            {{-- <th>Número de Autorización</th>
                            <th>Número de Factura</th> --}}
                            {{-- <th>Importe Credito Fiscal</th> --}}
                            <th>Total Bs.</th>
                            {{-- <th>Estado</th> --}}
                            <th>Opciones</th>
                            
                        </thead>
                        @foreach ($ingresos as $ing)
                        <tr>
                            {{-- <td>{{ $ing->id_ingreso}}</td> --}}
                            <td>{{ $ing->fecha_hora}}</td>
                            <td>{{ $ing->nombre}}</td>
                            <td>{{ $ing->tipo_comprobante.': '.$ing->num_autorizacion.'- '.$ing->num_factura}}</td>
                            {{-- <td>{{ $ing->num_autorizacion}}</td>
                            <td>{{ $ing->num_factura}}</td> --}}
                            {{-- <td>{{ $ing->importe_credito_fiscal}}</td> --}}
                            <td>{{ $ing->total}}</td>
                            {{-- <td>{{ $ing->estado}}</td> --}}


                            <td>
                                @can('Ingreso.show')
                                <a href="{{URL::action('IngresoController@show', $ing->id_ingreso)}}"><button class="btn btn-primary"><i class="fa fa-list"></i> Detalles</button></a>
                                @endcan
                                @can('Ingreso.destroy')
                                <a href="" data-target="#modal-delete-{{$ing->id_ingreso}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i>Anular</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('compras.ingreso.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$ingresos -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
