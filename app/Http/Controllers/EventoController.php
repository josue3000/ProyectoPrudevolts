<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Evento;
use App\Http\Requests\EventoFormRequest;


class EventoController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {
      //  return view("eventos.evento");
        $personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        return view("eventos.evento",["personas"=>$personas]);
    }
    public function create()
    {
        $personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        return view("eventos.evento",["personas"=>$personas]);
    }
    public function store( Request $request)
    {
        // $datosEvento =request()->except(['_token','_method']);
        $datosEvento = request()->except(['_token','_method']);
        Evento::insert($datosEvento);
        print_r($datosEvento);
    }
    public function show()
    {
        
       // $personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        //return view("eventos.evento",["personas"=>$personas]);

        $data['evento']= Evento::all();
        return response()->json($data['evento']);
    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {
        $datosEvento = request()->except(['_token','_method']);
        $respuesta=Evento::where('id_evento','=',$id)->update($datosEvento);
        return response()->json($respuesta);
    }
    public function destroy($id)
    {
        $eventos=Evento::findOrFail($id);
        Evento::destroy($id);
        return response()->json($id);
    }
}
