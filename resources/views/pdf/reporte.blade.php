<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prudevolts  </title>

   

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reporte <small>Resumen Informativo general</small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                            <center><h4>
                                Resumen de estado de los servicios a la fecha.              
                             </h4></center>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          
                          <address>

                              <strong>Servicios Registrados:</strong>
                              {{$servicios ->servicios}}<br>
                              <strong>Servicios Pagados:</strong>
                              {{$cancelados ->servicios}}<br> 
                              <strong>Servicios a Deuda:</strong>
                              {{$deudas ->servicios}}<br>
                              <strong>Servicios Presupuestados:</strong>
                              {{$serviciosPresupuestados->servicios}}<br>

                           </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                           <center><h4>Estados de los servicios asignados a: {{Auth::user()->name}} </h4></center>  
                          <address>
                              <strong>Servicios Recibidos: </strong>
                              {{$recibido->recibido}}<br>
                              <strong>Presupuestos: </strong>
                              {{$presupuesto->presupuesto}}<br> 
                              <strong>Sevicios en Reparación: </strong>
                              {{$pendiente->pendiente}}<br>
                              <strong>Listos para Entregar: </strong>
                              {{$listoparaentregar->listoparaentregar}}<br>
                              <strong>Servicios Entregados: </strong>
                              {{$entregado->entregado}}<br>
                              <strong>Reclamos: </strong>
                              {{$reclamo->reclamo}}<br>
                              <strong>Reclamos Atendidos:</strong>
                              {{$entregado2->entregado2}}<br>
                              
                           </address>
                        </div>
                        <!-- /.col -->
                        {{-- <div class="col-sm-4 invoice-col">
                          <b>Invoice #007612</b>
                          <br>
                          <br>
                          <b>Order ID:</b> 4F3S8J
                          <br>
                          <b>Payment Due:</b> 2/22/2014
                          <br>
                          <b>Account:</b> 968-34567
                        </div> --}}
                        <!-- /.col -->
                      {{-- </div> --}}
                      <!-- /.row -->

                      <!-- Table row -->

                      <center><h3> <small>Cantidad de servicios asignados los tecnicos</small></h3></center>

                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                             <table id="datatable" class="table table-striped table-bordered">
                               <thead style="background-color: #e4e4e4">
                                <tr>
                                   <th>Tecnico</th>
                                   <th>Cantida de servicios</th>
                                   <th>Porcentaje %</th>
                                </tr>
                               </thead>
                               <tbody>
                               @foreach ($numero as $num)
                               
                               <tr>
                                   <td>{{ $num->name}}</td>
                                   <td>{{ $num->id}}</td>
                                   <td>{{round($num->id * 100 / $total,2)}}</td>
                               
                               </tr>
                              
                               @endforeach
                            </tbody>
                            </table>
                           </div>
                         </div>
                        <!-- /.col -->
                      </div>


                      <center><h3> <small>Repuestos que están por terminarse</small></h3></center>

                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                             <table id="datatable" class="table table-striped table-bordered">
                               <thead style="background-color: #e4e4e4">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Categoría</th>
                                    <th>Stock</th>
                                    <th>Imagen</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach ($repuestos as $rep)
                                 <tr>
                                    <td>{{ $rep->id_material}}</td>
                                    <td>{{ $rep->nombre}}</td>
                                    <td>{{ $rep->codigo}}</td>
                                    <td>{{ $rep->categoria}}</td>
                                    <td>{{ $rep->stock}}</td>
                                    <td>
                                    <img src="../public/imagenes/materiales/.{{$rep->imagen}}" alt="{{ $rep->nombre}}" height="100px" width="100px" class="img-thumbnail">
                                    </td>
                                </tr>
                                {{-- @include('almacen.material.modal') --}}
                                @endforeach
                            </tbody>
                            </table>
                           </div>
                         </div>
                        <!-- /.col -->
                      </div>





                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        
                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead">Amount Due 2/22/2014</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td>$250.30</td>
                                </tr>
                                <tr>
                                  <th>Tax (9.3%)</th>
                                  <td>$10.34</td>
                                </tr>
                                <tr>
                                  <th>Shipping:</th>
                                  <td>$5.80</td>
                                </tr>
                                <tr>
                                  <th>Total:</th>
                                  <td>$265.24</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
         
        </footer>
        <!-- /footer content -->
      </div>
    </div>

   

  </body>
</html>

