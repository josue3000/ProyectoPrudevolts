@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_title">
                    <h3>Nuevo Usuario</h3>
                    </div>
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>                            
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- {!!Form::open(array('url'=>'seguridad/usuario','method'=>'POST','autocomplete'=>'off'))!!} --}}
                    {!!Form::open(array('route'=>'usuario.store','method'=>'POST','autocomplete'=>'off'))!!}
                    {!! Form::token() !!}
                    <div class="x_panel">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    
                    <div class="form-group row">
                        <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre:</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" type="text" class="form-control col-md-7 col-xs-12 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">E-mail:</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="email" type="email" class="form-control col-md-7 col-xs-12 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña:</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar contraseña:</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <h3> Lista de roles</h3>
                    <div class="form-group row">
                        <ul class="list-unstyled">
                            @foreach($roles as $role)
                            <li>
                                <label for="">
                                    {!! Form::checkbox('roles[]', $role->id, null) !!}
                                    {{$role->name}}
                                    {{-- <em>({{ $role->description}})</em> --}}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="form-group row">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>

                    </div>
                    </form>
                </div>

                    {!! Form::close() !!}



                </div>
            </div>

        </div>
    </div>



@endsection 

