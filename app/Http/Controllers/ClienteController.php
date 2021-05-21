<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Persona;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientesExport;
use App\Imports\ClientesImport;

class ClienteController extends Controller
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
            $personas=DB::table('persona')
            -> where('nombre','LIKE','%'.$query.'%')
            -> where('tipo_persona','=','Cliente')
            -> orwhere('num_documento','LIKE','%'.$query.'%')
            -> where('tipo_persona','=','Cliente')
            -> orderBy('id_persona','desc')
            ->paginate(10);
            return view('ventas.cliente.index',["personas"=>$personas,"searchText"=>$query]);

        }
    }
    public function create()
    {
        return view("ventas.cliente.create");
    }
    public function create2()
    {
        return view("ventas.cliente.create2");
    }
    public function store(PersonaFormRequest $request)
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
        return Redirect:: to('ventas/cliente');
        
    }
    public function store2(PersonaFormRequest $request)
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
        return Redirect:: to('ventas/equipo/create2');
        //return view('ventas.venta.create',['searchText'=>$request->get('nombre')]);
    }
    public function show($id)
    {
        return view("ventas.cliente.show",["persona"=> Persona::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("ventas.cliente.edit",["persona"=> Persona::findOrFail($id)]);
    }
    //public function update(PersonaFormRequest $request, $id)
    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
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
        return Redirect:: to('ventas/cliente');
    }
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona -> tipo_persona = 'Inactivo';
        $persona -> update();
        return Redirect::to('ventas/cliente');

    }

    public function exportExcel()
    {
        return Excel::download(new ClientesExport, 'Clientes-registrados.xlsx');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ClientesImport, $file);
        return back()->with('message','Importacion de clientes completada');
    }


}
