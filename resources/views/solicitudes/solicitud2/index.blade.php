@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Solicitudes
                    @can('Sol.create')
                    <a href="solicitud2/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                @include('solicitudes.solicitud2.search')

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
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     {{Session::get('message')}}
    </div>
    @endif
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel"> 
            {{-- <div class="x_content"> --}}
                
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead style="background-color: #5affdb">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Telefono </th>
                            <th>Problema </th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            
                        </thead>
                        @foreach ($solicitudes as $sol)
                        <tr>
                            <td>{{ $sol->id_solicitud}}</td>
                            <td>{{ $sol->nombre}}</td>
                            <td>{{ $sol->telefono}}</td>
                            <td>{{ $sol->problema}}</td>
                            <td>{{ $sol->fecha_actualizacion}}</td>
                            <td>
                                @if($sol ->estado == 'Pendiente')
                                <a href="{{ route('solicitud.boton', $sol->id_solicitud)}}"><button class="btn btn-warning"><i class="fa fa-exclamation"></i> Pendiente</button></a>
                                @else
                                <a href="" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-check"></i>Atendido</button></a>                                
                               @endif
                            </td>
                          

                            <td>
                                @can('Sol.edit')
                                <a href="{{URL::action('Solicitud2Controller@edit', $sol->id_solicitud)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('Sol.show')
                                <a href="{{URL::action('Solicitud2Controller@show', $sol->id_solicitud)}}"><button class="btn btn-primary"><i class="fa fa-list"></i> Detalles</button></a>
                                @endcan
                                @can('Sol.destroy')
                                <a href="" data-target="#modal-delete-{{$sol->id_solicitud}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('solicitudes.solicitud2.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$solicitudes -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
