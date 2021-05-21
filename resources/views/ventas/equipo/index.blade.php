@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Equipos
                    @can('Equipo.create')
                    <a href="equipo/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    <a href="{{route('equipo.excel')}}"><button class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Exportar en Excel</button></a>
                   
                    @endcan
                </h3>
                @include('ventas.equipo.search')

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
                            <th>Propietario</th>
                            <th>Serial</th>
                            <th>Tipo de Equipo</th>
                            <th>Color</th>
                            <th>Marca</th>
                            <th>Imagen</th>
                            <th>Fecha de Registro</th>
                            {{-- <th>Estado</th> --}}
                            <th>opciones</th>
                        </thead>
                        @foreach ($equipos as $equi)
                        <tr>
                            <td>{{ $equi->id_equipo}}</td>
                            <td>{{ $equi->propietario}}</td>
                            <td>{{ $equi->serial}}</td>
                            <td>{{ $equi->tipo_equipo}}</td>
                            <td>{{ $equi->color}}</td>
                            <td>{{ $equi->marca}}</td>
                            <td>
                            <img src="{{asset('imagenes/equipos/'.$equi->imagen)}}" alt="{{ $equi->serial}}" height="100px" width="100px" class="img-thumbnail">
                            </td>
                            <td>{{ $equi->fecha_hora}}</td>
                            {{-- <td>{{ $equi->estado}}</td> --}}
                            <td>
                                @can('Equipo.edit')
                                <a href="{{URL::action('EquipoController@edit', $equi->id_equipo)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('Equipo.show')
                                <a href="{{URL::action('EquipoController@show', $equi->id_equipo)}}"><button class="btn btn-primary"><i class="fa fa-list"></i> Detalles</button></a>
                                @endcan
                                @can('Equipo.destroy')
                                <a href="" data-target="#modal-delete-{{$equi->id_equipo}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('ventas.equipo.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$equipos -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
