<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MarcaFormRequest;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
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
            $marcas=DB::table('marca')
            -> where('nombre','LIKE','%'.$query.'%')
            -> where('condicion','=','1')
            -> orderBy('id_marca','desc')
            ->paginate(7);
            return view('equipos.marca.index',["marcas"=>$marcas,"searchText"=>$query]);

        }
    }
    public function create()
    {
        return view("equipos.marca.create");
    }
    public function store(MarcaFormRequest $request)
    {
        $marca = new Marca;
        $marca ->nombre = $request -> get ('nombre');
        $marca ->descripcion = $request -> get ('descripcion');
        $marca ->condicion = '1';
        $marca ->save();
        return Redirect:: to('equipos/marca');
    }
    public function show($id)
    {
        return view("equipos.marca.show",["marca"=> Marca::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("equipos.marca.edit",["marca"=> Marca::findOrFail($id)]);
    }
    public function update(Request $request, $id)
    {
        $marca = Marca::findOrFail($id);
        $marca->nombre = $request->get('nombre');
        $marca->descripcion = $request->get('descripcion');
        $marca->update();
        return Redirect:: to('equipos/marca');
    }
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca -> condicion = '0';
        $marca -> update();
        return Redirect::to('equipos/marca');

    }
}
