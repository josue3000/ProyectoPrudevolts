@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Editar Proveedor: {{$persona->nombre}}</h3>
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





                    {!!Form::model($persona, ['method'=>'PATCH', 'route' => ['proveedor.update' ,$persona->id_persona]])!!}
                    {!! Form::token() !!}
                    
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control" placeholder="Nombre...">
                            </div>
                        </div>
        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Dirección</label>
                            <input type="text" name="direccion" value="{{$persona->direccion}}" class="form-control" placeholder="Direccion...">
                            </div>
                        </div>
        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="">Documento</label>
                                <select name="tipo_documento" id="" class="form-control">
                                    @if ($persona->tipo_documento=='Carnet de Identidad')
                                        <option value="Carnet de Identidad" selected>Carnet de Identidad</option>
                                        <option value="NIT">NIT</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    @elseif ($persona->tipo_documento=='NIT')
                                        <option value="Carnet de Identidad">Carnet de Identidad</option>
                                        <option value="NIT" selected>NIT</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    @else 
                                        <option value="Carnet de Identidad">Carnet de Identidad</option>
                                        <option value="NIT">NIT</option>
                                        <option value="Pasaporte" selected>Pasaporte</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="num_documento">Número de Documento</label>
                                <input type="text" name="num_documento" value="{{$persona->num_documento}}" class="form-control" placeholder="Número del documento...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" required value="{{$persona->telefono}}" class="form-control" placeholder="Teléfono...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" required value="{{$persona->email}}" class="form-control" placeholder="email...">
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
        
                            </div>
                        </div>
                    </div>

                    {!!Form::close()!!}
               
                    

        </div>
    </div>

@endsection 

