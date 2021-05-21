@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {{-- <h3>Editar Solicitud: {{$cliente->nombre}}</h3> --}}
                    <h3>Editar Solicitud</h3>
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


            {!!Form::model($solicitud, ['method'=>'PATCH', 'route' => ['solicitud2.update' ,$solicitud->id_solicitud]])!!}
                           
            {!! Form::token() !!}

            <div class="row">
               
                {{-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="">Cliente</label>
                        <select name="cliente" id="cliente" class="form-control selectpicker" data-live-search="true">
                            @foreach ($cliente as $clie)
                                @if($clie->id_persona == $solicitud->cliente)
                                <option value="{{$clie->id_persona}}" selected>{{$clie->nombre}}</option>
                                @else
                                <option value="{{$clie->id_persona}}">{{$clie->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombres y Apellidos</label>
                    <input type="text" name="nombre" required value="{{$solicitud->nombre}}" class="form-control" placeholder="Nombre...">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Dirección</label>
                    <input type="text" name="direccion" value="{{$solicitud->direccion}}" class="form-control" placeholder="Direccion...">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" required value="{{$solicitud->telefono}}" class="form-control" placeholder="Teléfono...">
                    </div>
                </div>


                

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="estado">Estado de la Solicitud</label>
                        <select name="estado" id="estado" class="form-control selectpicker" data-live-search="true" aria-placeholder="selleione el estado">
                            @if ($solicitud->estado == "Pendiente")
                            <option value="Pendiente" selected>Pendiente</option>
                            <option value="Atendido">Atendido</option>
                            @else
                            <option value="Atendido" selected>Atendido</option>
                            <option value="Pendiente" >Pendiente</option>
                            @endif
                            
                        </select>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="problema">Problema</label>
                    {{-- <input type="text" name="serial" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion ..."> --}}
                    <textarea class="form-control" style="height:155px;" id="problema" name="problema" placeholder="Descripcion ..."> {{$solicitud->problema}}</textarea> 
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




    



