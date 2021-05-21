<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipo;
use App\Http\Requests\EquipoFormRequest;
use Illuminate\Support\Facades\Request as Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EquipoExport;

class EquipoController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request -> get('searchText'));
            $equipos=DB::table('equipo as e')
            ->join('persona as p','e.persona','=','p.id_persona')
            ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
            ->join('marca as m','e.marca','=','m.id_marca')
            ->select('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','p.nombre as propietario','m.nombre as marca','e.imagen','e.fecha_hora','e.estado')
            ->where('e.estado','=','Activo')
            -> where('e.serial','LIKE','%'.$query.'%')
           // -> orwhere('p.nombre','LIKE','%'.$query.'%')
            -> orderBy('e.id_equipo','desc')
            ->paginate(7);
            return view('ventas.equipo.index',["equipos"=>$equipos,"searchText"=>$query]);

        }
    }
    public function create()
    {
        $propietarios=DB::table('persona')-> where('tipo_persona','=','Cliente')->get();
        $tipo_equipos=DB::table('tipo_equipo')->where('estado','=','Activo')->get();
        $marcas=DB::table('marca')->where('condicion','=','1')->get();
        return view("ventas.equipo.create",["propietarios"=>$propietarios,"tipo_equipos"=>$tipo_equipos,"marcas"=>$marcas]);
    }
    public function create2()
    {
        $propietarios=DB::table('persona')
        -> where('tipo_persona','=','Cliente')
        ->latest('id_persona')
        ->first();
        //->get()
        //->last();
        //->get();
        $tipo_equipos=DB::table('tipo_equipo')->where('estado','=','Activo')->get();
        $marcas=DB::table('marca')->where('condicion','=','1')->get();
        return view("ventas.equipo.create2",["propietarios"=>$propietarios,"tipo_equipos"=>$tipo_equipos,"marcas"=>$marcas]);
    }
    public function create3($cliente)
    {
        // $query=trim($cliente -> nombre);
        $propietarios=DB::table('persona')
        -> where('tipo_persona','=','Cliente')
        -> where('id_persona','=',$cliente)
        //->latest('id_persona')
        ->first();
        //->get()
        //->last();
        //->get();
        $tipo_equipos=DB::table('tipo_equipo')->where('estado','=','Activo')->get();
        $marcas=DB::table('marca')->where('condicion','=','1')->get();
        return view("ventas.equipo.create3",["propietarios"=>$propietarios,"tipo_equipos"=>$tipo_equipos,"marcas"=>$marcas]);
    }
    public function store(Request $request)
    {
       // DB::beginTransaction();
        $equipo = new Equipo();
        $equipo ->persona = $request -> get ('persona');
        $equipo ->serial = $request -> get ('serial');
        $equipo ->tipo_equipo = $request -> get ('tipo_equipo');
        $equipo ->color = $request -> get ('color');
        $equipo ->marca = $request -> get ('marca');
        if(Input::hasFile('imagen')) 
        {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/equipos/',$file->getClientOriginalName());
            $equipo->imagen=$file->getClientOriginalName();
        }
        $mytime = Carbon::now('America/La_Paz');
        $equipo ->fecha_hora = $mytime -> toDateTime();
        $equipo ->estado = 'Activo';
        $equipo->save();
      // DB::commit();
        return Redirect::to('ventas/equipo');
    }

    public function store2(Request $request)
    {
       // DB::beginTransaction();
        $equipo = new Equipo();
        $equipo ->persona = $request -> get ('persona');
        $equipo ->serial = $request -> get ('serial');
        $equipo ->tipo_equipo = $request -> get ('tipo_equipo');
        $equipo ->color = $request -> get ('color');
        $equipo ->marca = $request -> get ('marca');
        if(Input::hasFile('imagen')) 
        {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/equipos/',$file->getClientOriginalName());
            $equipo->imagen=$file->getClientOriginalName();
        }
        $mytime = Carbon::now('America/La_Paz');
        $equipo ->fecha_hora = $mytime -> toDateTime();
        $equipo ->estado = 'Activo';
        $equipo->save();
      // DB::commit();
        return Redirect::to('ventas/venta/create0');
    }
    
    public function show($id)
    {
        //$equipo=Equipo::FindOrFail($id);
        $cliente=DB::table('equipo as e')
            ->join('persona as p','e.persona','=','p.id_persona')
            ->join('tipo_equipo as t','e.tipo_equipo','=','t.id_tipo_equipo')
            ->join('marca as m','e.marca','=','m.id_marca')
            //->select('e.id_equipo','p.nombre','e.fecha_hora','p.direccion','p.telefono')
            ->select('e.id_equipo','e.serial','t.nombre as tipo_equipo','e.color','p.nombre','m.nombre as marca','e.imagen','e.fecha_hora','e.estado','p.direccion','p.telefono')
            -> where('e.id_equipo','=',$id)
            -> where('e.estado','=','Activo')
            -> where('p.tipo_persona','=','Cliente')
            //-> groupBy('e.id_equipo','p.nombre','e.fecha_hora','p.direccion','p.telefono')
            //->groupBy('e.id_equipo','e.serial','e.tipo_equipo','e.color','p.nombre','e.marca','e.imagen','e.fecha_hora','e.estado','p.direccion','p.telefono')
            ->first();
        
            return view("ventas.equipo.show",["cliente"=>$cliente]);
    }
    public function edit($id)
    {
        $equipo=Equipo::FindOrFail($id);
        $propietarios=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        $tipo_equipos=DB::table('tipo_equipo')->where('estado','=','Activo')->get();
        $marcas=DB::table('marca')->where('condicion','=','1')->get();
        return view("ventas.equipo.edit",["equipo"=> $equipo,"propietarios"=>$propietarios,"tipo_equipos"=>$tipo_equipos,"marcas"=>$marcas]);
    }
    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo ->persona = $request -> get ('persona');
        $equipo ->serial = $request -> get ('serial');
        $equipo ->tipo_equipo = $request -> get ('tipo_equipo');
        $equipo ->color = $request -> get ('color');
        $equipo ->marca = $request -> get ('marca');
        $mytime = Carbon::now('America/La_Paz');
        $equipo ->fecha_hora = $mytime -> toDateTime();

        if(Input::hasFile('imagen'))
        {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/equipos/',$file->getClientOriginalName());
            $equipo->imagen=$file->getClientOriginalName();

        }


        $equipo->update();
        return Redirect:: to('ventas/equipo');
    }
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo -> estado = 'Inactivo';
        $equipo -> update();
        return Redirect::to('ventas/equipo');

    }
    public function exportExcel()
    {
        return Excel::download(new EquipoExport, 'Equipos-registrados.xlsx');
    }
}
