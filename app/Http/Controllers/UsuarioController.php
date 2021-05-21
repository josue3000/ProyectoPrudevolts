<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Spatie\Permission\Models\Role;
//use Spatie\Permission\Traits\HasRoles;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query=trim($request->get('searchText'));
        $usuarios=DB::table('users as u')
        ->join('model_has_roles as m','u.id','m.model_id')
        ->join('roles as r','m.role_id','=','r.id')
        ->select('u.id','u.name','u.email','r.name as rol')
        ->where('u.name','LIKE','%'.$query.'%')
        //->groupBy('u.id','u.name','u.email','r.name')
        ->orderBy('u.id','desc')
        ->paginate(7);
        return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    }
    public function create()
    {
        $roles=Role::get();
        return view("seguridad.usuario.create",["roles"=>$roles]);
    }
    public function store(UsuarioFormRequest $request)
    {
        $usuario=new User;
        
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->save();
        $usuario->roles()->sync($request->get('roles'));
        return Redirect::to('seguridad/usuario');
    }
    public function edit($id)
    {
        $roles=Role::get();
        return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id),"roles"=>$roles]);
    }
    public function update(UsuarioFormRequest $request,$id)
    {
        
        $usuario=User::findOrFail($id);
        $usuario->roles()->sync($request->get('roles'));
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->update();
        return Redirect::to('seguridad/usuario');
    }
    public function destroy($id)
    {
        $usuario = DB::table('users')->where('id','=',$id)->delete();
        return Redirect::to('seguridad/usuario');
    }

}
