<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset("production/images/prudevolts.ico")}}" type="image/ico"/>
  
  

    <title>Prudevolts  </title>

   <link href="{{asset("../vendors/bootstrap/dist/css/bootstrap.min.css")}}" rel="stylesheet">
   <link href="{{asset("../vendors/bootstrap/dist/css/bootstrap-select.min.css")}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset("../vendors/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset("../vendors/nprogress/nprogress.css")}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset("../vendors/iCheck/skins/flat/green.css")}}" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="{{asset("../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css")}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset("../vendors/jqvmap/dist/jqvmap.min.css")}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset("../vendors/bootstrap-daterangepicker/daterangepicker.css")}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset("../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css")}}" rel="stylesheet">
    
    <link href="{{asset("../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css")}}" rel="stylesheet">

 <!-- FullCalendar -->
 <link href="{{asset("../vendors/fullcalendar/dist/fullcalendar.min.css")}}" rel="stylesheet">
 <link href="{{asset("../vendors/fullcalendar/dist/fullcalendar.print.css")}}" rel="stylesheet" media="print">

    <!-- Custom Theme Style -->
    <link href="{{asset("../build/css/custom.css")}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0">
              <a href="{{url('inicio/graficas')}}" class="site_title"><i class="fa fa-bolt"></i> <span>PrudeVolts</span></a>
              <!-- <a href="index.html" class="site_title"><i class="fa fa-paw">  </i>    <span>Gentelella Alela!</span></a> -->
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              {{-- <div class="profile_pic">
                <img src="{{asset("production/images/user1.jpg")}}" alt="..." class="img-circle profile_img">
              </div> --}}
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  <li><a href="{{url('inicio/graficas')}}"><i class="fa fa-home"></i> Inicio Prudevolts </a>
                    {{-- <ul class="nav child_menu">
                      <li><a href="{{url('inicio/graficas')}}">Tablero stock materiales</a></li>
                      <li><a href=" ">Tablero ventas </a></li>
                      <li><a href=" ">Tablero servicos</a></li>
                    </ul> --}}
                  </li>

                  <li><a><i class="fa fa-inbox"></i>Alamacén de Repuestos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @can('CategoriaMaterial.show')
                      <li><a href="{{url('almacen/categoriaMaterial')}}">Categorías de Repuestos</a></li>
                      @endcan
                      @can('Material.show')
                      <li><a href="{{url('almacen/material')}}">Ver Repuestos</a></li>
                      @endcan
                    </ul>
                  </li>
                  @can('Ingreso.show')
                  <li><a><i class="fa fa-shopping-cart"></i> Compras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('compras/ingreso')}}">Compras de repuestos</a></li>
                      <li><a href="{{url('compras/proveedor')}}">Proveedores</a></li>
                    </ul>
                  </li>
                  @endcan

                  @can('CategoriaServicio.show')
                  <li><a><i class="fa fa-tasks"></i> Personalizar categorías y tipos de servicios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('bancoServicio/categoriaServicio')}}">Categorías de Servicios</a></li>
                      <li><a href="{{url('bancoServicio/servicio')}}">Tipos Servicios</a></li>
                    </ul>
                  </li>
                  @endcan

                  @can('CategoriaEquipo.show')
                  <li><a><i class="fa fa-plug"></i>Personalizar Equipos(marcas y tipos) <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('equipos/categoriaEquipo')}}">Categorias de Equipos</a></li>
                      <li><a href="{{url('equipos/tipoEquipo')}}">Tipos de Equipos</a></li>
                      <li><a href="{{url('equipos/marca')}}">Marcas</a></li>
                    </ul>
                  </li>
                  @endcan

                  @can('VentaServicio.show')
                  <li><a><i class="fa fa-buysellads"></i>Gestión de Servicios y clientes <span class="fa fa-chevron-down"></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('ventas/venta')}}">Gestionar servicios</a></li> 
                      @can('Cliente.show')
                      <li><a href="{{url('ventas/cliente')}}">Gestión Clientes</a></li>
                      @endcan
                      @can('Equipo.show')
                      <li><a href="{{url('ventas/equipo')}}">Historial Equipos Registrados</a></li>
                      @endcan
                      {{-- <li><a href="index.html">Nueva Venta de Servicio</a></li> 
                      <li><a href="index.html">Servicios Pendientes</a></li>
                      <li><a href="index.html">Servicios con Saldo</a></li> --}}
                    </ul>
                  </li>
                  @endcan

                  @can('Sol.show')
                  <li><a href="{{url('solicitudes/solicitud')}}"><i class="fa fa-bell"></i> Solicitudes de Servicios </a>
                  </li>
                  <li><a href="{{url('reclamos/reclamo')}}"><i class="fa fa-exclamation-circle"></i> Reclamos </a>
                  </li>
                  @endcan

                  @can('Evento.show')
                  <li><a href="{{url('eventos/evento')}}"><i class="fa fa-calendar-check-o"></i>Agenda </a>
                  </li>
                  @endcan

                  {{-- @can('Cliente.show')
                  <li><a href="{{url('ventas/cliente')}}"><i class="fa fa-folder-open"></i>Clientes </a>
                  </li>
                  @endcan --}}
                  @can('Usuario.show')
                  <li><a><i class="fa fa-users"></i> Gestión de Usuarios <span class="fa fa-chevron-down"></a>
                    <ul class="nav child_menu">
                      @can('Usuario.show')
                      <li><a href="{{url('seguridad/usuario')}}"><i class="fa fa-user"></i>Usuarios </a>
                      </li>
                      @endcan
    
                      @can('Rol.show')
                      <li><a href="{{url('seguridad/roles')}}"><i class="fa fa-users"></i>Roles </a>
                      </li>
                      @endcan
                    </ul>
                  </li>
                  @endcan

                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons MENU DE LOS BOTONES DE ABAJO -->
            {{-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> --}}
              {{-- <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a> --}}
            </div>
            <!-- /menu footer buttons MENU DE LOS BOTONES DE ABAJO -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    {{-- <img src="{{asset("production/images/user1.jpg")}}" alt=""> --}}
                    {{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>

                  

                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    {{-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> --}}
                    <li ><a href="{{ route('logout') }}" ><i class="fa fa-sign-out pull-right" ></i> Salir</a></li>
                  </ul>
                  
                  
                </li>
                {{-- <a class="navbar-brand" href="#"><img src="{{asset("production/images/imgenLogo.png")}}" alt=""> </a> --}}
               <a class="navbar-brand" href="#"><img src="{{asset("production/images/imgenLogo.png")}}" alt=""> </a> 
              </ul>
              

            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        


                        <!-- page content   CONTENIDO DE LA PAGINA WEB USANDO ESTA PLANTILLA-->   
                        @yield('contenido')

                        <!-- page content end FINAL DEL CONTENIDO DE ESATA PLANTILLA JEJEJJEJ-->


        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Prudevolts- Todos los derechos reservados 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>



    <a href="https://web.whatsapp.com/" class="whatsapp ocultar-al-imprimir" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon ocultar-al-imprimir"></i></a>

    
    <!-- jQuery -->
    <script src="{{asset("../vendors/jquery/dist/jquery.min.js")}}"></script>

    @stack('scripts')
    @stack('scripts2')
    @stack('scriptCliente')


    <!-- Bootstrap -->
    <script src="{{asset("../vendors/bootstrap/dist/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("../vendors/bootstrap/dist/js/bootstrap-select.min.js")}}"></script>
    <!-- FastClick -->
    <script src="{{asset("../vendors/fastclick/lib/fastclick.js")}}"></script>
    <!-- NProgress -->
    <script src="{{asset("../vendors/nprogress/nprogress.js")}}"></script>
    <!-- Chart.js -->
    <script src="{{asset("../vendors/Chart.js/dist/Chart.min.js")}}"></script>
    <!-- gauge.js -->
    <script src="{{asset("../vendors/gauge.js/dist/gauge.min.js")}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset("../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js")}}"></script>
    <!-- iCheck -->
    <script src="{{asset("../vendors/iCheck/icheck.min.js")}}"></script>
    <!-- Skycons -->
    <script src="{{asset("../vendors/skycons/skycons.js")}}"></script>
    <!-- Flot -->
    <script src="{{asset("../vendors/Flot/jquery.flot.js")}}"></script>
    <script src="{{asset("../vendors/Flot/jquery.flot.pie.js")}}"></script>
    <script src="{{asset("../vendors/Flot/jquery.flot.time.js")}}"></script>
    <script src="{{asset("../vendors/Flot/jquery.flot.stack.js")}}"></script>
    <script src="{{asset("../vendors/Flot/jquery.flot.resize.js")}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset("../vendors/flot.orderbars/js/jquery.flot.orderBars.js")}}"></script>
    <script src="{{asset("../vendors/flot-spline/js/jquery.flot.spline.min.js")}}"></script>
    <script src="{{asset("../vendors/flot.curvedlines/curvedLines.js")}}"></script>
    <!-- DateJS -->
    <script src="{{asset("../vendors/DateJS/build/date.js")}}"></script>
    <!-- JQVMap -->
    <script src="{{asset("../vendors/jqvmap/dist/jquery.vmap.js")}}"></script>
    <script src="{{asset("../vendors/jqvmap/dist/maps/jquery.vmap.world.js")}}"></script>
    <script src="{{asset("../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js")}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset("../vendors/moment/min/moment.min.js")}}"></script>
    <script src="{{asset("../vendors/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
    <!-- jQuery Smart Wizard -->
    <script src="{{asset("../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js")}}"></script>
    <!-- Datatables -->
    <script src="{{asset("../vendors/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-buttons/js/buttons.flash.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js")}}"></script>
    <script src="{{asset("../vendors/datatables.net-scroller/js/dataTables.scroller.min.js")}}"></script>
    <script src="{{asset("../vendors/jszip/dist/jszip.min.js")}}"></script>
    <script src="{{asset("../vendors/pdfmake/build/pdfmake.min.js")}}"></script>
    <script src="{{asset("../vendors/pdfmake/build/vfs_fonts.js")}}"></script>

@yield('scripts1')



    <!-- Custom Theme Scripts -->
    <script src="{{asset("../build/js/custom.js")}}"></script>
	
  </body>
</html>
