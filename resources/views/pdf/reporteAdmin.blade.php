@extends('layouts.layout')

@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="title_center">
           <center><h3>PRUDEVOLTS INICIO</h3></center> 

           
          </div>
          {{-- @include('inicio.graficas.search') --}}

         {{-- contenido de la pagina de inicio --}}


       

         <div class="row">
                      
          {{-- @can('Inicio.index')
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-check-square-o"></i>
              </div>
              <div class="count">{{$servicios ->servicios}}</div>
              
              <a href="{{url('ventas/venta')}}"><h3>Servicios Registrados</h3></a>
              
            </div>
          </div>
          @endcan

          @can('Inicio.index')
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-check"></i>
                </div>
                <div class="count">{{$cancelados ->servicios}}</div>
             
                <a href="{{url('ventas/venta')}}"><h3>Servicios Pagados</h3></a>
                
              </div>
            </div>
            @endcan
            
            @can('Inicio.index')
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-exclamation-triangle" ></i>
                </div>
                <div class="count">{{ $deudas ->servicios}}</div>
                
                <a href="{{url('ventas/venta')}}"><h3>Servicios a deuda </h3></a>
             
              </div>
            </div>
            @endcan
            @can('Inicio.index')
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-sign-out"></i>
                </div>
                <div class="count">{{$serviciosPresupuestados->servicios}}</div>
                <a href="{{url('ventas/venta')}}"><h3>Servicios Presupuestados </h3></a>
              </div>
            </div>
            @endcan
            <div class="clearfix"></div> --}}

