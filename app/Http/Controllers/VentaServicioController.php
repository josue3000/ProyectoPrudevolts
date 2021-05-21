<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as Input;
use App\Http\Requests\VentaServicioFormRequest;
use Illuminate\Support\Facades\Auth;
use App\VentaServicio;
use App\DetalleVenta;
use App\DetalleServicio;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServiciosExport;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Support\Carbon;
// use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionEntrega;
use App\Mail\NotificacionPresupuesto;


use Response;
use Illuminate\Support\Collection;
use PhpParser\Node\Expr\Empty_;

class VentaServicioController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            if(Auth::user()->hasRole('Admin'))
            {
                $query=trim($request->get('searchText'));
                $ventas =DB::table('venta_servicio as v')
                ->join('persona as p','v.id_cliente','=','p.id_persona')
                ->join('users as u','v.tecnico','=','u.id')
                // ->inerjoin('equipo as e','p.id_persona','=','e.persona')
                // ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
                // ->join('marca as m','e.marca','=','m.id_marca')
                // //->join('detalle_venta as dv','v.id_venta','=','dv.id_venta')
                ->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo')
                ->where('p.nombre','LIKE','%'.$query.'%')
                ->where('condicion','=','1')
                //->where('v.tecnico','=',Auth::user()->id)
                //->where('v.tecnico','=',Auth::Role()->nombre)
                ->orderBy('v.id_venta','desc')
                ->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.tipo_comprobante','v.num_autorizacion','v.num_factura','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo')
                ->paginate(7);
                //return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
                return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
            }
            else
            {
                $query=trim($request->get('searchText'));
                $ventas =DB::table('venta_servicio as v')
                ->join('persona as p','v.id_cliente','=','p.id_persona')
                ->join('users as u','v.tecnico','=','u.id')
                // ->inerjoin('equipo as e','p.id_persona','=','e.persona')
                // ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
                // ->join('marca as m','e.marca','=','m.id_marca')
                // //->join('detalle_venta as dv','v.id_venta','=','dv.id_venta')
                ->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo')
                ->where('p.nombre','LIKE','%'.$query.'%')
                ->where('condicion','=','1')
                ->where('v.tecnico','=',Auth::user()->id)
                //->where('v.tecnico','=',Auth::Role()->nombre)
                ->orderBy('v.id_venta','desc')
               // ->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.tipo_comprobante','v.num_autorizacion','v.num_factura','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','u.name')
                ->paginate(7);
                //return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
                return view('ventas.venta.index2',["ventas"=>$ventas,"searchText"=>$query]);
            }

            
        }
       // return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
           
    }

    public function create0()
    {

        $categoria_servicios=DB::table('categoria_servicio')
        ->where('condicion','=','1')
        //->where('nombre','LIKE','%'.$query2.'%')
        ->get();

        $personas=DB::table('persona')
        ->where('tipo_persona','=','Cliente')
        ->latest('id_persona')
        //->where('nombre','LIKE','%'.$query.'%')
       //->groupBy('id_persona','nombre');
        ->get();
        return view("ventas.venta.create0",["personas"=>$personas,"categoria_servicios"=>$categoria_servicios]);
   
    }

    public function create1(Request $request)
    {

        if($request)
        {
        $query=trim($request->get('searchText'));
        $query2=trim($request->get('searchText2'));
        $personas=DB::table('persona')
        ->where('tipo_persona','=','Cliente')
        ->where('nombre','LIKE','%'.$query.'%')
       //->groupBy('id_persona','nombre');
        ->get();


        $equipos=DB::table('equipo as e')
        ->join('persona as p','e.persona','=','p.id_persona')
        ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
        ->join('marca as m','e.marca','=','m.id_marca')
        ->select('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','m.nombre as marca','e.estado','e.imagen','p.nombre')
        ->where('e.estado','=','Activo')
        ->where('p.tipo_persona','=','Cliente')
        ->where('t.estado','=','Activo')
        ->where('m.condicion','=','1')
        //->where('p.nombre','=',$query)
        ->where('p.nombre','LIKE','%'.$query.'%')
        ->groupBy('e.id_equipo','e.serial','t.nombre','e.color','m.nombre','e.estado','e.imagen','p.nombre')
        ->get();
        $propietarios=DB::table('persona')
        -> where('tipo_persona','=','Cliente')
        // -> where('nombre','=',$query)
        ->where('nombre','LIKE','%'.$query.'%')
        ->get();
        $tipo_equipos=DB::table('tipo_equipo')->where('estado','=','Activo')->get();
        $marcas=DB::table('marca')->where('condicion','=','1')->get();

        $categoria_servicios=DB::table('categoria_servicio')
        ->where('condicion','=','1')
        ->where('nombre','LIKE','%'.$query2.'%')
        ->get();
        
        $servicios=DB::table('servicio as s')
        ->join('categoria_servicio as c','s.id_categoria','=','c.id_categoria_servicio')
        ->select('s.id_servicio','s.nombre','s.precio_venta_servicio','s.estado','s.descripcion','c.nombre as categoria')
        ->where('s.estado','=','Activo')
        ->where('c.nombre','LIKE','%'.$query2.'%')
        ->groupBy('s.id_servicio','s.nombre','s.precio_venta_servicio','s.estado','s.descripcion','categoria')
        ->get();

       }
        return view("ventas.venta.create1",["personas"=>$personas,"categoria_servicios"=>$categoria_servicios,"equipos"=>$equipos]);
   
    }



    public function create(Request $request)
    {
        if($request)
        {
        $query=trim($request->get('searchText'));
        $query2=trim($request->get('searchText2'));
        $query3=trim($request->get('searchText3'));
        $personas=DB::table('persona')
        ->where('tipo_persona','=','Cliente')
        ->where('nombre','LIKE','%'.$query.'%')
       //->groupBy('id_persona','nombre');
        // ->get();
        ->first();
   
        $equipos=DB::table('equipo as e')
        ->join('persona as p','e.persona','=','p.id_persona')
        ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
        ->join('marca as m','e.marca','=','m.id_marca')
        ->select('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','m.nombre as marca','e.estado','e.imagen','p.nombre')
        ->where('e.estado','=','Activo')
        ->where('p.tipo_persona','=','Cliente')
        ->where('t.estado','=','Activo')
        ->where('m.condicion','=','1')
        //->where('p.nombre','=',$query)
        ->where('e.id_equipo','=',$query3)
        //->where('p.nombre','LIKE','%'.$query.'%')
        ->groupBy('e.id_equipo','e.serial','t.nombre','e.color','m.nombre','e.estado','e.imagen','p.nombre')
        ->get();
        $propietarios=DB::table('persona')
        -> where('tipo_persona','=','Cliente')
        // -> where('nombre','=',$query)
        ->where('nombre','LIKE','%'.$query.'%')
        ->get();
        $tipo_equipos=DB::table('tipo_equipo')->where('estado','=','Activo')->get();
        $marcas=DB::table('marca')->where('condicion','=','1')->get();

        $categoria_servicios=DB::table('categoria_servicio')
        ->where('condicion','=','1')
        ->where('nombre','LIKE','%'.$query2.'%')
        ->get();
        
        $servicios=DB::table('servicio as s')
        ->join('categoria_servicio as c','s.id_categoria','=','c.id_categoria_servicio')
        ->select('s.id_servicio','s.nombre','s.precio_venta_servicio','s.estado','s.descripcion','c.nombre as categoria')
        ->where('s.estado','=','Activo')
        ->where('c.nombre','LIKE','%'.$query2.'%')
        ->groupBy('s.id_servicio','s.nombre','s.precio_venta_servicio','s.estado','s.descripcion','categoria')
        ->get();

       }
        $tecnicos= DB::table('users as u')
        ->join('model_has_roles as m','u.id','=','m.model_id')
        ->join('roles as r','m.role_id','=','r.id')
        ->select('u.id','u.name')
        ->where('r.name','=','Tecnico')
        ->groupBy('u.id','u.name')
        ->get();

        $ultimo = DB::table('venta_servicio')
        -> latest('id_venta')
        -> first();
       if(empty($ultimo))
       {
           $ultimo = (object)array("id_venta"=>'0');
       }

        $materiales=DB::table('material as mat')
        //->join('detalle_ingreso as di','mat.id_material','=','di.id_material')
        //->join('detalle_venta as dv','mat.id_material','=','dv.id_material')
        //->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material','mat.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))
        ->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material','mat.stock',DB::raw('mat.saldo/mat.stock as precio_promedio'))
       // ->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material','mat.stock',DB::raw('(sum(di.precio_compra * di.cantidad)') - DB::raw('sum(dv.precio_venta_material * dv.cantidad_material)') / DB::raw('mat.stock')  As ('precio_promedio'))
        ->where('mat.estado','=','Activo')
        ->where('mat.stock','>','0')
        // ->groupBy('mat.id_material','mat.stock')
        ->get();
        return view("ventas.venta.create",["personas"=>$personas,"materiales"=>$materiales,'equipos'=>$equipos,"ultimo"=>$ultimo,"categoria_servicios"=>$categoria_servicios,"servicios"=>$servicios,"tecnicos"=>$tecnicos,"propietarios"=>$propietarios,"tipo_equipos"=>$tipo_equipos,"marcas"=>$marcas,"searchText"=>$query]);
    }
    public function store(VentaServicioFormRequest $request)
    {
        // try{
            DB::beginTransaction();

            $venta=new VentaServicio();
            $venta->id_cliente=$request->get('id_cliente');
            $venta->equipo=$request->get('equipo');
            $venta->diagnostico=$request->get('diagnostico');
            $venta->tipo_comprobante=$request->get('tipo_comprobante');
            $venta->num_factura=$request->get('num_factura');
            $venta->num_autorizacion=$request->get('num_autorizacion');
            $venta->importe_total=$request->get('importe_total');
            $venta->total_servicio=$request->get('total_servicio');
            $venta->total_repuestos=$request->get('total_repuestos');
            $venta->categoria_servicio=$request->get('categoria_servicio');
            $venta->tecnico = $request->get('tecnico');
            $venta->diagnosticoTecnico = $request->get('diagnosticoTecnico');
            $venta->notas = $request->get('notas');

            $mytime = Carbon::now('America/La_Paz');
            $venta->fecha_hora=$mytime->toDateTime();
            $venta->fecha_actual=$mytime->toDateTime();
            $venta->debito_fiscal=$request -> get('debito_fiscal');
            $venta->estado_servicio=$request->get('estado_servicio');
            $venta->estado_pago=$request->get('estado_pago');
            $venta->condicion = '1';
            $venta->codigo = $request->get('codigo');
            $venta->save();

            $cont = 0;

            if($request->get('id_material') != "")
            {
                $id_material = $request->get('id_material');
                $cantidad_material = $request->get('cantidad_material');
                $descuento = $request->get('descuento');
                $precio_venta_material = $request->get('precio_venta_material');
                while($cont < count($id_material))
                {
                    $detalle = new DetalleVenta();
                    $detalle ->id_venta= $venta->id_venta;
                    $detalle ->id_material = $id_material[$cont];
                    $detalle ->cantidad_material = $cantidad_material[$cont];
                    $detalle ->descuento = $descuento[$cont];
                    $detalle ->precio_venta_material = $precio_venta_material[$cont];
    
                    $detalle ->save();
                    $cont=$cont+1;
                }
             
            }

            
            $id_servicio = $request->get('id_servicio');
            $descuento_servicio =$request->get('descuento_servicio');
            $precio_venta_servicio=$request->get('precio_venta_servicio');
            $conta=0;
            if($request->get('id_servicio') != "")
            {
            while($conta < count($id_servicio))
            {
                $detalle_servicio = new DetalleServicio();
                $detalle_servicio ->id_venta= $venta->id_venta;
                $detalle_servicio ->id_servicio = $id_servicio[$conta];
                $detalle_servicio ->descuento_servicio = $descuento_servicio[$conta];
                $detalle_servicio ->precio_venta_servicio = $precio_venta_servicio[$conta];

                $detalle_servicio ->save();
                $conta=$conta+1;
            }
           }

            DB::commit();
        // }catch(\Exception $e)
        // {
        //      DB::rollBack();
        //      //report($e);
        // }
        return Redirect::to('ventas/venta');
    }


    public function show($id)
    {
        if(Auth::user()->hasRole('Admin'))
            {
        $venta=DB::table('venta_servicio as v')
        ->join('persona as p','v.id_cliente','=','p.id_persona')
        //->join('detalle_venta as dv','v.id_venta','=','dv.id_venta')
       // ->join('detalle_servicio as ds','v.id_venta','=','ds.id_venta')
        ->join('equipo as e','e.persona','=','p.id_persona')
        ->join('users as u','v.tecnico','=','u.id')
        ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
        ->join('marca as m','e.marca','=','m.id_marca')
        ->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','e.serial','t.nombre as  tipo_equipo','m.nombre as marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos','u.name as tecnico','v.diagnosticoTecnico','v.notas','v.codigo')
        ->where('v.id_venta','=',$id)
       // ->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','e.serial','e.tipo_equipo','e.marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos')
        ->first();
        //posiblemete falle el adjuntar el v.importe_total al group by

        

        $detalles=DB::table('detalle_venta as d')
        ->join('material as a','d.id_material','=','a.id_material')
        ->select('a.nombre as material','d.cantidad_material','d.descuento','d.precio_venta_material')
        ->where('d.id_venta','=',$id)
        ->get();

        $detalles_servicio=DB::table('detalle_servicio as ds')
        ->join('servicio as s','ds.id_servicio','=','s.id_servicio')
        ->join('categoria_servicio as cs','cs.id_categoria_servicio','=','s.id_categoria')
        ->select('s.nombre as servicio','ds.descuento_servicio','ds.precio_venta_servicio','cs.nombre as categoria')
        ->where('ds.id_venta','=',$id)
        ->get();

        // $tecnico=DB::table('venta_servicio as v')
        // ->join('users as u','v.tecnico','=','u.id')
        // ->select('u.name')
        // ->where('v.id_venta','=',$id)
        // ->first();

        return view("ventas.venta.show",["venta"=>$venta,"detalles"=>$detalles,"detalles_servicio"=>$detalles_servicio]);
            }   
            
            else
            {
                $venta=DB::table('venta_servicio as v')
                ->join('persona as p','v.id_cliente','=','p.id_persona')
                //->join('detalle_venta as dv','v.id_venta','=','dv.id_venta')
               // ->join('detalle_servicio as ds','v.id_venta','=','ds.id_venta')
                ->join('equipo as e','e.persona','=','p.id_persona')
                ->join('users as u','v.tecnico','=','u.id')
                ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
                ->join('marca as m','e.marca','=','m.id_marca')
                ->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','e.serial','t.nombre as  tipo_equipo','m.nombre as marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos','u.name as tecnico','v.diagnosticoTecnico','v.notas','v.codigo')
                ->where('v.id_venta','=',$id)
               // ->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','e.serial','e.tipo_equipo','e.marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos')
                ->first();
                //posiblemete falle el adjuntar el v.importe_total al group by
        
                
        
                $detalles=DB::table('detalle_venta as d')
                ->join('material as a','d.id_material','=','a.id_material')
                ->select('a.nombre as material','d.cantidad_material','d.descuento','d.precio_venta_material')
                ->where('d.id_venta','=',$id)
                ->get();
        
                $detalles_servicio=DB::table('detalle_servicio as ds')
                ->join('servicio as s','ds.id_servicio','=','s.id_servicio')
                ->join('categoria_servicio as cs','cs.id_categoria_servicio','=','s.id_categoria')
                ->select('s.nombre as servicio','ds.descuento_servicio','ds.precio_venta_servicio','cs.nombre as categoria')
                ->where('ds.id_venta','=',$id)
                ->get();
        
                // $tecnico=DB::table('venta_servicio as v')
                // ->join('users as u','v.tecnico','=','u.id')
                // ->select('u.name')
                // ->where('v.id_venta','=',$id)
                // ->first();
        
                return view("ventas.venta.show2",["venta"=>$venta,"detalles"=>$detalles,"detalles_servicio"=>$detalles_servicio]);
                  

            }
    }


    public function edit($id)
    {
        if(Auth::user()->hasRole('Admin'))
            {
        $venta= VentaServicio::findOrFail($id);
        $categoria_servicio=DB::table('categoria_servicio')->where('condicion','=','1')->get();
        $persona = DB::table('persona')-> where('tipo_persona','=','Cliente')->get();
        // $equipo = DB::table('equipo')->where('estado','=','Activo')->get();
        // $equipo=DB::table('equipo as e')
        // ->join('persona as p','e.persona','=','p.id_persona')
        // ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
        // ->join('marca as m','e.marca','=','m.id_marca')
        // ->select('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','m.nombre as marca','e.estado','e.imagen','p.nombre')
        // ->where('e.estado','=','Activo')
        // ->groupBy('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','m.nombre as marca','e.estado','e.imagen','p.nombre')
        // ->get();

        $equipo=DB::table('equipo as e')
        ->join('persona as p','e.persona','=','p.id_persona')
        ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
        ->join('marca as m','e.marca','=','m.id_marca')
        ->select('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','m.nombre as marca','e.estado','e.imagen','p.nombre')
        ->where('e.estado','=','Activo')
        ->where('p.tipo_persona','=','Cliente')
        ->where('t.estado','=','Activo')
        ->where('m.condicion','=','1')
        ->groupBy('e.id_equipo','e.serial','t.nombre','e.color','m.nombre','e.estado','e.imagen','p.nombre')
        ->get();

        $servicios=DB::table('servicio as s')
        ->join('categoria_servicio as c','s.id_categoria','=','c.id_categoria_servicio')
        ->select('s.id_servicio','s.nombre','s.precio_venta_servicio','s.estado','s.descripcion','c.nombre as categoria')
        ->where('s.estado','=','Activo')
        ->where('s.id_categoria','=',$venta->categoria_servicio)
        ->groupBy('s.id_servicio','s.nombre','s.precio_venta_servicio','s.estado','s.descripcion','categoria')
        ->get();
        $materiales=DB::table('material as mat')
        // ->join('detalle_ingreso as di','mat.id_material','=','di.id_material')
        //->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material','mat.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))
        // ->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material','mat.stock',DB::raw('sum(di.precio_compra * cantidad)/mat.stock as precio_promedio'))
        ->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material','mat.stock',DB::raw('mat.saldo/mat.stock as precio_promedio'))
        ->where('mat.estado','=','Activo')
        ->where('mat.stock','>','0')
        // ->groupBy('material','mat.id_material','mat.stock')
        ->get();
        

        $detalles=DB::table('detalle_venta as d')
        ->join('material as a','d.id_material','=','a.id_material')
        ->select('a.id_material','a.nombre as material','d.cantidad_material','d.descuento','d.precio_venta_material','d.id_detalle_venta')
        ->where('d.id_venta','=',$id)
        ->get();

        $detalles_servicio=DB::table('detalle_servicio as ds')
        ->join('servicio as s','ds.id_servicio','=','s.id_servicio')
        ->join('categoria_servicio as cs','cs.id_categoria_servicio','=','s.id_categoria')
        ->select('s.id_servicio','s.nombre as servicio','ds.descuento_servicio','ds.precio_venta_servicio','cs.nombre as categoria','ds.id_detalle_servicio')
        ->where('ds.id_venta','=',$id)
        ->get();

        $tecnicos= DB::table('users as u')
        ->join('model_has_roles as m','u.id','=','m.model_id')
        ->join('roles as r','m.role_id','=','r.id')
        ->select('u.id','u.name')
        ->where('r.name','=','Tecnico')
        ->groupBy('u.id','u.name')
        ->get();
        return view("ventas.venta.edit",["venta"=> $venta,"categoria_servicio"=>$categoria_servicio,"persona"=>$persona,"equipo"=>$equipo,"detalles"=>$detalles,"detalles_servicio"=>$detalles_servicio,"servicios"=>$servicios,"materiales"=>$materiales,"tecnicos"=>$tecnicos]);
            }

            else
            {
                $venta= VentaServicio::findOrFail($id);
                $categoria_servicio=DB::table('categoria_servicio')
                ->where('id_categoria_servicio','=',$venta->categoria_servicio)
                ->where('condicion','=','1')
                ->get();
                $persona = DB::table('persona')
                ->where('tipo_persona','=','Cliente')
                ->where('id_persona','=',$venta->id_cliente)
                ->get();

                // $equipo = DB::table('equipo')->where('estado','=','Activo')->get();
                // $equipo=DB::table('equipo as e')
                // ->join('persona as p','e.persona','=','p.id_persona')
                // ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
                // ->join('marca as m','e.marca','=','m.id_marca')
                // ->select('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','m.nombre as marca','e.estado','e.imagen','p.nombre')
                // ->where('e.estado','=','Activo')
                // ->groupBy('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','m.nombre as marca','e.estado','e.imagen','p.nombre')
                // ->get();
        
                $equipo=DB::table('equipo as e')
                ->join('persona as p','e.persona','=','p.id_persona')
                ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
                ->join('marca as m','e.marca','=','m.id_marca')
                ->select('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','m.nombre as marca','e.estado','e.imagen','p.nombre')
                ->where('e.estado','=','Activo')
                ->where('p.tipo_persona','=','Cliente')
                ->where('t.estado','=','Activo')
                ->where('m.condicion','=','1')
                ->where('e.id_equipo','=',$venta->equipo)
                ->groupBy('e.id_equipo','e.serial','t.nombre','e.color','m.nombre','e.estado','e.imagen','p.nombre')
                ->get();
        
                $servicios=DB::table('servicio as s')
                ->join('categoria_servicio as c','s.id_categoria','=','c.id_categoria_servicio')
                ->select('s.id_servicio','s.nombre','s.precio_venta_servicio','s.estado','s.descripcion','c.nombre as categoria')
                ->where('s.estado','=','Activo')
                ->where('s.id_categoria','=',$venta->categoria_servicio)
                ->groupBy('s.id_servicio','s.nombre','s.precio_venta_servicio','s.estado','s.descripcion','categoria')
                ->get();
                $materiales=DB::table('material as mat')
                // ->join('detalle_ingreso as di','mat.id_material','=','di.id_material')
                //->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material','mat.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))
                // ->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material','mat.stock',DB::raw('sum(di.precio_compra * cantidad)/mat.stock as precio_promedio'))
                ->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material','mat.stock',DB::raw('mat.saldo/mat.stock as precio_promedio'))
                ->where('mat.estado','=','Activo')
                ->where('mat.stock','>','0')
                // ->groupBy('material','mat.id_material','mat.stock')
                ->get();
        
                $detalles=DB::table('detalle_venta as d')
                ->join('material as a','d.id_material','=','a.id_material')
                ->select('a.id_material','a.nombre as material','d.cantidad_material','d.descuento','d.precio_venta_material','d.id_detalle_venta')
                ->where('d.id_venta','=',$id)
                ->get();
        
                $detalles_servicio=DB::table('detalle_servicio as ds')
                ->join('servicio as s','ds.id_servicio','=','s.id_servicio')
                ->join('categoria_servicio as cs','cs.id_categoria_servicio','=','s.id_categoria')
                ->select('s.id_servicio','s.nombre as servicio','ds.descuento_servicio','ds.precio_venta_servicio','cs.nombre as categoria','ds.id_detalle_servicio')
                ->where('ds.id_venta','=',$id)
                ->get();
        
                $tecnicos= DB::table('users as u')
                ->join('model_has_roles as m','u.id','=','m.model_id')
                ->join('roles as r','m.role_id','=','r.id')
                ->select('u.id','u.name')
                ->where('r.name','=','Tecnico')
                ->groupBy('u.id','u.name')
                ->get();
                return view("ventas.venta.edit2",["venta"=> $venta,"categoria_servicio"=>$categoria_servicio,"persona"=>$persona,"equipo"=>$equipo,"detalles"=>$detalles,"detalles_servicio"=>$detalles_servicio,"servicios"=>$servicios,"materiales"=>$materiales,"tecnicos"=>$tecnicos]);
                    
            }
    }

    public function update(VentaServicioFormRequest $request, $id)
    {
  //    try{
    DB::beginTransaction();

    $venta=VentaServicio::findOrFail($id);
    $venta->id_cliente=$request->get('id_cliente');
    $venta->equipo=$request->get('equipo');
    $venta->diagnostico=$request->get('diagnostico');
    $venta->tipo_comprobante=$request->get('tipo_comprobante');
    $venta->num_factura=$request->get('num_factura');
    $venta->num_autorizacion=$request->get('num_autorizacion');
    $venta->importe_total=$request->get('importe_total');
    $venta->total_servicio=$request->get('total_servicio');
    $venta->total_repuestos=$request->get('total_repuestos');
    $venta->categoria_servicio=$request->get('categoria_servicio');
    $venta->tecnico = $request->get('tecnico');
    $venta->diagnosticoTecnico = $request->get('diagnosticoTecnico');
    $venta->notas = $request->get('notas');
    
    $mytime = Carbon::now('America/La_Paz');
    $venta->fecha_actual=$mytime->toDateTime();
    $venta->debito_fiscal=$request -> get('debito_fiscal');
    $venta->estado_servicio=$request->get('estado_servicio');
    $venta->estado_pago=$request->get('estado_pago');
    $venta->save();


    $email = DB::table('persona')
    ->select('persona.email')
    ->where('persona.id_persona','=',$request->get('id_cliente'))
    ->first();

    if($request->get('estado_servicio') == 'Listo para Entregar')
    {
        $venta=DB::table('venta_servicio as v')
        ->join('persona as p','v.id_cliente','=','p.id_persona')
        //->join('detalle_venta as dv','v.id_venta','=','dv.id_venta')
       // ->join('detalle_servicio as ds','v.id_venta','=','ds.id_venta')
        ->join('equipo as e','e.persona','=','p.id_persona')
        ->join('users as u','v.tecnico','=','u.id')
        ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
        ->join('marca as m','e.marca','=','m.id_marca')
        ->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','e.serial','t.nombre as  tipo_equipo','m.nombre as marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos','u.name as tecnico','v.diagnosticoTecnico','v.notas','v.codigo')
        ->where('v.id_venta','=',$id)
       // ->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','e.serial','e.tipo_equipo','e.marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos')
        ->first();
        //posiblemete falle el adjuntar el v.importe_total al group by
        

        //  Mail::to($email->email)-> send(new NotificacionEntrega(["venta"=>$venta,"detalles"=>$detalles,"detalles_servicio"=>$detalles_servicio]));
         Mail::to($email-> email)-> send(new NotificacionEntrega($id));
    }

    if($request->get('estado_pago') == 'Presupuesto')
    {
        Mail::to($email-> email)-> send(new NotificacionPresupuesto($id));
    }

    $id_material = $request->get('id_material');
    $cantidad_material = $request->get('cantidad_material');
    $descuento = $request->get('descuento');
    $precio_venta_material = $request->get('precio_venta_material');
    $id_detalle_venta = $request ->get('id_detalle_venta');


  $contar =0 ;

  if($request->get('id_detalle_venta') != "")
  {
  while($contar < count($id_detalle_venta))
  {
    DB::table('detalle_venta')
    ->where('detalle_venta.id_detalle_venta','=',$id_detalle_venta[$contar])
    ->delete();
    $contar = $contar+1;
  }
}

  
  $cont = 0;
  if($request->get('id_material') != "")
  {
    while($cont < count($id_material))
    {
        $detalle = new DetalleVenta();
        $detalle ->id_venta= $venta->id_venta;
        $detalle ->id_material = $id_material[$cont];
        $detalle ->cantidad_material = $cantidad_material[$cont];
        $detalle ->descuento = $descuento[$cont];
        $detalle ->precio_venta_material = $precio_venta_material[$cont];

        $detalle ->save();
        $cont=$cont+1;
    }

  }


    $id_servicio = $request->get('id_servicio');
    $descuento_servicio =$request->get('descuento_servicio');
    $precio_venta_servicio=$request->get('precio_venta_servicio');
    $id_detalle_servicio=$request->get('id_detalle_servicio');

    $contar_s =0 ;
    if($request->get('id_detalle_servicio') != "")
    {
        while($contar_s < count($id_detalle_servicio))
        {
          DB::table('detalle_servicio')
          ->where('detalle_servicio.id_detalle_servicio','=',$id_detalle_servicio[$contar_s])
          ->delete();
          $contar_s = $contar_s+1;
        }
    }
    

    $conta=0;
    if($request->get('id_servicio') != "")
    {
    while($conta < count($id_servicio))
    {
        $detalle_servicio = new DetalleServicio();
        $detalle_servicio ->id_venta= $venta->id_venta;
        $detalle_servicio ->id_servicio = $id_servicio[$conta];
        $detalle_servicio ->descuento_servicio = $descuento_servicio[$conta];
        $detalle_servicio ->precio_venta_servicio = $precio_venta_servicio[$conta];

        $detalle_servicio ->save();
        $conta=$conta+1;
    }
    }

    DB::commit();
// }catch(\Exception $e)
// {
//      DB::rollBack();
//      //report($e);
// }
return Redirect::to('ventas/venta');
    }

    public function destroy($id)
    {
        $detalles=DB::table('detalle_venta')
        //->join('material as a','d.id_material','=','a.id_material')
        ->select('id_detalle_venta','id_venta')
        ->where('id_venta','=',$id)
        ->delete();

        $venta=VentaServicio::FindOrFail($id);
        $venta->estado_servicio='Anulado';
        $venta->estado_pago='Anulado';
        $venta->condicion = '0';
        $venta->importe_total = $venta->importe_total -  $venta->total_repuestos;
        $venta->total_repuestos = '0';

        $venta->update();

        return Redirect::to('ventas/venta');
    }


    public function imprimir($id)
    {
        $venta=DB::table('venta_servicio as v')
        ->join('persona as p','v.id_cliente','=','p.id_persona')
        //->join('detalle_venta as dv','v.id_venta','=','dv.id_venta')
       // ->join('detalle_servicio as ds','v.id_venta','=','ds.id_venta')
        ->join('equipo as e','e.persona','=','p.id_persona')
        ->select('v.id_venta','v.fecha_hora','p.nombre','e.serial','e.tipo_equipo','e.marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos')
        ->where('v.id_venta','=',$id)
        ->groupBy('v.id_venta','v.fecha_hora','p.nombre','e.serial','e.tipo_equipo','e.marca','v.diagnostico','v.tipo_comprobante','v.num_factura','v.num_autorizacion','v.debito_fiscal','v.estado_servicio','v.estado_pago','v.importe_total','v.total_servicio','total_repuestos')
        ->first();
        //posiblemete falle el adjuntar el v.importe_total al group by

        // if()
        // {}
        $detalles=DB::table('detalle_venta as d')
        ->join('material as a','d.id_material','=','a.id_material')
        ->select('a.nombre as material','d.cantidad_material','d.descuento','d.precio_venta_material')
        ->where('d.id_venta','=',$id)
        ->get();

        $detalles_servicio=DB::table('detalle_servicio as ds')
        ->join('servicio as s','ds.id_servicio','=','s.id_servicio')
        ->join('categoria_servicio as cs','cs.id_categoria_servicio','=','s.id_categoria')
        ->select('s.nombre as servicio','ds.descuento_servicio','ds.precio_venta_servicio','cs.nombre as categoria')
        ->where('ds.id_venta','=',$id)
        ->get();

        $pdf = PDF::loadView('pdf.reporte',compact('venta','detalles','detalles_servicio'));
        
        return $pdf->download('reporte-servicio.pdf');
    // $clientes=DB::table('persona')
    // ->select(DB::raw('count(*) as clientes'))
    // ->where('tipo_persona','=','Cliente')
    // ->get();
    
    // $servicios=DB::table('venta_servicio')
    // ->select(DB::raw('count(*) as servicios'))
    // ->get();

    // $equipos=DB::table('equipo')
    // ->select(DB::raw('count(*) as equipos'))
    // ->where('estado','=','Activo')
    // ->get();

    // return view('inicio.index',["clientes"=>$clientes,"servicios"=>$servicios,"equipos"=>$equipos]);
    // return view('inicio.graficas.index');

    }

    public function exportExcel()
    {

        
        return Excel::download(new ServiciosExport, 'registros-servicios-realizados.xlsx');
    }
}
