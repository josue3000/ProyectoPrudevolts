<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoEquipo;
use App\Http\Requests\TipoEquipoFormRequest;
use Illuminate\Support\Facades\DB;

class TipoEquipoController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request -> get('searchText'));
            $tipoEquipo=DB::table('tipo_equipo as t')
            ->join('categoria_equipo as c','t.categoria','=','c.id_categoria')
            ->select('t.id_tipo_equipo','t.nombre','c.nombre as categoria','t.descripcion','t.estado')
            -> where('t.nombre','LIKE','%'.$query.'%')
            -> orderBy('t.id_tipo_equipo','desc')
            ->paginate(7);
            return view('equipos.tipoEquipo.index',["tipoEquipo"=>$tipoEquipo,"searchText"=>$query]);

        }
    }
    public function create()
    {
        $categorias=DB::table('categoria_equipo')-> where('condicion','=','1')->get();
        return view("equipos.tipoEquipo.create",["categorias"=>$categorias]);
    }
    public function store(TipoEquipoFormRequest $request)
    {
        $tipoEquipo = new TipoEquipo;
        $tipoEquipo ->categoria = $request -> get ('categoria');
        //$tipoEquipo ->codigo = $request -> get ('codigo');
        $tipoEquipo ->nombre = $request -> get ('nombre');
        //$tipoEquipo ->stock = $request -> get ('stock');
        $tipoEquipo ->descripcion = $request -> get ('descripcion');
        $tipoEquipo ->estado = 'Activo';

        $tipoEquipo ->save();
        return Redirect::to('equipos/tipoEquipo');
    }
    public function show($id)
    {
        return view("equipos.tipoEquipo.show",["tipoEquipo"=> TipoEquipo::findOrFail($id)]);
    }
    public function edit($id)
    {
        $tipoEquipo=TipoEquipo::FindOrFail($id);
        $categorias=DB::table('categoria_equipo')->where('condicion','=','1')->get();
        return view("equipos.tipoEquipo.edit",["tipoEquipo"=> $tipoEquipo,"categorias"=>$categorias]);
    }
    public function update(Request $request, $id)
    {
        $tipoEquipo = TipoEquipo::findOrFail($id);
        $tipoEquipo ->categoria = $request -> get ('categoria');
        //$tipoEquipo ->codigo = $request -> get ('codigo');
        $tipoEquipo ->nombre = $request -> get ('nombre');
        //$tipoEquipo ->stock = $request -> get ('stock');
        $tipoEquipo ->descripcion = $request -> get ('descripcion');

        $tipoEquipo->update();
        return Redirect:: to('equipos/tipoEquipo');
    }
    public function destroy($id)
    {
        $tipoEquipo = TipoEquipo::findOrFail($id);
        $tipoEquipo -> estado = 'Inactivo';
        $tipoEquipo -> update();
        return Redirect::to('equipos/tipoEquipo');

    }
}
