<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Request as Input;
use App\Http\Requests\IngresoFormRequest;
use App\Ingreso;
use App\DetalleIngreso;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;
//use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Stmt\TryCatch; 

class IngresoController extends Controller
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
            $ingresos=DB::table('ingreso as i')
            ->join('persona as p','i.id_proveedor','=','p.id_persona')
            ->join('detalle_ingreso as di','i.id_ingreso','=','di.id_ingreso')
            ->select('i.id_ingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.num_factura','i.num_autorizacion','i.importe_credito_fiscal','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->where('i.num_factura','LIKE','%'.$query.'%')
            ->orderBy('i.id_ingreso','desc')
            ->groupBy('i.id_ingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.num_autorizacion','i.num_factura','i.importe_credito_fiscal','i.estado')
            ->paginate(7);
            return view('compras.ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $personas=DB::table('persona')->where('tipo_persona','=','Proveedor')->get();
        $materiales=DB::table('material as mat')
        ->select(DB::raw('CONCAT(mat.codigo, " ",mat.nombre) AS material'),'mat.id_material')
        ->where('mat.estado','=','Activo')
        ->get();
        return view("compras.ingreso.create",["personas"=>$personas,"materiales"=>$materiales]);
    }
    public function store(IngresoFormRequest $request)
    {
        try{
            DB::beginTransaction();

            $ingreso=new Ingreso();
            $ingreso->id_proveedor=$request->get('id_proveedor');
            $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
            $ingreso->num_factura=$request->get('num_factura');
            $ingreso->num_autorizacion=$request->get('num_autorizacion');
            
            $mytime = Carbon::now('America/La_Paz');
            $ingreso->fecha_hora=$mytime->toDateTime();
            $ingreso->importe_credito_fiscal='13';
            $ingreso->estado='Activo';
            $ingreso->save();

            $id_material = $request->get('id_material');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

            $cont = 0;

            while($cont < count($id_material))
            {
                $detalle = new DetalleIngreso();
                $detalle ->id_ingreso= $ingreso->id_ingreso;
                $detalle ->id_material = $id_material[$cont];
                $detalle ->cantidad = $cantidad[$cont];
                $detalle ->precio_compra = $precio_compra[$cont];
                $detalle ->precio_venta = $precio_venta[$cont];
                $detalle ->save();
                $cont=$cont+1;
            }


            DB::commit();
        }catch(\Exception $e)
        {
             DB::rollBack();
             //report($e);
        }
        return Redirect::to('compras/ingreso');
    }


    public function show($id)
    {
        $ingreso=DB::table('ingreso as i')
        ->join('persona as p','i.id_proveedor','=','p.id_persona')
        ->join('detalle_ingreso as di','i.id_ingreso','=','di.id_ingreso')
        ->select('i.id_ingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.num_factura','i.num_autorizacion','i.importe_credito_fiscal','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
        ->where('i.id_ingreso','=',$id)
        ->groupBy('i.id_ingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.num_factura','i.num_autorizacion','i.importe_credito_fiscal','i.estado')
        ->first();
        
        $detalles=DB::table('detalle_ingreso as d')
        ->join('material as a','d.id_material','=','a.id_material')
        ->select('a.nombre as material','d.cantidad','d.precio_compra','d.precio_venta')
        ->where('d.id_ingreso','=',$id)
        ->get();

        return view("compras.ingreso.show",["ingreso"=>$ingreso,"detalles"=>$detalles]);
    }
    public function destroy($id)
    {
        $ingreso=Ingreso::FindOrFail($id);
        $ingreso->estado='C';
        $ingreso->update();
        return Redirect::to('compras/ingreso');
    }
}
