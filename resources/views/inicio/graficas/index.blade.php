@extends('layouts.admin')
@section('contenido')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="title_center">
           <center><h3>PRUDEVOLTS INICIO</h3></center> 

           
          </div>
          @include('inicio.graficas.search')

         {{-- contenido de la pagina de inicio --}}


       

         <div class="row">
                      
          @can('Inicio.index')
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-check-square-o"></i>
              </div>
              <div class="count">{{$servicios ->servicios}}</div>
              {{-- <div class="count">176</div> --}}
              <a href="{{url('ventas/venta')}}"><h3>Servicios Registrados</h3></a>
              {{-- <p>Lorem ipsum psdea itgum rixt.</p> --}}
            </div>
          </div>
          @endcan

          @can('Inicio.index')
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-check"></i>
                </div>
                <div class="count">{{$cancelados ->servicios}}</div>
                {{-- <div class="count">176</div> --}}
                <a href="{{url('ventas/venta')}}"><h3>Servicios Pagados</h3></a>
                {{-- <p>Lorem ipsum psdea itgum rixt.</p> --}}
              </div>
            </div>
            @endcan
            
            @can('Inicio.index')
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-exclamation-triangle" ></i>
                </div>
                <div class="count">{{ $deudas ->servicios}}</div>
                {{-- <div class="count">176</div> --}}
                <a href="{{url('ventas/venta')}}"><h3>Servicios a deuda </h3></a>
                {{-- <p>Lorem ipsum psdea itgum rixt.</p> --}}
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
            <div class="clearfix"></div>

