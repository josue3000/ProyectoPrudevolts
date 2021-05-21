<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaServicio;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaServicioFormRequest;
use Illuminate\Support\Facades\DB;



class CategoriaServicioController extends Controller
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
            $categorias=DB::table('categoria_servicio')
            -> where('nombre','LIKE','%'.$query.'%')
            -> where('condicion','=','1')
            -> orderBy('id_categoria_servicio','desc')
            ->paginate(7);
            return view('bancoServicio.categoriaServicio.index',["categorias"=>$categorias,"searchText"=>$query]);

        }
    }
    public function create()
    {
        return view("bancoServicio.categoriaServicio.create");
    }
    public function store(CategoriaServicioFormRequest $request)
    {
        $categoria = new CategoriaServicio();
        $categoria ->nombre = $request -> get ('nombre');
        $categoria ->descripcion = $request -> get ('descripcion');
        $categoria ->condicion = '1';
        $categoria ->save();
        return Redirect:: to('bancoServicio/categoriaServicio');
    }
    public function show($id)
    {
        return view("bancoServicio.categoriaServicio.show",["categoria"=> CategoriaServicio::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("bancoServicio.categoriaServicio.edit",["categoria"=> CategoriaServicio::findOrFail($id)]);
    }
    public function update(Request $request, $id)
    {
        $categoria = CategoriaServicio::findOrFail($id);
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->update();
        return Redirect:: to('bancoServicio/categoriaServicio');
    }
    public function destroy($id)
    {
        $categoria = CategoriaServicio::findOrFail($id);
        $categoria -> condicion = '0';
        $categoria -> update();
        return Redirect::to('bancoServicio/categoriaServicio');
    }
}
