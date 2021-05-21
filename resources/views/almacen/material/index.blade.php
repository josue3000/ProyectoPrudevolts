@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">

<!-- parte del titulo de tabla en el contenido  -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Listado de Repuestos 
                    @can('Material.create')
                    <a href="material/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</button></a>
                    @endcan
                </h3>
                @include('almacen.material.search')

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
                            <th>Repuesto</th>
                            <th>Codigo</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Saldo</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            {{-- <th>Estado</th> --}}
                            @can('Material.edit')
                            <th>opciones</th>
                            @endcan
                        </thead>
                        @foreach ($materiales as $mat)
                        <tr>
                            <td>{{ $mat->id_material}}</td>
                            <td>{{ $mat->nombre}}</td>
                            <td>{{ $mat->codigo}}</td>
                            <td>{{ $mat->categoria}}</td>
                            <td>{{ $mat->stock}}</td>
                            <td>{{ $mat->saldo}}</td>
                            <td>{{ round($mat->saldo / $mat->stock,2)}}</td>
                            <td>
                            <img src="{{asset('imagenes/materiales/'.$mat->imagen)}}" alt="{{ $mat->nombre}}" height="100px" width="100px" class="img-thumbnail">
                            </td>
                            {{-- <td>{{ $mat->estado}}</td> --}}
                            @can('Material.edit')
                            <td>
                                @can('Material.edit')
                                <a href="{{URL::action('MaterialController@edit', $mat->id_material)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('Material.destroy')
                                <a href="" data-target="#modal-delete-{{$mat->id_material}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Eliminar</button></a>
                                @endcan
                            </td>
                            @endcan
                        </tr>
                        @include('almacen.material.modal')
                        @endforeach
                        
                    </table>
                
            {{-- </div> --}}
        </div> 
        {{$materiales -> render()}}
    </div>
    <div class="clearfix"></div>
</div>
<!-- /final mostrar informacion en tablas   -->
</div>
</div>
@endsection
