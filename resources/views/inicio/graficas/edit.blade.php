@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Editar Repuesto: {{$material->nombre}}</h3>
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





                    {!!Form::model($material, ['method'=>'PATCH', 'route' => ['material.update' ,$material->id_material],'files'=>'true'])!!}
                    {!! Form::token() !!}
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" required value="{{$material->nombre}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="">Categoria</label>
                                <select name="id_categoria" id="" class="form-control">
                                    @foreach ($categorias as $cat)
                                        @if ($cat->id_categoria_material==$material->id_categoria)
                                        <option value="{{$cat->id_categoria_material}}" selected>{{$cat->nombre}}</option>
                                        @else
                                        <option value="{{$cat->id_categoria_material}}">{{$cat->nombre}}</option>
                                        @endif
                                        {{-- <option value="{{$cat->id_categoria_material}}">{{$cat->nombre}}</option> --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" name="codigo" required value="{{$material->codigo}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" name="stock" required value="{{$material->stock}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" required value="{{$material->descripcion}}" class="form-control" placeholder="Descripcion del repuesto...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" class="form-control">
                                @if (($material->imagen)!= "")
                                <img src="{{asset('imagenes/materiales/'.$material->imagen)}}" alt="" height="300px" width="300px">
                                @endif
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

