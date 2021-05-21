@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Roles
                    @can('Rol.create') 
                    <a href="roles/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                {{-- @include('seguridad.roles.search') --}}

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
                            <th>Guard Name</th>
                            <th>opciones</th>
                        </thead>
                        @foreach ($roles as $rol)
                        <tr>
                            <td>{{ $rol->id}}</td>
                            <td>{{ $rol->name}}</td>
                            <td>{{ $rol->guard_name}}</td>
                            <td>
                                @can('Rol.show')
                                <a href="{{URL::action('RolController@show', $rol->id)}}"><button class="btn btn-info"><i class="fa fa-list"></i> Ver</button></a>
                                @endcan
                                @can('Rol.edit')
                                <a href="{{URL::action('RolController@edit', $rol->id)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                {{-- <a href="{{ route('usuario.edit', $rol->id)}}"><button class="btn btn-info">Editar</button></a> --}}
                                @endcan
                                @can('Rol.destroy')
                                <a href="" data-target="#modal-delete-{{$rol->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('seguridad.roles.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$roles -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
