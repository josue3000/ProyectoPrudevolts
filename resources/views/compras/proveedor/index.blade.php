@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Proveedores 
                    @can('Proveedor.create')
                    <a href="proveedor/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                @include('compras.proveedor.search')

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
                            <th>Tipo Doc</th>
                            <th>Número Doc</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Fecha de Registro</th>
                            <th>opciones</th>
                        </thead>
                        @foreach ($personas as $per)
                        <tr>
                            <td>{{ $per->id_persona}}</td>
                            <td>{{ $per->nombre}}</td>
                            <td>{{ $per->tipo_documento}}</td>
                            <td>{{ $per->num_documento}}</td>
                            <td>{{ $per->telefono}}</td>
                            <td>{{ $per->email}}</td>
                            <td>{{ $per->fecha_hora}}</td>

                            <td>
                                @can('Proveedor.edit')
                                <a href="{{URL::action('ProveedorController@edit', $per->id_persona)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('Proveedor.destroy')
                                <a href="" data-target="#modal-delete-{{$per->id_persona}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('compras.proveedor.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$personas -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
