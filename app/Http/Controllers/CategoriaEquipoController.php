<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaEquipo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaEquipoFormRequest;
use Illuminate\Support\Facades\DB;

class CategoriaEquipoController extends Controller
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
            $categorias=DB::table('categoria_equipo')
            -> where('nombre','LIKE','%'.$query.'%')
            -> where('condicion','=','1')
            -> orderBy('id_categoria','desc')
            ->paginate(7);
            return view('equipos.categoriaEquipo.index',["categorias"=>$categorias,"searchText"=>$query]);

        }
    }
    public function create()
    {
        return view("equipos.categoriaEquipo.create");
    }
    public function store(CategoriaEquipoFormRequest $request)
    {
        $categoria = new CategoriaEquipo;
        $categoria ->nombre = $request -> get ('nombre');
        $categoria ->descripcion = $request -> get ('descripcion');
        $categoria ->condicion = '1';
        $categoria ->save();
        return Redirect:: to('equipos/categoriaEquipo');
    }
    public function show($id)
    {
        return view("equipos.categoriaEquipos.show",["categoria"=> CategoriaEquipo::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("equipos.categoriaEquipo.edit",["categoria"=> CategoriaEquipo::findOrFail($id)]);
    }
    public function update(Request $request, $id)
    {
        $categoria = CategoriaEquipo::findOrFail($id);
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->update();
        return Redirect:: to('equipos/categoriaEquipo');
    }
    public function destroy($id)
    {
        $categoria = CategoriaEquipo::findOrFail($id);
        $categoria -> condicion = '0';
        $categoria -> update();
        return Redirect::to('equipos/categoriaEquipo');

    }

}