{{-- SECCION VISIBLE A LOS TECNICOS EN LAS QUE SE INCDICA LOS SERVICIOS QUE TIENE ASU MANDO Y EL ESTADO EN EL QUE VAN--}}
          @can('Inicio.edit')  
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
@can('Inicio.index')
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
@endcan



            <div class="form-group">
              <input type="hidden" name="enero" id="enero" class="form-control" value="{{ $enero->importe}}_{{$enero->servicios}}_{{$enero->repuestos}}">
              <input type="hidden" name="febrero" id="febrero" class="form-control" value="{{ $febrero->importe}}_{{$febrero->servicios}}_{{$febrero->repuestos}}">
              <input type="hidden" name="marzo" id="marzo" class="form-control" value="{{ $marzo->importe}}_{{$marzo->servicios}}_{{$marzo->repuestos}}">
              <input type="hidden" name="abril" id="abril" class="form-control" value="{{ $abril->importe}}_{{$abril->servicios}}_{{$abril->repuestos}}">
              <input type="hidden" name="mayo" id="mayo" class="form-control" value="{{ $mayo->importe}}_{{$mayo->servicios}}_{{$mayo->repuestos}}">
              <input type="hidden" name="junio" id="junio" class="form-control" value="{{ $junio->importe}}_{{$junio->servicios}}_{{$junio->repuestos}}">
              <input type="hidden" name="julio" id="julio" class="form-control" value="{{ $julio->importe}}_{{$julio->servicios}}_{{$julio->repuestos}}">
              <input type="hidden" name="agosto" id="agosto" class="form-control" value="{{ $agosto->importe}}_{{$agosto->servicios}}_{{$agosto->repuestos}}">
              <input type="hidden" name="septiembre" id="septiembre" class="form-control" value="{{ $septiembre->importe}}_{{$septiembre->servicios}}_{{$septiembre->repuestos}}">
              <input type="hidden" name="octubre" id="octubre" class="form-control" value="{{ $octubre->importe}}_{{$octubre->servicios}}_{{$octubre->repuestos}}">
              <input type="hidden" name="noviembre" id="noviembre" class="form-control" value="{{ $noviembre->importe}}_{{$noviembre->servicios}}_{{$noviembre->repuestos}}">
              <input type="hidden" name="diciembre" id="diciembre" class="form-control" value="{{ $diciembre->importe}}_{{$diciembre->servicios}}_{{$diciembre->repuestos}}">
          </div>



            <div class="clearfix"></div>


          @can('Inicio.show')
            <div class="row">
             
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <small>Totales de ganancias</small></h2>
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
                    <canvas id="mybarChart"></canvas>  <!-- ahi es donde se llama a la graFIAC -->
                  </div>
                </div>
              </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <small>Totales en servicios y repuestos</small></h2>
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
                    <canvas id="mybarChart2"></canvas>  <!-- ahi es donde se llama a la graFIAC -->
                  </div>
                </div>
              </div>
              
            </div>
          @endcan


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




          @can('Inicio.create')
            <h3> Repuestos que estan por terminarse</h3>
          @endcan  
            
          @can('Inicio.create')
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
             <table id="datatable" class="table table-striped table-bordered">
               <thead style="background-color: #adadad">
                   <th>ID</th>
                   <th>Nombre</th>
                   <th>Código</th>
                   <th>Categoría</th>
                   <th>Stock</th>
                   <th>Imagen</th>
                  
               </thead>
               @foreach ($repuestos as $rep)
               <tr>
                   <td>{{ $rep->id_material}}</td>
                   <td>{{ $rep->nombre}}</td>
                   <td>{{ $rep->codigo}}</td>
                   <td>{{ $rep->categoria}}</td>
                   <td>{{ $rep->stock}}</td>
                   <td>
                   <img src="{{asset('imagenes/materiales/'.$rep->imagen)}}" alt="{{ $rep->nombre}}" height="100px" width="100px" class="img-thumbnail">
                   </td>
               </tr>
               {{-- @include('almacen.material.modal') --}}
               @endforeach
             </table>
           </div>
         </div>
         @endcan

          



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

          <div class="clearfix"></div>

          @can('Inicio.destroy')
          <h3> Lista de servicios pendientes</h3>
          @endcan

          @can('Inicio.destroy')
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel"> 
                <div class="table-responsive">
                    
                        <table id="datatable" class="table table-striped table-bordered ">
                            <thead style="background-color: #5affdb">
                                <th>ID</th>
                                <th>Fecha</th>
                                {{-- <th>Fecha actualizada</th> --}}
                                <th>Cliente</th>
                                <th>Codigo</th>
                                {{-- <th>Número de Autorización</th>
                                <th>Número de Factura</th> --}}
                                {{-- <th>Debito Fiscal</th> --}}
                                {{-- <th>Equipo</th> --}}
                                <th>Total</th>
                                <th>Estado Servicio</th>
                                <th>Estado Pago</th>
                                <th>Tecnico</th>
                                {{-- <th>Opciones</th> --}}
                                
                            </thead>
                            @foreach ($ventasReparacion as $ven)
                            <tr>
                                <td>{{ $ven->id_venta}}</td>
                                {{-- <td>{{ $ven->fecha_hora}}</td> --}}
                                <td>{{ $ven->fecha_actual}}</td>
                                <td>{{ $ven->nombre}}</td>
                                <td>{{ $ven->codigo}}</td>
                                {{-- <td>{{ $ven->num_autorizacion}}</td>
                                <td>{{ $ven->num_factura}}</td> --}}
                                {{-- <td>{{ $ven->debito_fiscal}}</td> --}}
                                {{-- <td>{{ $ven->tipo_equipo}} : {{$ven->marca}}</td> --}}
                                <td>{{ $ven->importe_total}}</td>
                                <td>{{ $ven->estado_servicio}}</td>
                                <td>{{ $ven->estado_pago}}</td>
                                <td>{{ $ven->name}}</td>
                                {{--     
                                <td>
                                    @can('VentaServicio.edit')
                                    <a href="{{URL::action('VentaServicioController@edit', $ven->id_venta)}}"><button class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button></a>
                                    @endcan
                                    @can('VentaServicio.show')
                                    <a href="{{URL::action('VentaServicioController@show', $ven->id_venta)}}"><button class="btn btn-primary"><i class="fa fa-list"></i> Detalles</button></a>
                                    @endcan
                                    @can('VentaServicio.destroy')
                                    <a href="" data-target="#modal-delete-{{$ven->id_venta}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Anular</button></a>
                                    @endcan
                                </td> --}}
                            </tr>
                            {{-- @include('ventas.venta.modal') --}}
                            @endforeach  
                        </table>
                </div>
            </div> 
        </div>
        @endcan

        @can('Inicio.destroy')
        <h3> Lista de servicios Listos para Entregar</h3>
        @endcan

        @can('Inicio.destroy')
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel"> 
              <div class="table-responsive">
                  
                      <table id="datatable" class="table table-striped table-bordered ">
                          <thead style="background-color: #5affdb">
                              <th>ID</th>
                              <th>Fecha</th>
                              {{-- <th>Fecha actualizada</th> --}}
                              <th>Cliente</th>
                              <th>Codigo</th>
                              {{-- <th>Número de Autorización</th>
                              <th>Número de Factura</th> --}}
                              {{-- <th>Debito Fiscal</th> --}}
                              {{-- <th>Equipo</th> --}}
                              <th>Total</th>
                              <th>Estado Servicio</th>
                              <th>Estado Pago</th>
                              <th>Tecnico</th>
                              {{-- <th>Opciones</th> --}}
                              
                          </thead>
                          @foreach ($ventaListos as $ven)
                          <tr>
                              <td>{{ $ven->id_venta}}</td>
                              {{-- <td>{{ $ven->fecha_hora}}</td> --}}
                              <td>{{ $ven->fecha_actual}}</td>
                              <td>{{ $ven->nombre}}</td>
                              <td>{{ $ven->codigo}}</td>
                              {{-- <td>{{ $ven->num_autorizacion}}</td>
                              <td>{{ $ven->num_factura}}</td> --}}
                              {{-- <td>{{ $ven->debito_fiscal}}</td> --}}
                              {{-- <td>{{ $ven->tipo_equipo}} : {{$ven->marca}}</td> --}}
                              <td>{{ $ven->importe_total}}</td>
                              <td>{{ $ven->estado_servicio}}</td>
                              <td>{{ $ven->estado_pago}}</td>
                              <td>{{ $ven->name}}</td>
                              {{--     
                              <td>
                                  @can('VentaServicio.edit')
                                  <a href="{{URL::action('VentaServicioController@edit', $ven->id_venta)}}"><button class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button></a>
                                  @endcan
                                  @can('VentaServicio.show')
                                  <a href="{{URL::action('VentaServicioController@show', $ven->id_venta)}}"><button class="btn btn-primary"><i class="fa fa-list"></i> Detalles</button></a>
                                  @endcan
                                  @can('VentaServicio.destroy')
                                  <a href="" data-target="#modal-delete-{{$ven->id_venta}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Anular</button></a>
                                  @endcan
                              </td> --}}
                          </tr>
                          {{-- @include('ventas.venta.modal') --}}
                          @endforeach  
                      </table>
              </div>
          </div> 
      </div>
      @endcan


        <div class="clearfix"></div>
        @can('Inicio.destroy')
        <h3> Lista de servicios con Reclamo</h3>
        @endcan

        @can('Inicio.destroy')
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel"> 
              <div class="table-responsive">
                  
                      <table id="datatable" class="table table-striped table-bordered ">
                          <thead style="background-color: #5affdb">
                              <th>ID</th>
                              <th>Fecha</th>
                              {{-- <th>Fecha actualizada</th> --}}
                              <th>Cliente</th>
                              <th>Codigo</th>
                              {{-- <th>Número de Autorización</th>
                              <th>Número de Factura</th> --}}
                              {{-- <th>Debito Fiscal</th> --}}
                              {{-- <th>Equipo</th> --}}
                              <th>Total</th>
                              <th>Estado Servicio</th>
                              <th>Estado Pago</th>
                              <th>Tecnico</th>
                              {{-- <th>Opciones</th> --}}
                              
                          </thead>
                          @foreach ($ventasReclamos as $ven)
                          <tr>
                              <td>{{ $ven->id_venta}}</td>
                              {{-- <td>{{ $ven->fecha_hora}}</td> --}}
                              <td>{{ $ven->fecha_actual}}</td>
                              <td>{{ $ven->nombre}}</td>
                              <td>{{ $ven->codigo}}</td>
                              {{-- <td>{{ $ven->num_autorizacion}}</td>
                              <td>{{ $ven->num_factura}}</td> --}}
                              {{-- <td>{{ $ven->debito_fiscal}}</td> --}}
                              {{-- <td>{{ $ven->tipo_equipo}} : {{$ven->marca}}</td> --}}
                              <td>{{ $ven->importe_total}}</td>
                              <td>{{ $ven->estado_servicio}}</td>
                              <td>{{ $ven->estado_pago}}</td>
                              <td>{{ $ven->name}}</td>
                              {{--     
                              <td>
                                  @can('VentaServicio.edit')
                                  <a href="{{URL::action('VentaServicioController@edit', $ven->id_venta)}}"><button class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button></a>
                                  @endcan
                                  @can('VentaServicio.show')
                                  <a href="{{URL::action('VentaServicioController@show', $ven->id_venta)}}"><button class="btn btn-primary"><i class="fa fa-list"></i> Detalles</button></a>
                                  @endcan
                                  @can('VentaServicio.destroy')
                                  <a href="" data-target="#modal-delete-{{$ven->id_venta}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Anular</button></a>
                                  @endcan
                              </td> --}}
                          </tr>
                          {{-- @include('ventas.venta.modal') --}}
                          @endforeach  
                      </table>
              </div>
          </div> 
      </div>
      @endcan

      <div class="clearfix"></div>
      @can('Inicio.destroy')
      <h3> Lista de servicios Presupuestados</h3>
      @endcan

      @can('Inicio.destroy')
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel"> 
            <div class="table-responsive">
                
                    <table id="datatable" class="table table-striped table-bordered ">
                        <thead style="background-color: #5affdb">
                            <th>ID</th>
                            <th>Fecha</th>
                            {{-- <th>Fecha actualizada</th> --}}
                            <th>Cliente</th>
                            <th>Codigo</th>
                            {{-- <th>Número de Autorización</th>
                            <th>Número de Factura</th> --}}
                            {{-- <th>Debito Fiscal</th> --}}
                            {{-- <th>Equipo</th> --}}
                            <th>Total</th>
                            <th>Estado Servicio</th>
                            <th>Estado Pago</th>
                            <th>Tecnico</th>
                            {{-- <th>Opciones</th> --}}
                            
                        </thead>
                        @foreach ($presupuestos as $ven)
                        <tr>
                            <td>{{ $ven->id_venta}}</td>
                            {{-- <td>{{ $ven->fecha_hora}}</td> --}}
                            <td>{{ $ven->fecha_actual}}</td>
                            <td>{{ $ven->nombre}}</td>
                            <td>{{ $ven->codigo}}</td>
                            {{-- <td>{{ $ven->num_autorizacion}}</td>
                            <td>{{ $ven->num_factura}}</td> --}}
                            {{-- <td>{{ $ven->debito_fiscal}}</td> --}}
                            {{-- <td>{{ $ven->tipo_equipo}} : {{$ven->marca}}</td> --}}
                            <td>{{ $ven->importe_total}}</td>
                            <td>{{ $ven->estado_servicio}}</td>
                            <td>{{ $ven->estado_pago}}</td>
                            <td>{{ $ven->name}}</td>
                            {{--     
                            <td>
                                @can('VentaServicio.edit')
                                <a href="{{URL::action('VentaServicioController@edit', $ven->id_venta)}}"><button class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button></a>
                                @endcan
                                @can('VentaServicio.show')
                                <a href="{{URL::action('VentaServicioController@show', $ven->id_venta)}}"><button class="btn btn-primary"><i class="fa fa-list"></i> Detalles</button></a>
                                @endcan
                                @can('VentaServicio.destroy')
                                <a href="" data-target="#modal-delete-{{$ven->id_venta}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-remove"></i> Anular</button></a>
                                @endcan
                            </td> --}}
                        </tr>
                        {{-- @include('ventas.venta.modal') --}}
                        @endforeach  
                    </table>
            </div>
        </div> 
    </div>
    @endcan


    {{-- <li>
      <a href="https://www.google.com/maps/dir/-16.5245599,-68.0821239">
          Ver en Google Maps
      </a>
  </li> --}}






          <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                {{-- <a href="{{ route('venta.pdf',$venta->id_venta) }}"><button type="button" class="btn btn-success"  ><i class="fa fa-print"></i>  Imprimir</button></a> --}}
                <button type="button" class="btn btn-success" onclick="window.print();" ><i class="fa fa-print"></i>  Imprimir</button>
            </div>
        </div>

        </div>
        <div class="clearfix"></div>
        </div>
      </div>
    </div>
</div>
@endsection
