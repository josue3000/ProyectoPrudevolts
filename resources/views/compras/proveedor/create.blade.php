@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Nuevo Proveedor</h3>
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


                    {{-- {!!Form::open(array('url'=>'compras/proveedor','method'=>'POST','autocomplete'=>'off' ))!!} --}}
                    {!!Form::open(array('route'=>'proveedor.store','method'=>'POST','autocomplete'=>'off' ))!!}
                    {!! Form::token() !!}

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
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
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>

                    </div>
                </div>
            </div>
                   
                    {!! Form::close() !!}

        </div>
    </div>



@endsection 

