<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
            .table{
                width: 100%;
                border: 1px solid #1607f0; 
                font: 12px sans-serif;
            }
            .img{
                width: 100px;
                height: 30px;
            }

            .lavel{
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: medium;
                
            }
            .h3{
                font: 1em sans-serif;
                font: small-caps;
                color: rgb(34, 46, 219);
            }
    </style>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

</head>
<body>

 <div class="row">
        <div class="col-md-12">
          <div class="x_panel">

            {{-- <div align="center"><img src="{{asset("production/images/imgenLogo.png")}}"></div> --}}
            <div align="center"><img src="production/images/imgenLogo.png" height="40px" width="180px"></div>
            {{-- <center><h3 > PRUDEVOLTS </h3></center> --}}

            <div style="background-color: #FF0000">_________________________________________________________________________</div>
            <div class="row">
                <div class="col-xs-12 table">


                    <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-globe"></i> Invoice.
                                          <small class="pull-right">Date: 16/08/2016</small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>



                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th style="width: 59%">Description</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Call of Duty</td>
                        <td>455-981-221</td>
                        <td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson
                        </td>
                        <td>$64.50</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Need for Speed IV</td>
                        <td>247-925-726</td>
                        <td>Wes Anderson umami biodiesel</td>
                        <td>$50.00</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Monsters DVD</td>
                        <td>735-845-642</td>
                        <td>Terry Richardson helvetica tousled street art master, El snort testosterone trophy driving gloves handsome letterpress erry Richardson helvetica tousled</td>
                        <td>$10.70</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Grown Ups Blue Ray</td>
                        <td>422-568-642</td>
                        <td>Tousled lomo letterpress erry Richardson helvetica tousled street art master helvetica tousled street art master, El snort testosterone</td>
                        <td>$25.99</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
          
    
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="id_cliente">Cliente:</label>
               <p>{{$venta->nombre}}</p>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="equipo">Equipo:</label>
               <p>{{$venta->tipo_equipo}} : {{$venta->nombre}} : {{$venta->serial}}</p>
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="diagnostico">Diagnostico:</label>
               <p>{{$venta->diagnostico}}</p>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="estado_pago">Estado pago:</label>
               <p>{{$venta->estado_pago}}</p>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="estado_servicio">Estado Servicio:</label>
               <p>{{$venta->estado_servicio}} </p>
            </div>
        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="">Tipo de Comprobante:</label>
               <p>{{$venta->tipo_comprobante}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_autorizacion">Número de Autorizacion:</label>
                <p>{{$venta->num_autorizacion}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_factura">Numero de Factura:</label>
                <p>{{$venta->num_factura}}</p>
            </div>
        </div>
    </div>


    



    <div class="row">   
        <div class="panel panel-primary">
            <div class="panel-body">


                {{-- LLENADO de la tabla de servicios --}}

    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="table-responsive">
        <table id="detalles_servicio" class="table table-striped">
            <thead style="background-color: #A9d0f5">
                {{-- <th>Opciones</th> --}}
                <th>Servicio</th>
                <th>Precio Venta</th>
                <th>Descuento</th>
                <th>Subtotal</th>
            </thead>
            <tfoot>
                {{-- <th>TOTAL</th> --}}
                <th>TOTAL</th>
                <th>--</th>
                <th>--</th>
                <th><h4 id="total_servicio">Bs. {{$venta->total_servicio}}</h4></th>
            </tfoot>
            <tbody>
                @foreach ($detalles_servicio as $det_s)
                    <tr>
                        <td>{{$det_s->servicio}} : {{$det_s->categoria}}</td>
                        <td>{{$det_s->precio_venta_servicio}}</td>
                        <td>{{$det_s->descuento_servicio}}</td>
                        <td>{{$det_s->precio_venta_servicio-$det_s->descuento_servicio}}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    </div>



          {{-- LLENADO DE LA TABLA detallede venta --}}
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="table-responsive">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hoover">
                        <thead style="background-color: #A9d0f5">
                            {{-- <th>Opciones</th> --}}
                            <th>Repuesto</th>
                            <th>Cantidad</th>
                            <th>Precio Venta</th>
                            <th>Precio Descuento</th>
                            <th>Subtotal</th>
                        </thead>
                        <tfoot>
                            {{-- <th>TOTAL</th> --}}
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total_venta">Bs. {{$venta->total_repuestos}}</h4></th>
                        </tfoot>
                        <tbody>
                            @foreach ($detalles as $det)
                                <tr>
                                    <td>{{$det->material}}</td>
                                    <td>{{$det->cantidad_material}}</td>
                                    <td>{{$det->precio_venta_material}}</td>
                                    <td>{{$det->descuento}}</td>
                                    <td>{{$det->cantidad_material*$det->precio_venta_material-$det->descuento}}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                </div>

                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                    <label for="importe_total">Importe Total Bs.</label>
                    {{-- <div class="form-group"> --}}
                        <p>{{$venta->importe_total}}</p>
                    {{-- </div> --}}
                {{-- </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> --}}
                    <label for="importe_total">Impuestos Bs.</label>
                    {{-- <div class="form-group"> --}}
                        
                        <p>{{$venta->debito_fiscal}}</p>
                    {{-- </div> --}}
                </div>



            </div>
        </div>

        
    </div>
          </div>
        </div>
    </div>
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>



</body>
</html>