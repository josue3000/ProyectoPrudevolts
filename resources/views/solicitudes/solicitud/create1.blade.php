@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3 style="color: black">Registrar Solicitud </h3>
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


                    
                    {{-- {!!Form::open(array('route'=>'solicitud.store','method'=>'POST','autocomplete'=>'off' ))!!} --}}
                    {!! Form::open(array('url' =>'solicitudes/solicitud/create2' ,'method'=> 'GET','autocomplete'=>'off'))!!}
                    
                    {{-- {!! Form::token() !!} --}}

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="x_panel">
                <h3 class="StepTitle">Paso 1: Seleccione el cliente</h3>
                <form class="form-horizontal form-label-left">
                  <span class="section"><small>Seleccione un cliente o registre uno nuevo</small> </span>



               
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="searchText">Cliente</label>
                        <select name="searchText" id="searchText" class="form-control selectpicker" data-live-search="true">
                            @foreach ($cliente as $clie)
                                <option value="{{$clie->id_persona}}">{{$clie->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                <span class="form-group-btn">
                    {{-- <a href={{route("VentaServicioController@create",['searchText','searchText2'])}}><button type="submit" class="btn btn-primary">Seleccionar</button></a> --}}
                    <button type="submit" class="btn btn-primary">👉Siguiente</button>
                </span>
               

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <span class="section"><small>Nota: Se recomienda buscar el cliente en el cuadro de seleccion, y en caso de no encontrarlo, registrarlo con la opcion de abajo 👇
                    </small> </span>
                </div>

                
               
            </div>
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
                                    <a href="create3"><button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Nuevo Registro</button></a> 
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                   <span class="section"><small>Nota: Al registrar un nuevo cliente el sistema lo redireccionará a un formulario para registrar la solicitud y el cliente!
                                   </small> </span>
                                </div>
                                
                            </form>
                                             
                        </div>
                    </div>
                                    

        </div>
    </div>



@endsection 

