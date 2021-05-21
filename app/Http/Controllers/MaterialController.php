<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as Input;
use App\Http\Requests\MaterialFormRequest;
use App\Material;
use Illuminate\Support\Facades\DB;


class MaterialController extends Controller
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
            // $materiales=DB::table('material as a')
            // ->join('categoria_material as c','a.id_categoria','=','c.id_categoria_material')
            // ->select('a.id_material','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            // -> where('a.nombre','LIKE','%'.$query.'%')
            // -> orwhere('a.codigo','LIKE','%'.$query.'%')
            // -> orderBy('a.id_material','desc')
            // ->paginate(7);

            $materiales=DB::table('material as a')
            ->join('categoria_material as c','a.id_categoria','=','c.id_categoria_material')
            //->join('detalle_ingreso as di','a.id_material','=','di.id_material')
            ->select('a.id_material','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado','a.saldo')
            //->select(DB::raw('CONCAT(a.codigo, " ",a.nombre) AS material'),'a.id_material','a.stock',DB::raw('avg(di.precio_venta) as precio_promedio'),'a.imagen','a.estado','c.nombre as categoria')
            ->where('a.estado','=','Activo')
            -> where('a.nombre','LIKE','%'.$query.'%')
           // -> orwhere('a.codigo','LIKE','%'.$query.'%')
            -> orderBy('a.id_material','desc')
            ->paginate(7);
            
            return view('almacen.material.index',["materiales"=>$materiales,"searchText"=>$query]);

        }
    }
    public function create()
    {
        $categorias=DB::table('categoria_material')-> where('condicion','=','1')->get();
        return view("almacen.material.create",["categorias"=>$categorias]);
    }
    public function store(MaterialFormRequest $request)
    {
        $material = new Material;
        $material ->id_categoria = $request -> get ('id_categoria');
        $material ->codigo = $request -> get ('codigo');
        $material ->nombre = $request -> get ('nombre');
        $material ->stock = $request -> get ('stock');
        $material ->descripcion = $request -> get ('descripcion');
        $material ->estado = 'Activo';
        $material ->saldo = $request-> get('saldo');

        if(Input::hasFile('imagen')) 
        {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/materiales/',$file->getClientOriginalName());
            $material->imagen=$file->getClientOriginalName();

        }

        $material ->save();
        return Redirect::to('almacen/material');
    }
    public function show($id)
    {
        return view("almacen.material.show",["material"=> Material::findOrFail($id)]);
    }
    public function edit($id)
    {
        $material=Material::FindOrFail($id);
        $categorias=DB::table('categoria_material')->where('condicion','=','1')->get();
        return view("almacen.material.edit",["material"=> $material,"categorias"=>$categorias]);
    }
    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $material ->id_categoria = $request -> get ('id_categoria');
        $material ->codigo = $request -> get ('codigo');
        $material ->nombre = $request -> get ('nombre');
        $material ->stock = $request -> get ('stock');
        $material ->descripcion = $request -> get ('descripcion');
        $material ->saldo = $request-> get('saldo');

        if(Input::hasFile('imagen'))
        {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/materiales/',$file->getClientOriginalName());
            $material->imagen=$file->getClientOriginalName();

        }


        $material->update();
        return Redirect:: to('almacen/material');
    }
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material -> estado = 'Inactivo';
        $material -> update();
        return Redirect::to('almacen/material');

    }
}