{{-- SECCION VISIBLE A LOS TECNICOS EN LAS QUE SE INCDICA LOS SERVICIOS QUE TIENE ASU MANDO Y EL ESTADO EN EL QUE VAN--}}
          {{-- @can('Inicio.edit')  
         <h3> Estado de servicios asigandos a {{Auth::user()->name}}</h3>
         @endcan

         @can('Inicio.edit') 
         <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12" >
           <div class="tile-stats" style="border-color: #1ABB9C">
             <div class="icon"><i class="fa fa-bell-o" style="color: #d9e94cf6"></i>
             </div>
             <div class="count" style="color:#d9e94cf6">{{$recibido->recibido}}</div>
             <a href="{{url('ventas/venta')}}"><h3 style="color: #d9e94cf6">Recibidos</h3></a>
           </div>
         </div>
         @endcan
         @can('Inicio.edit')
         <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12" >
           <div class="tile-stats" style="border-color: #1ABB9C">
             <div class="icon"><i class="fa fa-sign-in" style="color:#747574 "></i>
             </div>
             <div class="count" style="color:#747574">{{$presupuesto->presupuesto}}</div>
             <h3 style="color: #747574">Presupuestos</h3></a>
           </div>
         </div>
         @endcan
         @can('Inicio.edit')  
         <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
           <div class="tile-stats" style="border-color: #1ABB9C">
             <div class="icon"><i class="fa fa-gears" style="color: #ff9900"></i>
             </div>
             <div class="count" style="color:#ff9900">{{$pendiente->pendiente}}</div>
             <a href="{{url('ventas/venta')}}"><h3 style="color: #ff9900">En Reparación</h3></a>
           </div>
         </div>
         @endcan
         @can('Inicio.edit')  
         <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
           <div class="tile-stats" style="border-color: #1ABB9C">
             <div class="icon"><i class="fa fa-thumbs-o-up" style="color: #0004ff"></i>
             </div>
             <div class="count" style="color:#0004ff">{{$listoparaentregar->listoparaentregar}}</div>
             <a href="{{url('ventas/venta')}}"><h3 style="color: #0004ff">Listos para Entregar</h3></a>
           </div>
         </div>
         @endcan
         @can('Inicio.edit') 
         <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12" >
           <div class="tile-stats" style="border-color: #1ABB9C">
             <div class="icon"><i class="fa fa-check" style="color: #2bff00"></i>
             </div>
             <div class="count" style="color:#2bff00">{{$entregado->entregado}}</div>
             <a href="{{url('ventas/venta')}}"><h3 style="color: #2bff00">Entregados</h3></a>
           </div>
         </div>
         @endcan

         
        
           
            @can('Inicio.edit')  
            <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12" >
              <div class="tile-stats" style="border-color: #1ABB9C">
                <div class="icon"><i class="fa fa-exclamation" style="color: #ff002b"></i>
                </div>
                <div class="count" style="color:#ff002b">{{$reclamo->reclamo}}</div>
                <a href="{{url('ventas/venta')}}"><h3 style="color: #ff002b">Reclamos</h3></a>
              </div>
            </div>
            @endcan
            @can('Inicio.edit') 
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
              <div class="tile-stats" style="border-color: #1ABB9C">
                <div class="icon"><i class="fa fa-exclamation" style="color: #c9d33f"></i>
                </div>
                <div class="count" style="color:#c9d33f">{{$entregado2->entregado2}}</div>
                <a href="{{url('ventas/venta')}}"><h3 style="color: #c9d33f">Reclamos Atendidos</h3></a>
              </div>
            </div>
            @endcan
 --}}

            {{-- @can('Inicio.index')
            <div class="clearfix"></div>
            <h3> Cantidad de servicios asignados a Cada Técnico</h3>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
               <table id="datatable" class="table table-striped table-bordered">
                 <thead style="background-color: #adadad">
                     <th>Tecnico</th>
                     <th>Cantida de servicios</th>
                     <th>Porcentaje %</th>
                    
                 </thead>
                 @foreach ($numero as $num)
                 <tr class="selected" id="fila.">
                     <td>{{ $num->name}}</td>
                     <td>{{ $num->id}}</td>
                     <td> 
                        <div class="progress">
                        <div class="progress-bar progress-bar-success active" role="progressbar" style="width: {{round($num->id * 100 / $total,2)}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{round($num->id * 100 / $total,2)}}</div>
                        </div>
                     </td>
                 </tr>
                
                 @endforeach
               </table>
             </div>
           </div>
           @endcan --}}

          {{-- DE FORMA EXPERIMENTAL  --}}
{{-- @can('Inicio.index') --}}
<div class="clearfix"></div>
<h3> Cantidad de servicios asignados a Cada Técnico</h3>
    <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
        <div class="col-md-3 col-sm-3 col-xs-3"> <h4 style="color: black"> Tecnico: </h4></div>
        <div class="col-md-1 col-sm-1 col-xs-1"> <h4 style="color: black"> Servicios: </h4></div>
        <div class="col-md-8 col-sm-8 col-xs-8"> <h4 style="color: black"> Porcentaje %: </h4></div>
        @foreach ($numero as $num)
          <div class="col-md-3 col-sm-3 col-xs-3"> <h4>{{ $num->name}}</h4> </div>
          <div class="col-md-1 col-sm-1 col-xs-1"> <h4>{{ $num->id}}</h4> </div>
          <div class="col-md-8 col-sm-8 col-xs-8">
             <div class="progress">
             <div class="progress-bar-info" role="progressbar" style="width: {{round($num->id * 100 / $total,2)}}%" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100"> <center><label style="color: black">{{round($num->id * 100 / $total,2)}} %</label></center></div>
             </div>        
          </div>
        @endforeach
       </div>
    </div>
{{-- @endcan --}}



         


          <!-- GRAFICA HORIZONTAL DE CARGA DE SERVICIOS POR TECNICO  -->
          {{-- @can('Inicio.show')
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Horizontal Bar</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div id="echart_bar_horizontal" style="height:370px;"></div>

              </div>
            </div>
          </div>
          @endcan --}}




{{-- <div class="row"> --}}
              {{-- <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                <table id="datatable" class="table table-striped table-bordered">
                  <thead style="background-color: #adadad">
                      <th>Tecnicos</th>
                      <th>Reclamos</th> --}}

                      {{-- <th>Pendientes</th> --}}
                      {{-- <th>Categoría</th>
                      <th>Stock</th>
                      <th>Imagen</th> --}}
                     
                  {{-- </thead>
                  @foreach ($tecnicosReclamos as $rec)
                  <tr>
                      <td>{{ $rec->tecnico}}</td>
                      <td>{{ $rec->reclamos}}</td> --}}

                      {{-- <td>{{ $pendiente->pendientes}}</td> --}}
                      {{-- <td>{{ $rec->categoria}}</td>
                      <td>{{ $rec->stock}}</td>
                      <td>
                      <img src="{{asset('imagenes/materiales/'.$rep->imagen)}}" alt="{{ $rep->nombre}}" height="100px" width="100px" class="img-thumbnail">
                      </td> --}}
                  {{-- </tr> --}}
                  {{-- @include('almacen.material.modal') --}}
                  {{-- @endforeach
                </table>
              </div>
            </div> --}}
          {{-- </div> --}}

          

        </div>
        <div class="clearfix"></div>
        </div>
      </div>
    </div>
</div>
@endsection