@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Rgistrar Reclamo</h3>
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


                    {{-- {!!Form::open(array('url'=>'solicitudes/solicitud','method'=>'POST','autocomplete'=>'off','files'=>'true' ))!!} --}}
                    {!!Form::open(array('route'=>'reclamo.store','method'=>'POST','autocomplete'=>'off' ))!!}
                    {{-- {!! Form::open(['route'=> 'solicitud.store']) !!} --}}
                    {{-- {{ route('solicitud.store')}} --}}
                    {!! Form::token() !!}

            <div class="row">

                @if(Session::has('message'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 {{Session::get('message')}}
                </div>
                @endif

               
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="">Cliente</label>
                        <select name="cliente" id="cliente" class="form-control selectpicker" data-live-search="true">
                            @foreach ($cliente as $clie)
                                <option value="{{$clie->id_persona}}">{{$clie->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="">Codigo del servicio</label>
                        <select name="id_servicio" id="id_servicio" class="form-control selectpicker" data-live-search="true">
                            @foreach ($servicio as $ser)
                                <option value="{{$ser->id_venta}}">{{$ser->codigo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="estado">Estado del Reclamo</label>
                        <select name="estado" id="estado" class="form-control selectpicker" data-live-search="true" aria-placeholder="seleccione el estado">
                            <option value="Reclamo">Reclamo</option>
                            <option value="Reclamo Atendido">Reclamo Atendido</option>
                           </select>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                    {{-- <input type="text" name="serial" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion ..."> --}}
                    <textarea class="form-control" style="height:155px;" id="descripcion" name="descripcion" placeholder="Descripcion ...">{{old('descripcion')}}</textarea> 
                    </div>
                </div>
                
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
            </div>
                   
                    {!! Form::close() !!}

        </div>
    </div>



@endsection 

