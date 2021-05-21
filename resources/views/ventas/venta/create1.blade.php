@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <center><h2>Creación de un nuevo registro de venta de servicio </h2></center>
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>                            
                        @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            {{-- {!!Form::open(array('route'=>'venta.create','method'=>'POST','autocomplete'=>'off' ))!!}
            {!! Form::token() !!} --}}

            {!! Form::open(array('url' =>'ventas/venta/create' ,'method'=> 'GET','autocomplete'=>'off'))!!}

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="x_panel">
    
                    <h3 class="StepTitle">Paso 2: Seleccionar el equipo</h3>
                    <form class="form-horizontal form-label-left">
                      <span class="section"><small>Busque y Seleccione el equipo</small> </span>
                      
                       
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" hidden >
                    <div class="form-group">
                        <label for="searchText">Cliente</label>
                        <select name="searchText" id="searchText" class="form-control selectpicker" data-live-search="true">
                            @foreach ($personas as $persona)
                            <option value="{{$persona->nombre}}">{{$persona->nombre}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                             
                 </div>
        
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" hidden>
                    <div class="form-group">
                         <label for="">Categoria de Servicio</label>
                         <select name="searchText2" class="form-control selectpicker" id="searchText2" data-live-search="true">
                            @foreach ($categoria_servicios as $cat)
                            <option value="{{$cat->nombre}}">{{$cat->nombre}}</option>
                            @endforeach
                         </select>
                    </div>
                 </div>

                 <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                    <div class="form-group">
                        <label for="equipo">Equipo</label>
                        <select name="searchText3" id="searchText3" class="form-control selectpicker" data-live-search="true">
                            @foreach ($equipos as $equi)
                            <option value="{{$equi->id_equipo}}">{{$equi->tipo_equipo}} : {{$equi->nombre}} : {{$equi->serial}}: {{$equi->marca}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
        <br>

        <span class="form-group-btn">
            {{-- <a href={{route("VentaServicioController@create",['searchText','searchText2'])}}><button type="submit" class="btn btn-primary">Seleccionar</button></a> --}}
            <button type="submit" class="btn btn-primary">Siguiente</button>
        </span>
    </div>
</div>
{!! Form::close() !!} 

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <div class="x_panel">

                      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                          <span class="section"><small>En caso contrario, registre un nuevo equipo</small> </span>
                      </div>

                      <table class="table table-striped table-bordered">
                        <thead>
                            <th>Nombre</th>
                            <th>Opcion</th>
                        </thead>
                        @foreach ($personas as $persona)
                        <tr>
                            <td>{{ $persona->nombre}}</td>
                            <td><a href={{url("ventas/equipo/create3",$persona->id_persona)}}><button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Nuevo Registro</button></a> 
                            </td>
                        </tr>
                        @endforeach
                    </table>

                      {{-- <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
                          <div class="form-group pull-right">
                             <a href="../cliente/create2"><button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Nuevo Registro</button></a> 
                             </div>
                      </div> --}}
        
                      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                          <span class="section"><small>Nota: Al registrar un nuevo equipo el sistema lo redireccionará al primer paso, porque los datos se actualizarán
                          </small> </span>
                      </div>
                    </form>
                         
                </div>

            </div>

            {{-- {!! Form::close() !!} --}}
          
        </div>
    </div>



@endsection 

