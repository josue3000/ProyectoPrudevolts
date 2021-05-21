@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Usuarios
                    @can('Usuario.create') 
                    <a href="usuario/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                @include('seguridad.usuario.search')

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
                            <th>Email</th>
                            <th>Roles</th>
                            <th>opciones</th>
                        </thead>
                        @foreach ($usuarios as $usu)
                        <tr>
                            <td>{{ $usu->id}}</td>
                            <td>{{ $usu->name}}</td>
                            <td>{{ $usu->email}}</td>
                            <td>{{ $usu->rol}}</td>
                            <td>
                                @can('Usuario.edit')
                                <a href="{{URL::action('UsuarioController@edit', $usu->id)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                {{-- <a href="{{ route('usuario.edit', $usu->id)}}"><button class="btn btn-info">Editar</button></a> --}}
                                @endcan
                                @can('Usuario.destroy')
                                <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('seguridad.usuario.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$usuarios -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
