@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Clientes 
                    @can('Cliente.create')
                    <a href="cliente/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    <a href="{{route('cliente.excel')}}"><button class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Exportar en Excel</button></a>
                   
                    
                    @endcan
                </h3>
                @include('ventas.cliente.search')
            </div>     

            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="{{ route('cliente.import.excel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('message'))
                    {{-- <p>{{Session::get('message')}}</p> --}}
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     {{Session::get('message')}}
                    </div>
                    @endif
                    {{-- <p>Importar registros desde Excel</p> --}}
                    <h5>Importar registros desde Excel</h5>
                    <div class="col-md-6 col-sm-6 col-xs-6"> <input type="file" name="file"></div>
                    <div class="col-md-6 col-sm-6 col-xs-6"> <button class="btn btn-info">Importar Clientes</button></div>
                </form>
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
                
                    <table  id="datatable" class="table table-striped table-bordered ">
                        <thead style="background-color: #5affdb">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo Doc</th>
                            <th>Número Doc</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Fecha</th>
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
                                @can('Cliente.edit')
                                <a href="{{URL::action('ClienteController@edit', $per->id_persona)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('Cliente.destroy')
                                <a href="" data-target="#modal-delete-{{$per->id_persona}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('ventas.cliente.modal')
                        @endforeach
                        
                    </table>
                
            </div>
        </div> 
        {{$personas -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
