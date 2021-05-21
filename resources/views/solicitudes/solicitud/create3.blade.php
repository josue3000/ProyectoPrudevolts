@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3 style="color: black">Registrar Solicitud y datos del cliente </h3>
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


                    
            {!!Form::open(array('route'=>'solicitud.store2','method'=>'POST','autocomplete'=>'off' ))!!}
            {{-- {!! Form::open(array('url' =>'solicitudes/solicitud/create2' ,'method'=> 'GET','autocomplete'=>'off'))!!} --}}
            {!! Form::token() !!}

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="x_panel">
    
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <span class="section"><small>Datos del cliente seleccionado</small> </span>
                    </div>
    
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Nombres y Apellidos</label>
                        <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
                        </div>
                    </div>
    
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" hidden>
                        <div class="form-group">
                            <label for="id_persona">id_persona</label>
                        <input type="text" name="id_persona" value="{{old('id_persona')}}" class="form-control" placeholder="id_persona">
                        </div>
                    </div>
    
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" hidden >
                        <div class="form-group">
                            <label for="cliente">cliente</label>
                        <input type="text" name="cliente" value="{{old('id_persona')}}" class="form-control" placeholder="cliente">
                        </div>
                    </div>
    
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Dirección</label>
                        <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Direccion...">
                        </div>
                    </div>
    
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="">Documento</label>
                            <select name="tipo_documento" id="" class="form-control">
                                
                                    <option value="Carnet de Identidad">Carnet de Identidad</option>
                                    <option value="NIT">NIT</option>
                                    <option value="Pasaporte">Pasaporte</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="num_documento">Número de Documento</label>
                            <input type="text" name="num_documento" value="{{old('num_documento')}}" class="form-control" placeholder="Número del documento...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Teléfono...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="email...">
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="estado">Estado de la Solicitud</label>
                            <select name="estado" id="estado" class="form-control selectpicker" data-live-search="false" aria-placeholder="selecione el estado">
                                <option value="Pendiente">Pendiente</option>
                                <option value="Atendido">Atendido</option>
                               </select>
                        </div>
                    </div>
    
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion Problema</label>
                        {{-- <input type="text" name="serial" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion ..."> --}}
                        <textarea class="form-control" style="height:155px;" id="descripcion" name="descripcion" placeholder="Descripcion del problema..."></textarea> 
                        </div>
                    </div>
    
    
    
    
    
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
    
                        </div>
                    </div>
    
    
    
                </div>
                </div>
                   
            {!! Form::close() !!}
                                    

        </div>
    </div>



@endsection 

