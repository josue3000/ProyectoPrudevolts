@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {{-- <h3>Editar Solicitud: {{$cliente->nombre}}</h3> --}}
                    <h3>Editar Reclamo</h3>
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


            {!!Form::model($reclamo, ['method'=>'PATCH', 'route' => ['reclamo.update' ,$reclamo->id_reclamo]])!!}
                           
            {!! Form::token() !!}

            <div class="row">
               
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="">Cliente</label>
                        <select name="cliente" id="cliente" class="form-control selectpicker" data-live-search="true">
                            @foreach ($cliente as $clie)
                                @if($clie->id_persona == $reclamo->cliente)
                                <option value="{{$clie->id_persona}}" selected>{{$clie->nombre}}</option>
                                @else
                                <option value="{{$clie->id_persona}}">{{$clie->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="">Codigo del servicio</label>
                        <select name="id_servicio" id="id_servicio" class="form-control selectpicker" data-live-search="true">
                            @foreach ($servicio as $ser)
                                @if($ser->id_venta == $reclamo->id_servicio)
                                <option value="{{$ser->id_venta}}" selected>{{$ser->codigo}}</option>
                                @else
                                <option value="{{$ser->id_venta}}">{{$ser->codigo}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="estado">Estado del reclamo</label>
                        <select name="estado" id="estado" class="form-control selectpicker" data-live-search="true" aria-placeholder="seleccione el estado">
                            @if ($reclamo->estado == "Reclamo")
                            <option value="Reclamo" selected>Reclamo</option>
                            <option value="Reclamo Atendido">Reclamo Atendido</option>
                            @else
                            <option value="Reclamo">Reclamo</option>
                            <option value="Reclamo Atendido" selected>Reclamo Atendido</option>
                            @endif
                            
                        </select>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                    {{-- <input type="text" name="serial" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion ..."> --}}
                    <textarea class="form-control" style="height:155px;" id="descripcion" name="descripcion" placeholder="Descripcion ..."> {{$reclamo->descripcion}}</textarea> 
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




    



