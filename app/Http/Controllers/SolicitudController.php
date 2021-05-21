<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Solicitud;
use App\Persona;
use App\Http\Requests\SolicitudFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class SolicitudController extends Controller
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
            $solicitudes=DB::table('solicitud as s')
            ->join('persona as p','s.cliente','=','p.id_persona')
            ->select('s.id_solicitud','p.nombre as cliente','p.telefono','s.estado','s.descripcion','s.fecha_creacion','s.fecha_actualizacion')
            -> where('p.nombre','LIKE','%'.$query.'%')
            -> where('condicion','=','1')
            -> orderBy('id_solicitud','desc')
            ->paginate(10);
            return view('solicitudes.solicitud.index',["solicitudes"=>$solicitudes,"searchText"=>$query]);

        }
    }
    public function create1 ()
    {
        $cliente=DB::table('persona')-> where('tipo_persona','=','Cliente')->get();
        return view("solicitudes.solicitud.create1",["cliente"=>$cliente]);
    }

    public function create2 (Request $request)//en caso de que el cliente este registrado
    {

        if($request)
        {
        $query=trim($request->get('searchText'));
        
        $personas=DB::table('persona')
        ->select('nombre','telefono','direccion','tipo_documento','num_documento','email','id_persona')
        ->where('tipo_persona','=','Cliente')
        ->where('id_persona','=',$query)
        // ->where('nombre','LIKE','%'.$query.'%')
       //->groupBy('id_persona','nombre');
        ->first();    
        }
        // return json_encode($personas);
        return view("solicitudes.solicitud.create2",["personas"=>$personas]);        
    }

    public function create3 ()//en caso de que el cliente se nuevo !!!!!! 
    {
        return view("solicitudes.solicitud.create3");
    }
    public function store(SolicitudFormRequest $request)
    {
        $persona = Persona::findOrFail($request -> get('id_persona'));
        $persona ->nombre = $request -> get ('nombre');
        $persona ->tipo_documento = $request -> get ('tipo_documento');
        $persona ->num_documento = $request -> get ('num_documento');
        $persona ->direccion = $request -> get ('direccion');
        $persona ->telefono = $request -> get ('telefono');
        $persona ->email = $request -> get ('email');
        $persona ->coordenadas = $request -> get ('coordenadas');
        $mytime = Carbon::now('America/La_Paz');
        $persona ->fecha_hora = $mytime -> toDateTime();
        $persona->update();

        $solicitud = new Solicitud();
        $solicitud ->cliente = $request -> get('cliente');
        $solicitud ->estado = $request -> get ('estado');
        $solicitud ->descripcion = $request -> get ('descripcion');
        $solicitud ->condicion = '1';
        $mytime = Carbon::now('America/La_Paz');
        $solicitud ->fecha_creacion = $mytime -> toDateTime();
        $solicitud ->fecha_actualizacion = $mytime -> toDateTime();
        $solicitud ->save();
        return Redirect:: to('solicitudes/solicitud');
    }
    public function store2(Request $request)
    {
        $persona = new Persona;
        $persona ->tipo_persona='Cliente';
        $persona ->nombre = $request -> get ('nombre');
        $persona ->tipo_documento = $request -> get ('tipo_documento');
        $persona ->num_documento = $request -> get ('num_documento');
        $persona ->direccion = $request -> get ('direccion');
        $persona ->telefono = $request -> get ('telefono');
        $persona ->email = $request -> get ('email');
        $persona ->coordenadas = $request -> get ('coordenadas');
        $mytime = Carbon::now('America/La_Paz');
        $persona ->fecha_hora = $mytime -> toDateTime();
        $persona ->save();

        $ultimo = DB::table('persona')
        -> latest('id_persona')
        -> first();

        $solicitud = new Solicitud();
        $solicitud ->cliente = $ultimo->id_persona;
        $solicitud ->estado = $request -> get ('estado');
        $solicitud ->descripcion = $request -> get ('descripcion');
        $solicitud ->condicion = '1';
        $mytime = Carbon::now('America/La_Paz');
        $solicitud ->fecha_creacion = $mytime -> toDateTime();
        $solicitud ->fecha_actualizacion = $mytime -> toDateTime();
        $solicitud ->save();
        return Redirect:: to('solicitudes/solicitud');
    }
    public function show($id)
    {
        $cliente=DB::table('solicitud as s')
        ->join ('persona as p','s.cliente','=','p.id_persona')
        ->select('s.id_solicitud','p.nombre as cliente','p.telefono','p.direccion','s.descripcion','s.estado','s.fecha_actualizacion')
        ->where('s.id_solicitud','=',$id)
        ->where('p.tipo_persona','=','Cliente')
        ->where('s.condicion','=','1')
        ->first();
        return view("solicitudes.solicitud.show",["cliente"=> $cliente]);
    }
    public function edit($id)
    {
        $solicitud = Solicitud::FindOrFail($id);
        $cliente = DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        return view("solicitudes.solicitud.edit",["solicitud"=>$solicitud ,"cliente"=>$cliente]);
    }
    public function update(SolicitudFormRequest $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud ->cliente = $request -> get ('cliente');
        $solicitud ->estado = $request -> get ('estado');
        $solicitud ->descripcion = $request -> get ('descripcion');
        $solicitud ->condicion = '1';
        $mytime = Carbon::now('America/La_Paz');
        // $solicitud ->fecha_creacion = $mytime -> toDateTime();
        $solicitud ->fecha_actualizacion = $mytime -> toDateTime();
        $solicitud->update();
        return Redirect::to('solicitudes/solicitud');
    }
    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud -> condicion = '0';
        $solicitud -> update();
        return Redirect::to('solicitudes/solicitud');
    }
    public function actualizarSolicitud($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud -> estado = 'Atendido';
        $solicitud -> update();

        Session::flash('message','Solicitud actualizada exitosamente');
        return Redirect::to('solicitudes/solicitud');
    }

}
