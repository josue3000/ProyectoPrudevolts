<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class RolController extends Controller
{
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    public function index()
    {
        $roles=Role::paginate();

        return view('seguridad.roles.index',compact('roles'));
    }

    public function show(Role $role)
    {
        return view('seguridad.roles.show', compact('role'));
    }


    public function create()
    {
        // $roles=Role::get();
        // return view("seguridad.roles.create",["roles"=>$roles]);
        $permissions = Permission::get();
        
        return view("seguridad.roles.create", compact('permissions'));
    }
    public function store(Request $request)
    {
        $role=new Role;
        
        $role->name=$request->get('name');
        $role->guard_name = "web";
        // $role->email=$request->get('email');
        // $role->password=bcrypt($request->get('password'));
        $role->save();
        $role->permissions()->sync($request->get('permissions'));
        return Redirect::to('seguridad/roles');
    }
    // public function edit($id)
    public function edit(Role $role)
    {
        // $roles=Role::get();
        // return view("seguridad.roles.edit",["roles"=>Role::findOrFail($id),"roles"=>$roles]);
        $permissions = Permission::get();
        return view('seguridad.roles.edit',compact('role','permissions'));

    }
    public function update(Request $request, $id)
    {
        
        $role=Role::findOrFail($id);
        $role->permissions()->sync($request->get('permissions'));
        $role->name=$request->get('name');
        $role->update();
        return Redirect::to('seguridad/roles');
    }
    public function destroy($id)
    {
        $rol = DB::table('roles')->where('id','=',$id)->delete();
        return Redirect::to('seguridad/roles');
    }

}
