@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <center><h2>Nueva Venta de Servicio</h2></center>
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

            {!! Form::open(array('url' =>'ventas/venta/create1' ,'method'=> 'GET','autocomplete'=>'off'))!!}

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="x_panel">
    
                    <h3 class="StepTitle">Paso 1: Seleccione el cliente y la categoría de servicio</h3>
                    <form class="form-horizontal form-label-left">
                      <span class="section"><small>Seleccione un cliente o registre uno nuevo</small> </span>
                      {{-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> --}}
        
                      {{-- @include('ventas.venta.cliente') --}}
        
                      {{-- </div> --}}
                       
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="searchText">Cliente</label>
                        <select name="searchText" id="searchText" class="form-control selectpicker" data-live-search="true">
                            @foreach ($personas as $persona)
                            <option value="{{$persona->nombre}}">{{$persona->nombre}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                                 {{-- <input type="text" class="form-control" name="searchText" placeholder="Buscar ..." value="{{$searchText}}"> --}}
                 </div>
        
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="">Categoria de Servicio</label>
                <select name="searchText2" class="form-control selectpicker" id="searchText2" data-live-search="true">
                    @foreach ($categoria_servicios as $cat)
                    <option value="{{$cat->nombre}}">{{$cat->nombre}}</option>
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
                          <span class="section"><small>O Registre un nuevo cliente un nuevo cliente</small> </span>
                      </div>
        



                      <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
                          <div class="form-group pull-right">
                             {{-- <a href="{{URL::action('MaterialController@edit', $mat->id_material)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i>Nuevo Registro</button></a>  --}}
                             <a href="../cliente/create2"><button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Nuevo Registro</button></a> 
                             </div>
                      </div>
        
                      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                          <span class="section"><small>Nota: Al registrar un nuevo cliente el sistema lo redireccionará a un formulario de registro de equipo!
                          </small> </span>
                      </div>
                    </form>
                         
                </div>

            </div>
                


            {{-- {!! Form::close() !!} --}}
          
        </div>
    </div>



@endsection 

