@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_title">
                    <center><h3>Nuevo Rol</h3></center>
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
                    {{-- {!!Form::open(array('url'=>'seguridad/roles','method'=>'POST','autocomplete'=>'off'))!!} --}}
                    {!!Form::open(array('route'=>'rol.store','method'=>'POST','autocomplete'=>'off'))!!}
                    {!! Form::token() !!}
                    <div class="x_panel">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    
                    <div class="form-group row">
                        {!! Form::label('name', 'Nombre del nuevo Rol*') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    {{-- <div class="form-group row">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group row">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div> --}}

               



                    <h4 style="color: black"> Seleccione los permisos necesarios para el nuevo Rol👍</h4>
                    <hr color="blue" size=3>
                    <div class="form-group">
                        <ul class="list-unstyled">
                            @foreach($permissions as $permission)
                            @if($permission->id == "1")
                            <h4 style="color: black">✔ Permisos para la personalización de Categorías de Repuestos</h4>
                            @endif
                            <li>
                                <label >
                                    {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                                    {{-- {{$permission->name}} --}}
                                    {{$permission->descripcion}}
                                    {{-- <em>({{ $role->description}})</em>🔴 ✔💲🔶⚪⚫⬛ --}}
                                </label>
                            </li>
                            @if($permission->id == "5")
                            <h4 style="color: black">✔ Permisos para la gestión de Repuestos</h4>
                            @elseif($permission->id == "10")
                            <h4 style="color: black">✔ Permisos para la gestión de Clientes</h4>
                            @elseif($permission->id == "15")
                            <h4 style="color: black">✔ Permisos para la gestión de Proveedores</h4>
                            @elseif($permission->id == "20")
                            <h4 style="color: black">✔ Permisos para la gestión de Compras de Repuestos</h4>
                            @elseif($permission->id == "25")
                            <h4 style="color: black">✔ Permisos para la gestión de Registros de Servicios</h4>
                            @elseif($permission->id == "30")
                            <h4 style="color: black">✔ Permisos para la gestión de Usuarios</h4>
                            @elseif($permission->id == "35")
                            <h4 style="color: black">✔ Permisos para la Agenda de Trabajos</h4>
                            @elseif($permission->id == "40")
                            <h4 style="color: black">✔ Permisos para la gestión de Categorías de Servicios (personalización)</h4>
                            @elseif($permission->id == "45")
                            <h4 style="color: black">✔ Permisos para la gestión de Tipos de Servicios (personalización)</h4>
                            @elseif($permission->id == "50")
                            <h4 style="color: black">✔ Permisos para la gestión de Equipos Registrados</h4>
                            @elseif($permission->id == "55")
                            <h4 style="color: black">✔ Permisos para la gestión de Solicitudes de Servicios </h4>
                            @elseif($permission->id == "60")
                            <h4 style="color: black">✔ Permisos para la gestión de Roles de usuarios</h4>
                            @elseif($permission->id == "65")
                            <h4 style="color: black">✔ Permisos para la gestión de Categorías de Equipos (personalización)</h4>
                            @elseif($permission->id == "70")
                            <h4 style="color: black">✔ Permisos para la gestión de Tipos de Equipos (personalización)</h4>
                            @elseif($permission->id == "75")
                            <h4 style="color: black">✔ Permisos para la gestión de Marcas de Equipos (personalización)</h4>
                            @elseif($permission->id == "80")
                            <h4 style="color: black">✔ Permisos para visualizar información de inicio</h4>
                            @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="form-group row">
                        {{-- <button class="btn btn-primary" type="submit">Guardar</button> --}}
                        {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
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

