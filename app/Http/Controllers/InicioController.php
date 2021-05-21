<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as Input;


class InicioController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {
        

         //return view('inicio.graficas.index',["clientes"=>$clientes,"servicios"=>$servicios,"equipos"=>$equipos]);
         //return view('inicio.index');
    }

    public function create()
    {
    
      //  return view('inicio.graficas.index');
    }

    public function store(Request $request)
    {
       //
      //  return view('inicio.graficas.index');
    }
    public function show(Request $request)
    {
      if($request)
      {
     $query=trim($request->get('searchText'));
        if($query == "")
        {
           $query = '2021';
        }



      $servicios=DB::table('venta_servicio')
      ->select(DB::raw('count(*) as servicios'))
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      //->get()
     ->first();

      $cancelados=DB::table('venta_servicio')
      ->select(DB::raw('count(*) as servicios'))
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->where('venta_servicio.condicion','=','1')
      ->first();

      $deudas=DB::table('venta_servicio')
      ->select(DB::raw('count(*) as servicios'))
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.estado_pago','=','Deuda')
      ->where('venta_servicio.condicion','=','1')
      ->first();

      $serviciosPresupuestados=DB::table('venta_servicio')
      ->select(DB::raw('count(*) as servicios'))
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.estado_pago','=','Presupuesto')
      ->where('venta_servicio.condicion','=','1')
      ->first();

      // $clientes=DB::table('persona')
      // ->select(DB::raw('count(*) as clientes'))
      // ->where('tipo_persona','=','Cliente')
      // ->where(DB::raw('YEAR(fecha_hora)'),'=',$query)
      // ->first();

      // $reclamos=DB::table('venta_servicio')
      // ->select(DB::raw('count(*) as reclamos'))
      // ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      // ->where('venta_servicio.estado_servicio','=','Reclamo')
      // ->first();

      // $equipos=DB::table('equipo')
      // ->select(DB::raw('count(*) as equipos'))
      // ->where('estado','=','Activo')
      // ->where(DB::raw('YEAR(fecha_hora)'),'=',$query)
      // ->first();
// para las graficas de la pagina de inicio
     


      $enero=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','01')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $febrero=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','02')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $marzo=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','03')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $abril=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','04')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $mayo=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','05')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $junio=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','06')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $julio=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','07')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $agosto=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','08')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $septiembre=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','09')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $octubre=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','10')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $noviembre=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','11')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
      $diciembre=DB::table('venta_servicio')
      ->select('total_venta','total_servicio','importe_total')
      ->select(DB::raw('sum(importe_total) as importe, sum(total_servicio) as servicios, sum(total_repuestos) as repuestos'))
      ->where(DB::raw('MONTH(fecha_actual)'),'=','12')
      ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      ->where('venta_servicio.condicion','=','1')
      ->where('venta_servicio.estado_pago','=','Cancelado')
      ->first();
       }
      

      //  $pendientes=DB::table('venta_servicio as v')
      //  ->join('users as u','v.tecnico','=','u.id')
      //  ->select(DB::raw('count(*) as pendientes'))
      //  ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
      //  ->where('u.name','=',Auth::user()->name)
      //  //->where('u.name','=','Federico Oberbrunner')
      //  ->where('v.estado_servicio','=','En Reparacion')
      //  ->first();

       $reclamo=DB::table('venta_servicio as v')
       ->join('users as u','v.tecnico','=','u.id')
       ->select(DB::raw('count(*) as reclamo'))
       ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
       ->where('v.tecnico','=',Auth::user()->id)
       //->where('u.name','=','Federico Oberbrunner')
       ->where('v.estado_servicio','=','Reclamo')
       ->where('v.condicion','=','1')
       ->first();

       $pendiente=DB::table('venta_servicio as v')
       ->join('users as u','v.tecnico','=','u.id')
       ->select(DB::raw('count(*) as pendiente'))
       ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
       //->where('u.name','=',Auth::user()->name)
       ->where('v.tecnico','=',Auth::user()->id)
       //->where('u.name','=','Federico Oberbrunner')
       ->where('v.estado_servicio','=','En Reparacion')
       ->where('v.condicion','=','1')
       ->first();

       $entregado2=DB::table('venta_servicio as v')
       ->join('users as u','v.tecnico','=','u.id')
       ->select(DB::raw('count(*) as entregado2'))
       ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
       //->where('u.name','=',Auth::user()->name)
       ->where('v.tecnico','=',Auth::user()->id)
       //->where('u.name','=','Federico Oberbrunner')
       ->where('v.estado_servicio','=','Reclamo Entregado')
       ->where('v.condicion','=','1')
       ->first();

       $entregado=DB::table('venta_servicio as v')
       ->join('users as u','v.tecnico','=','u.id')
       ->select(DB::raw('count(*) as entregado'))
       ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
       //->where('u.name','=',Auth::user()->name)
       ->where('v.tecnico','=',Auth::user()->id)
       //->where('u.name','=','Federico Oberbrunner')
       ->where('v.estado_servicio','=','Entregado')
       ->where('v.condicion','=','1')
       ->first();

       $presupuesto=DB::table('venta_servicio as v')
       ->join('users as u','v.tecnico','=','u.id')
       ->select(DB::raw('count(*) as presupuesto'))
       ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
       ->where('v.tecnico','=',Auth::user()->id)
       ->where('v.estado_servicio','=','Presupuesto')
       ->first();

       $recibido=DB::table('venta_servicio as v')
       ->join('users as u','v.tecnico','=','u.id')
       ->select(DB::raw('count(*) as recibido'))
       ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
       ->where('v.tecnico','=',Auth::user()->id)
       ->where('v.estado_servicio','=','Recibido')
       ->first();

       $listoparaentregar=DB::table('venta_servicio as v')
       ->join('users as u','v.tecnico','=','u.id')
       ->select(DB::raw('count(*) as listoparaentregar'))
       ->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
       ->where('v.tecnico','=',Auth::user()->id)
       ->where('v.estado_servicio','=','Listo para Entregar')
       ->first();

       // para una tabla en la que se muestran los repurestos que se estan por terminar

       $repuestos=DB::table('material as m')
       ->join('categoria_material as c','m.id_categoria','=','c.id_categoria_material')
       ->select('m.id_material','m.nombre','m.stock','m.codigo','m.imagen','c.nombre as categoria')
       ->where('m.stock','<','5')
       ->get();

      //  $tecnicosReclamos=DB::table('venta_servicio as v')
      //  ->join('users as u','v.tecnico','=','u.id')
      //  ->select(DB::raw('count(v.id_venta) as reclamos'),'u.name as tecnico')
      //  ->where('v.estado_servicio','=','reclamo')
      //  ->groupBy('v.id_venta','u.name')
      //  ->get();

      //  $tecnicosPendientes=DB::table('venta_servicio as v')
      //  ->join('users as u','v.tecnico','=','u.id')
      //  ->select(DB::raw('count(*) as pendintes','u.name as tecnico'))
      //  ->where('v.estado_servicio','=','En reparacion')
      //  ->get();

      //  $tecnicosReclamosEntregados=DB::table('venta_servicio as v')
      //  ->join('users as u','v.tecnico','=','u.id')
      //  ->select(DB::raw('count(*) as reclamos','u.name as tecnico'))
      //  ->where('v.estado_servicio','=','reclamo')
      //  ->get();

      //  $tecnicosEntregados=DB::table('venta_servicio as v')
      //  ->join('users as u','v.tecnico','=','u.id')
      //  ->select(DB::raw('count(*) as reclamos','u.name as tecnico'))
      //  ->where('v.estado_servicio','=','reclamo')
      //  ->get();

