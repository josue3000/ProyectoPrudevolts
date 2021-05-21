@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Editar Categoria:{{$categoria->nombre}}</h3>
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>                            
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    {!!Form::model($categoria, ['method'=>'PATCH', 'route' => ['categoriaServicio.update' ,$categoria->id_categoria_servicio]])!!}
                    {!! Form::token() !!}
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="{{$categoria->nombre}}" class="form-control" placeholder="Nombre...">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Descripcion</label>
                    <input type="text" name="descripcion" value="{{$categoria->descripcion}}" class="form-control" placeholder="Descripcion...">
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

