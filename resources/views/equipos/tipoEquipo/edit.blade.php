@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Editar Tipo de Equipo: {{$tipoEquipo->nombre}}</h3>
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


                    {!!Form::model($tipoEquipo, ['method'=>'PATCH', 'route' => ['tipoEquipo.update' ,$tipoEquipo->id_tipo_equipo],'files'=>'true'])!!}
                    {!! Form::token() !!}
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required value="{{$tipoEquipo->nombre}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="">Categoria</label>
                                <select name="categoria" id="" class="form-control">
                                    @foreach ($categorias as $cat)
                                        @if ($cat->id_categoria==$tipoEquipo->categoria)
                                        <option value="{{$cat->id_categoria}}" selected>{{$cat->nombre}}</option>
                                        @else
                                        <option value="{{$cat->id_categoria}}">{{$cat->nombre}}</option>
                                        @endif
                                        {{-- <option value="{{$cat->id_categoria_servicio}}">{{$cat->nombre}}</option> --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" required value="{{$tipoEquipo->descripcion}}" class="form-control" placeholder="Descripcion del tipo de equipo...">
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

