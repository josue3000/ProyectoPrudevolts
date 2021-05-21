@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Nueva Categoria de Servicios</h3>
                    
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>                            
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- {!!Form::open(array('url'=>'bancoServicio/categoriaServicio','method'=>'POST','autocomplete'=>'off'))!!} --}}
                    {!!Form::open(array('route'=>'categoriaServicio.store','method'=>'POST','autocomplete'=>'off'))!!}
                    {!! Form::token() !!}
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre...">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Desripcion</label>
                        <input type="text" name="descripcion" class="form-control" placeholder="Descripcion...">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>

                    </div>

                    {!! Form::close() !!}



                </div>
            </div>

        </div>
    </div>



@endsection 

