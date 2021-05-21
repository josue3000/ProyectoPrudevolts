<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ReclamoFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ReclamoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $reclamos=DB::table('reclamo as r')
            ->join('persona as p','r.cliente','=','p.id_persona')
            ->select('r.id_reclamo','p.nombre as cliente','r.estado','r.descripcion','r.fecha_creacion','r.fecha_actualizacion','r.id_servicio')
            -> where('p.nombre','LIKE','%'.$query.'%')
            -> where('r.condicion','=','1')
            -> orderBy('r.id_reclamo','desc')
            -> groupBy('r.id_reclamo','p.nombre','r.estado','r.descripcion','r.fecha_creacion','r.fecha_actualizacion','r.id_servicio')
            ->paginate(10);
            return view('reclamos.reclamo.index',["reclamos"=>$reclamos,"searchText"=>$query]);

        }
    }
    public function create()
    {
        $cliente=DB::table('persona')-> where('tipo_persona','=','Cliente')->get();
        $servicio=DB::table('venta_servicio')-> where('condicion','=','1')->get();
        return view("reclamos.reclamo.create",["cliente"=>$cliente,"servicio"=>$servicio]);
    }
    public function store(ReclamoFormRequest $request)
    {
        $reclamo = new Reclamo();
        $reclamo ->cliente = $request -> get ('cliente');
        $reclamo ->id_servicio = $request -> get ('id_servicio');
        $reclamo ->estado = $request -> get ('estado');
        $reclamo ->descripcion = $request -> get ('descripcion');
        $reclamo ->condicion = '1';
        $mytime = Carbon::now('America/La_Paz');
        $reclamo ->fecha_creacion = $mytime -> toDateTime();
        $reclamo ->fecha_actualizacion = $mytime -> toDateTime();

        $existencia = DB::table('venta_servicio')
        -> select('id_venta')
        -> where('id_cliente','=',$request->get('cliente'))
        ->get();

        $contar = 0; 
        // $encontrado = '0';
         if(empty($existencia))
         {
            // $encontrado = '0';
            Session::flash('message','Servicio no asociado al cliente');
            return Redirect:: to('reclamos/reclamo/create');
         }
        else 
         {
            while($contar < count($existencia))
            {
                if($existencia[$contar]->id_venta == $request->get('id_servicio'))
                {
                    // $encontrado = '1';
                    $reclamo->save();
                    return Redirect:: to('reclamos/reclamo');
                }
                else
                {
                    // $encontrado = '0';
                    Session::flash('message','Servicio no asociado al cliente');
                    return Redirect:: to('reclamos/reclamo/create');
                }
                $contar = $contar + 1 ; 
            }
         }
        // if($encontrado == '1')
        // {
        //     $reclamo->save();
        //     return Redirect:: to('reclamos/reclamo');
        // }
        // else
        // {
        //     //return json_encode('servicio no encontrado');
            Session::flash('message','Servicio no Encontrado');
            return Redirect:: to('reclamos/reclamo/create');
        // }

    }
    public function show($id)
    {
        $cliente=DB::table('reclamo as r')
        ->join ('persona as p','r.cliente','=','p.id_persona')
        ->select('r.id_reclamo','p.nombre as cliente','p.telefono','p.direccion','r.descripcion','r.id_servicio','r.estado','r.fecha_actualizacion')
        ->where('r.id_reclamo','=',$id)
        ->where('p.tipo_persona','=','Cliente')
        ->where('r.condicion','=','1')
        ->first();
        return view("reclamos.reclamo.show",["cliente"=> $cliente]);
    }
    public function edit($id)
    {
        $reclamo = Reclamo::FindOrFail($id);
        $servicio=DB::table('venta_servicio')-> where('condicion','=','1')->get();
        $cliente = DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        return view("reclamos.reclamo.edit",["reclamo"=>$reclamo ,"cliente"=>$cliente, "servicio"=>$servicio]);
    }
    public function update(Request $request, $id)
    {
        $reclamo = Reclamo::findOrFail($id);
        $reclamo ->cliente = $request -> get ('cliente');
        $reclamo ->estado = $request -> get ('estado');
        $reclamo ->id_servicio = $request -> get ('id_servicio');
        $reclamo ->descripcion = $request -> get ('descripcion');
        $reclamo ->condicion = '1';
        $mytime = Carbon::now('America/La_Paz');
        // $reclamo ->fecha_creacion = $mytime -> toDateTime();
        $reclamo ->fecha_actualizacion = $mytime -> toDateTime();
        $reclamo->update();
        return Redirect::to('reclamos/reclamo');
    }
    public function destroy($id)
    {
        $marca = Reclamo::findOrFail($id);
        $marca -> condicion = '0';
        $marca -> update();
        return Redirect::to('reclamos/reclamo');
    }
    public function actualizarReclamo($id)
    {
        $reclamo = Reclamo::findOrFail($id);
        $reclamo -> estado = 'Reclamo Atendido';
        $reclamo -> update();

        Session::flash('message','Registro actualizado exitosamente');
        return Redirect::to('reclamos/reclamo');
    }
}
