@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Reclamos
                    @can('Sol.create')
                    <a href="reclamo/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                @include('reclamos.reclamo.search')

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
                            <th>Cliente</th>
                            <th>Servicio</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            
                        </thead>
                        @foreach ($reclamos as $rec)
                        <tr>
                            <td>{{ $rec->id_reclamo}}</td>
                            <td>{{ $rec->cliente}}</td>
                            <td>{{ $rec->id_servicio}}</td>
                            <td>{{ $rec->descripcion}}</td>
                            <td>{{ $rec->fecha_actualizacion}}</td>
                            {{-- <td> {{ $rec->estado}} --}}
                            <td>
                            @if($rec ->estado == 'Reclamo')
                                <a href="{{ route('reclamo.boton', $rec->id_reclamo)}}"><button class="btn btn-warning"><i class="fa fa-exclamation"></i> Reclamo</button></a>
                                {{-- <a href="" data-toggle="modal"><button class="btn btn-warning"><i class="fa fa-exclamation"></i> Reclamo</button></a> --}}
                                @else
                                <a href="" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-check"></i> Reclamo Atendido</button></a>                                
                            @endif
                            </td>
                          
                            
                            <td>
                                @can('Sol.edit')
                                <a href="{{URL::action('ReclamoController@edit', $rec->id_reclamo)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('Sol.show')
                                <a href="{{URL::action('ReclamoController@show', $rec->id_reclamo)}}"><button class="btn btn-primary"><i class="fa fa-list"></i> Detalles</button></a>
                                @endcan
                                @can('Sol.destroy')
                                <a href="" data-target="#modal-delete-{{$rec->id_reclamo}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                        </tr>
                        @include('reclamos.reclamo.modal')
                        @include('reclamos.reclamo.modalreclamo')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$reclamos -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
