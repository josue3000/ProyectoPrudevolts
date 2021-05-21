@extends('layouts.admin')
@section('contenido')

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            {{-- <div class="col-md-12 col-sm-12 col-xs-12"> --}}
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-heading" Rol></div>
                <div class="panel-body">
                    <p><strong>Nombre</strong>{{$role->name}}</p>
                    <p><strong>Tipo</strong>{{$role->guard_name}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