//--------SERVICIOS (EN REPARACION O PENDIENTES) SE MOSTRARA EN UNA TABLA

$ventasReparacion =DB::table('venta_servicio as v')
->join('persona as p','v.id_cliente','=','p.id_persona')
->join('users as u','v.tecnico','=','u.id')

->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
//->where('p.nombre','LIKE','%'.$query.'%')
->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
->where('v.estado_servicio','=','En Reparacion')
->where('condicion','=','1')

->orderBy('v.id_venta','desc')
->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
//->paginate(10);
->get();

//--------SERVICIOS (LISTOS PARA ENTREGAR) SE MOSTRARA EN UNA TABLA

$ventaListos =DB::table('venta_servicio as v')
->join('persona as p','v.id_cliente','=','p.id_persona')
->join('users as u','v.tecnico','=','u.id')

->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
//->where('p.nombre','LIKE','%'.$query.'%')
->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
->where('v.estado_servicio','=','Listo para Entregar')
->where('condicion','=','1')

->orderBy('v.id_venta','desc')
->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
//->paginate(10);
->get();

//--------SERVICIOS (EN RECLAMO) ESTA TAMBIEN SE MOSTRARA EN UNA TABLA
$ventasReclamos =DB::table('venta_servicio as v')
->join('persona as p','v.id_cliente','=','p.id_persona')
->join('users as u','v.tecnico','=','u.id')

