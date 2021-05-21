@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Tipos de Equipo 
                    @can('TipoEquipo.create')
                    <a href="tipoEquipo/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                @include('equipos.tipoEquipo.search')

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
                            {{-- <th>Estado</th> --}}
                            <th>opciones</th>
                        </thead>
                        @foreach ($tipoEquipo as $tip)
                        <tr>
                            <td>{{ $tip->id_tipo_equipo}}</td>
                            <td>{{ $tip->nombre}}</td>
                            <td>{{ $tip->categoria}}</td>
                            <td>{{ $tip->descripcion}}</td>
                            {{-- <td>{{ $tip->estado}}</td> --}}
                            <td>
                                @can('TipoEquipo.edit')
                                <a href="{{URL::action('TipoEquipoController@edit', $tip->id_tipo_equipo)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('TipoEquipo.destroy')
                                <a href="" data-target="#modal-delete-{{$tip->id_tipo_equipo}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('equipos.tipoEquipo.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$tipoEquipo -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
