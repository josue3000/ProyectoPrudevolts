@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Editar Tipo de Servicio: {{$servicio->nombre}}</h3>
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


                    {!!Form::model($servicio, ['method'=>'PATCH', 'route' => ['servicio.update' ,$servicio->id_servicio],'files'=>'true'])!!}
                    {!! Form::token() !!}
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required value="{{$servicio->nombre}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="">Categoria</label>
                                <select name="id_categoria" id="" class="form-control">
                                    @foreach ($categorias as $cat)
                                        @if ($cat->id_categoria_servicio==$servicio->id_categoria)
                                        <option value="{{$cat->id_categoria_servicio}}" selected>{{$cat->nombre}}</option>
                                        @else
                                        <option value="{{$cat->id_categoria_servicio}}">{{$cat->nombre}}</option>
                                        @endif
                                        {{-- <option value="{{$cat->id_categoria_servicio}}">{{$cat->nombre}}</option> --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" required value="{{$servicio->descripcion}}" class="form-control" placeholder="Descripcion del servicio...">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="precio_venta_servicio">Precio Venta Bs.</label>
                                <input type="number" name="precio_venta_servicio" required value="{{$servicio->precio_venta_servicio}}" class="form-control" placeholder="Descripcion del servicio...">
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