->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
//->where('p.nombre','LIKE','%'.$query.'%')
->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
->where('v.estado_servicio','=','Reclamo')
->where('condicion','=','1')


->orderBy('v.id_venta','desc')
->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
//->paginate(10);
->get();

//--------SERVICIOS (PRESUPUESTOS) SE MOSTRARA EN UNA TABLA
$presupuestos =DB::table('venta_servicio as v')
->join('persona as p','v.id_cliente','=','p.id_persona')
->join('users as u','v.tecnico','=','u.id')

->select('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
//->where('p.nombre','LIKE','%'.$query.'%')
->where(DB::raw('YEAR(fecha_actual)'),'=',$query)
->where('v.estado_servicio','=','Presupuesto')
->where('condicion','=','1')


->orderBy('v.id_venta','desc')
->groupBy('v.id_venta','v.fecha_hora','v.fecha_actual','p.nombre','v.estado_servicio','v.estado_pago','v.importe_total','u.name','v.codigo','v.diagnosticoTecnico','v.notas')
//->paginate(10);
->get();


//------------ PARA DETERMINAR LA CANTIDAD DE SERVICIOS ASIGNADOS A CADA TECNICO 
$tecnicos = DB::table('users as u')
->join('model_has_roles as m','m.model_id','=','u.id')
->join('roles as r','r.id','=','m.role_id')
-> select('u.id','u.name')
->where('r.name','=','Tecnico')
->groupBy('u.id','u.name')
->get();

$contar=0;
$total=0;
//$numero= '';
 $numero = $tecnicos;

while($contar < count($tecnicos))
{
    $num=DB::table('venta_servicio as v')
    ->join('users as u','u.id','=','v.tecnico')
    ->select(DB::raw('count(*) as carga'),'u.name','v.tecnico')
    ->where('v.tecnico','=',$tecnicos[$contar]->id)
    ->where('v.estado_servicio','!=','entregado')
    ->where('v.estado_servicio','!=','Reclamo Atendido')
    ->where('v.condicion','=','1')
    ->groupBy('u.name','v.tecnico')
    ->get();

//return json_encode($num[0]->carga);

    if($num == '[]')
    {
      $numero[$contar]->id = '0';
    }
    else
    {
      $numero[$contar]->id = $num[0]->carga;
      $total = $total + $num[0]->carga;
    }
     
     //$numero[$contar]->id = $dato;
    // $numero[$contar]->name = $num[0]->name;
    //return json_encode($numero);
     $contar = $contar +1;
}

if($total == '0')
{
  $total == '1';
}
    // return json_encode($numero);
//$numero = $numer;


       return view('inicio.graficas.index',["cancelados"=>$cancelados,"servicios"=>$servicios,"deudas"=>$deudas,"reclamo"=>$reclamo,"pendiente"=>$pendiente,"entregado2"=>$entregado2,"entregado"=>$entregado,"recibido"=>$recibido,"listoparaentregar"=>$listoparaentregar,"repuestos"=>$repuestos,"ventasReparacion"=>$ventasReparacion,"ventasReclamos"=>$ventasReclamos,"presupuesto"=>$presupuesto,"presupuestos"=>$presupuestos,"serviciosPresupuestados"=>$serviciosPresupuestados,"total"=>$total,"enero"=>$enero,"febrero"=>$febrero,"marzo"=>$marzo,"abril"=>$abril,"mayo"=>$mayo,"junio"=>$junio,"julio"=>$julio,"agosto"=>$agosto,"septiembre"=>$septiembre,"octubre"=>$octubre,"noviembre"=>$noviembre,"diciembre"=>$diciembre,"numero"=>$numero,"ventaListos"=>$ventaListos]);
    
    //  return view('inicio.graficas.index');
    }
    public function edit($id)
    {
      // return view('inicio.graficas.index');
    }
    public function update(Request $request, $id)
    {
      // return view('inicio.graficas.index');
    }
    public function destroy($id)
    {
      // return view('inicio.graficas.index');
    }
}
