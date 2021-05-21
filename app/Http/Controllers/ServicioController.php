<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\Http\Requests\ServicioFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ServicioController extends Controller
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
            $servicios=DB::table('servicio as s')
            ->join('categoria_servicio as c','s.id_categoria','=','c.id_categoria_servicio')
            ->select('s.id_servicio','s.nombre','c.nombre as categoria','s.descripcion','s.precio_venta_servicio','s.estado')
            -> where('s.nombre','LIKE','%'.$query.'%')
            -> orderBy('s.id_servicio','desc')
            ->paginate(10);
            return view('bancoServicio.servicio.index',["servicios"=>$servicios,"searchText"=>$query]);

        }
    }
    public function create()
    {
        $categorias=DB::table('categoria_servicio')-> where('condicion','=','1')->get();
        return view("bancoServicio.servicio.create",["categorias"=>$categorias]);
    }
    public function store(ServicioFormRequest $request)
    {
        $servicio = new Servicio;
        $servicio ->id_categoria = $request -> get ('id_categoria');
        $servicio ->nombre = $request -> get ('nombre');
        $servicio ->descripcion = $request -> get ('descripcion');
        $servicio ->precio_venta_servicio = $request -> get ('precio_venta_servicio');
        $servicio ->estado = 'Activo';

        $servicio ->save();
        return Redirect::to('bancoServicio/servicio');
    }
    public function show($id)
    {
        return view("bancoServicio.servicio.show",["servicio"=> Servicio::findOrFail($id)]);
    }
    public function edit($id)
    {
        $servicio=Servicio::FindOrFail($id);
        $categorias=DB::table('categoria_servicio')->where('condicion','=','1')->get();
        return view("bancoServicio.servicio.edit",["servicio"=> $servicio,"categorias"=>$categorias]);
    }
    public function update(ServicioFormRequest $request, $id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio ->id_categoria = $request -> get ('id_categoria');
        $servicio ->nombre = $request -> get ('nombre');
        $servicio ->descripcion = $request -> get ('descripcion');
        $servicio ->precio_venta_servicio = $request -> get ('precio_venta_servicio');

        $servicio->update();
        return Redirect:: to('bancoServicio/servicio');
    }
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio -> estado = 'Inactivo';
        $servicio -> update();
        return Redirect::to('bancoServicio/servicio');

    }
}
