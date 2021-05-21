@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Tipos de Servicios 
                    @can('Servicio.create')
                    <a href="servicio/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                @include('bancoServicio.servicio.search')

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
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Descripcion</th>
                            <th>Precio Venta</th>
                            {{-- <th>Estado</th> --}}
                            <th>opciones</th>
                        </thead>
                        @foreach ($servicios as $serv)
                        <tr>
                            <td>{{ $serv->id_servicio}}</td>
                            <td>{{ $serv->nombre}}</td>
                            <td>{{ $serv->categoria}}</td>
                            <td>{{ $serv->descripcion}}</td>
                            <td>{{ $serv->precio_venta_servicio}}</td>
                            {{-- <td>{{ $serv->estado}}</td> --}}
                            <td>
                                @can('Servicio.edit')
                                <a href="{{URL::action('ServicioController@edit', $serv->id_servicio)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('Servicio.destroy')
                                <a href="" data-target="#modal-delete-{{$serv->id_servicio}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('bancoServicio.servicio.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$servicios -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
