<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Solicitud2;
use App\Http\Requests\Solicitud2FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Mail;
use App\Mail\prudevoltsmail;
use Mail;



class Solicitud2Controller extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $solicitudes=DB::table('solicitudes')
            //->join('persona as p','s.cliente','=','p.id_persona')
            ->select('id_solicitud','nombre','telefono','direccion','problema','estado','fecha_creacion','fecha_actualizacion')
            -> where('problema','LIKE','%'.$query.'%')
            -> where('condicion','=','1')
            -> orderBy('id_solicitud','desc')
            ->paginate(10);
            return view('solicitudes.solicitud2.index',["solicitudes"=>$solicitudes,"searchText"=>$query]);

        }
    }
    public function create()
    {
        //$cliente=DB::table('persona')-> where('tipo_persona','=','Cliente')->get();
        //return view("solicitudes.solicitud.create",["cliente"=>$cliente]);
        return view("solicitudes.solicitud2.create");
    }
    public function store(Solicitud2FormRequest $request)
    {
        $solicitud = new Solicitud2();
        $solicitud -> nombre = $request->get('nombre');
        $solicitud -> telefono = $request->get('telefono');
        $solicitud -> direccion = $request->get('direccion');
        $solicitud -> problema = $request->get('problema');
        $solicitud -> condicion = '1';
        $solicitud -> estado = $request->get('estado');
        $mytime = Carbon::now('America/La_Paz');
        $solicitud -> fecha_creacion = $mytime -> toDateTime();
        $solicitud -> fecha_actualizacion = $mytime ->toDateTime();
        $solicitud -> save();
        return Redirect:: to('solicitudes/solicitud2');
    }
    public function show($id)
    {
        $cliente=DB::table('solicitudes')
        //->join ('persona as p','s.cliente','=','p.id_persona')
        ->select('id_solicitud','nombre','telefono','direccion','problema','estado','fecha_actualizacion')
        ->where('id_solicitud','=',$id)
        // ->where('p.tipo_persona','=','Cliente')
        ->where('condicion','=','1')
        ->first();
        return view("solicitudes.solicitud2.show",["cliente"=> $cliente]);
    }
    public function edit($id)
    {
        $solicitud = Solicitud2::FindOrFail($id);
        //$cliente = DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        //return view("solicitudes.solicitud.edit",["solicitud"=>$solicitud ,"cliente"=>$cliente]);

        return view("solicitudes.solicitud2.edit",["solicitud"=>$solicitud]);
    }
    public function update(Solicitud2FormRequest $request, $id)
    {
        $solicitud = Solicitud2::findOrFail($id);
        $solicitud -> nombre = $request->get('nombre');
        $solicitud -> telefono = $request->get('telefono');
        $solicitud -> direccion = $request->get('direccion');
        $solicitud -> problema = $request->get('problema');
        $solicitud -> condicion = '1';
        $solicitud -> estado = $request->get('estado');
        $mytime = Carbon::now('America/La_Paz');
        $solicitud -> fecha_creacion = $mytime -> toDateTime();
        $solicitud -> fecha_actualizacion = $mytime ->toDateTime();
        $solicitud->update();
        return Redirect::to('solicitudes/solicitud2');
    }
    public function destroy($id)
    {
        $solicitud = Solicitud2::findOrFail($id);
        $solicitud -> condicion = '0';
        $solicitud -> update();
        return Redirect::to('solicitudes/solicitud2');
    }

    public function actualizarSolicitud($id)
    {
        $solicitud = solicitud2::findOrFail($id);
        $solicitud -> estado = 'Atendido';
        $solicitud -> update();

        Session::flash('message','Solicitud actualizada exitosamente');
        return Redirect::to('solicitudes/solicitud2');
    }
}
