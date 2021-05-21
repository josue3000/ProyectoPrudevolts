@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Marcas
                    @can ('Marca.create')
                     <a href="marca/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                @include('equipos.marca.search')

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
                            <th>Marca</th>
                            <th>Descripcion</th>
                            <th>opciones</th>
                        </thead>
                        @foreach ($marcas as $mar)
                        <tr>
                            <td>{{ $mar->id_marca}}</td>
                            <td>{{ $mar->nombre}}</td>
                            <td>{{ $mar->descripcion}}</td>
                            
                            <td>
                                @can('Marca.edit')
                            <a href="{{URL::action('MarcaController@edit', $mar->id_marca)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('Marca.destroy')
                            <a href="" data-target="#modal-delete-{{$mar->id_marca}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                            
                        </tr>
                        @include('equipos.marca.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$marcas -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
