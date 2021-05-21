@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Nuevo Tipo de Equipo</h3>
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


                    {{-- {!!Form::open(array('url'=>'bancoServicio/servicio','method'=>'POST','autocomplete'=>'off','files'=>'true' ))!!} --}}
                    {!!Form::open(array('route'=>'tipoEquipo.store','method'=>'POST','autocomplete'=>'off','files'=>'true' ))!!}
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
                        <label for="">Categoria</label>
                        <select name="categoria" id="" class="form-control">
                            @foreach ($categorias as $cat)
                                <option value="{{$cat->id_categoria}}">{{$cat->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion del servicio...">
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

