<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaMaterial;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaMaterialFormRequest;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Support\Facades\DB;


class CategoriaMaterialController extends Controller
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
            $categorias=DB::table('categoria_material')
            -> where('nombre','LIKE','%'.$query.'%')
            -> where('condicion','=','1')
            -> orderBy('id_categoria_material','desc')
            ->paginate(7);
            return view('almacen.categoriaMaterial.index',["categorias"=>$categorias,"searchText"=>$query]);

        }
    }
    public function create()
    {
        return view("almacen.categoriaMaterial.create");
    }
    public function store(CategoriaMaterialFormRequest $request)
    {
        $categoria = new CategoriaMaterial;
        $categoria ->nombre = $request -> get ('nombre');
        $categoria ->descripcion = $request -> get ('descripcion');
        $categoria ->condicion = '1';
        $categoria ->save();
        return Redirect:: to('almacen/categoriaMaterial');
    }
    public function show($id)
    {
        return view("almacen.categoriaMaterial.show",["categoria"=> CategoriaMaterial::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.categoriaMaterial.edit",["categoria"=> CategoriaMaterial::findOrFail($id)]);
    }
    public function update(Request $request, $id)
    {
        $categoria = CategoriaMaterial::findOrFail($id);
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->update();
        return Redirect:: to('almacen/categoriaMaterial');
    }
    public function destroy($id)
    {
        $categoria = CategoriaMaterial::findOrFail($id);
        $categoria -> condicion = '0';
        $categoria -> update();
        return Redirect::to('almacen/categoriaMaterial');

    }


}

