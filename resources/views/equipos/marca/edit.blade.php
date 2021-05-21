@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Editar Marca:{{$marca->nombre}}</h3>
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>                            
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    {!!Form::model($marca, ['method'=>'PATCH', 'route' => ['marca.update' ,$marca->id_marca]])!!}
                    {!! Form::token() !!}
                    <div class="form-group">
                        <label for="nombre">Marca</label>
                    <input type="text" name="nombre" value="{{$marca->nombre}}" class="form-control" placeholder="Nombre...">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Descripcion</label>
                    <input type="text" name="descripcion" value="{{$marca->descripcion}}" class="form-control" placeholder="Descripcion...">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>

                    </div>

                    {!!Form::close()!!}
                </div>
            </div>

        </div>
    </div>

@endsection 

