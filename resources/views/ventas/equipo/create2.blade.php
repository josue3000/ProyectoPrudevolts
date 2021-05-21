@extends('layouts.admin')
@section('contenido')
  
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Agregar Equipo</h3>
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


                    {{-- {!!Form::open(array('url'=>'ventas/equipo','method'=>'POST','autocomplete'=>'off','files'=>'true' ))!!} --}}
                    {!!Form::open(array('route'=>'equipo.store2','method'=>'POST','autocomplete'=>'off','files'=>'true' ))!!}
                    {!! Form::token() !!}

            <div class="row">
               
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="">Propietario</label>
                        {{-- <select name="persona" id="persona" class="form-control selectpicker" data-live-search="true">
                            @foreach ($propietarios as $prop)
                                <option value="{{$prop->id_persona}}">{{$prop->nombre}}</option>
                            @endforeach
                        </select> --}}
                        <input type="hidden" name="persona" value="{{$propietarios->id_persona}}" class="form-control">
                        <input type="text" name="persona_nombre" value="{{$propietarios->nombre}}" class="form-control">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="serial">Serial</label>
                    <input type="text" name="serial" required value="{{old('serial')}}" class="form-control" placeholder="Serial...">
                    </div>
                </div>

                {{-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="codigo">Tipo de Equipo</label>
                        <select name="tipo_equipo" id="tipo_equipo" class="form-control selectpicker" data-live-search="true">
                            <option value="Refrigerador tipo Escarcha">Refrigerador tipo Escarcha</option>
                            <option value="Refrigerador frio Seco analogico">Refrigerador frio seco analogico</option>
                            <option value="Refrigerador frio Seco digital" selected>Refrigerador frio Seco digital</option>
                            <option value="Frezzer Vertical">Frezzer Vertical</option>
                            <option value="Frezzer Horizontal">Frezzer Horizontal</option>
                            <option value="Mostrador">Mostrador</option>
                            <option value="Aire acondicionado domestico">Aire acondicionado domestico</option>
                            <option value="Aire acondicionado de precision">Aire acondicionado de precisión</option>
                            <option value="Camara Frigorifica">Camara Frigorifica</option>
                            <option value="Refrigerador de grado medico">Refrigerador de grado medico</option>
                            <option value="Frigobar escarcha">Frigobar escarcha</option>
                        </select>
                    </div>
                </div> --}}

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="codigo">Tipo de Equipo</label>
                        <select name="tipo_equipo" id="tipo_equipo" class="form-control selectpicker" data-live-search="true">
                            @foreach ($tipo_equipos as $tipo)
                            <option value="{{$tipo->id_tipo_equipo}}">{{$tipo->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="color">Color</label>
                        <select name="color" id="color" class="form-control selectpicker" data-live-search="true">
                            <option value="Blanco" selected>blanco</option>
                            <option value="Plomo" style="background-color: #C0C0C0">Plomo</option>
                            <option value="Negro" style="background-color: #000000">Negro</option>
                            <option value="Cafe" style="background-color:  	#8B4513">Cafe</option>
                            <option value="Azul" style="background-color: #0000FF">Azul</option>
                            <option value="Verde" style="background-color: #008000">Verde</option>
                            <option value="Amarillo" style="background-color: #FFFF00">Amarillo</option>
                            <option value="Naranja" style="background-color: #FFA500">Naranja</option>
                            <option value="Morado" style="background-color: #800080">Morado</option>
                            <option value="Rojo" style="background-color: #FF0000">Rojo</option>
                            <option value="Rosa" style="background-color: #FFC0CB">Rosa</option>
                        </select>
                    </div>
                </div>

                {{-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <select name="marca" id="marca" class="form-control selectpicker" data-live-search="true">
                            <option value="Electrolux" selected>Electrolux</option>
                            <option value="General Electric">General Electric</option>
                            <option value="Samsung">Samsung</option>
                            <option value="LG">LG</option>
                            <option value="Whirpool">Whirpool</option>
                            <option value="Mabe">Mabe</option>
                            <option value="Mademsa">Mademsa</option>
                            <option value="Daewoo">Daewoo</option>
                            <option value="Philips">Philips</option>
                            <option value="Oster">Oster</option>
                            <option value="Maytag">Maytag</option>
                            <option value="Uniflair">Uniflair</option>
                            <option value="Tecnostar">Tecnostar</option>
                            <option value="whestinghouse">whestinghouse</option>
                            <option value="IKA">IKA</option>
                            <option value="Brastem">Brastem</option>
                            <option value="Hoover">Hoover</option>
                            <option value="Consul">Consul</option>
                            <option value="Consul">Consul</option>
                        </select>
                    </div>
                </div> --}}

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <select name="marca" id="marca" class="form-control selectpicker" data-live-search="true">
                            @foreach ($marcas as $marca)
                                <option value="{{$marca->id_marca}}">{{$marca->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" class="form-control">
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

