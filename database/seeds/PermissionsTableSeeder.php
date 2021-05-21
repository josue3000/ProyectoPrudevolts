<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list  
        // categoriaMaterial
        Permission::create(['name' => 'CategoriaMaterial.index']);
        Permission::create(['name' => 'CategoriaMaterial.edit']);
        Permission::create(['name' => 'CategoriaMaterial.show']);
        Permission::create(['name' => 'CategoriaMaterial.create']);
        Permission::create(['name' => 'CategoriaMaterial.destroy']);
        // material
        Permission::create(['name' => 'Material.index']);
        Permission::create(['name' => 'Material.edit']);
        Permission::create(['name' => 'Material.show']);
        Permission::create(['name' => 'Material.create']);
        Permission::create(['name' => 'Material.destroy']);
        //cliente
        Permission::create(['name' => 'Cliente.index']);
        Permission::create(['name' => 'Cliente.edit']);
        Permission::create(['name' => 'Cliente.show']);
        Permission::create(['name' => 'Cliente.create']);
        Permission::create(['name' => 'Cliente.destroy']);
        //proveedor
        Permission::create(['name' => 'Proveedor.index']);
        Permission::create(['name' => 'Proveedor.edit']);
        Permission::create(['name' => 'Proveedor.show']);
        Permission::create(['name' => 'Proveedor.create']);
        Permission::create(['name' => 'Proveedor.destroy']);
        //ingreso
        Permission::create(['name' => 'Ingreso.index']);
        Permission::create(['name' => 'Ingreso.edit']);
        Permission::create(['name' => 'Ingreso.show']);
        Permission::create(['name' => 'Ingreso.create']);
        Permission::create(['name' => 'Ingreso.destroy']);
        //venta servicio
        Permission::create(['name' => 'VentaServicio.index']);
        Permission::create(['name' => 'VentaServicio.edit']);
        Permission::create(['name' => 'VentaServicio.show']);
        Permission::create(['name' => 'VentaServicio.create']);
        Permission::create(['name' => 'VentaServicio.destroy']);
         //usuario 
         Permission::create(['name' => 'Usuario.index']);
         Permission::create(['name' => 'Usuario.edit']);
         Permission::create(['name' => 'Usuario.show']);
         Permission::create(['name' => 'Usuario.create']);
         Permission::create(['name' => 'Usuario.destroy']);
          //evento
        Permission::create(['name' => 'Evento.index']);
        Permission::create(['name' => 'Evento.edit']);
        Permission::create(['name' => 'Evento.show']);
        Permission::create(['name' => 'Evento.create']);
        Permission::create(['name' => 'Evento.destroy']);
         //categoria servicio
         Permission::create(['name' => 'CategoriaServicio.index']);
         Permission::create(['name' => 'CategoriaServicio.edit']);
         Permission::create(['name' => 'CategoriaServicio.show']);
         Permission::create(['name' => 'CategoriaServicio.create']);
         Permission::create(['name' => 'CategoriaServicio.destroy']);
         //servicio
         Permission::create(['name' => 'Servicio.index']);
         Permission::create(['name' => 'Servicio.edit']);
         Permission::create(['name' => 'Servicio.show']);
         Permission::create(['name' => 'Servicio.create']);
         Permission::create(['name' => 'Servicio.destroy']);
          //equipo
        Permission::create(['name' => 'Equipo.index']);
        Permission::create(['name' => 'Equipo.edit']);
        Permission::create(['name' => 'Equipo.show']);
        Permission::create(['name' => 'Equipo.create']);
        Permission::create(['name' => 'Equipo.destroy']);
         //Sol
         Permission::create(['name' => 'Sol.index']);
         Permission::create(['name' => 'Sol.edit']);
         Permission::create(['name' => 'Sol.show']);
         Permission::create(['name' => 'Sol.create']);
         Permission::create(['name' => 'Sol.destroy']);
          //roles
        Permission::create(['name' => 'Rol.index']);
        Permission::create(['name' => 'Rol.edit']);
        Permission::create(['name' => 'Rol.show']);
        Permission::create(['name' => 'Rol.create']);
        Permission::create(['name' => 'Rol.destroy']);
        //categoria equipos
        Permission::create(['name' => 'CategoriaEquipo.index']);
        Permission::create(['name' => 'CategoriaEquipo.edit']);
        Permission::create(['name' => 'CategoriaEquipo.show']);
        Permission::create(['name' => 'CategoriaEquipo.create']);
        Permission::create(['name' => 'CategoriaEquipo.destroy']);
        //tipo equipos
        Permission::create(['name' => 'TipoEquipo.index']);
        Permission::create(['name' => 'TipoEquipo.edit']);
        Permission::create(['name' => 'TipoEquipo.show']);
        Permission::create(['name' => 'TipoEquipo.create']);
        Permission::create(['name' => 'TipoEquipo.destroy']);
        //marca
        Permission::create(['name' => 'Marca.index']);
        Permission::create(['name' => 'Marca.edit']);
        Permission::create(['name' => 'Marca.show']);
        Permission::create(['name' => 'Marca.create']);
        Permission::create(['name' => 'Marca.destroy']);
        // inicio
        Permission::create(['name' => 'Inicio.index']);
        Permission::create(['name' => 'Inicio.edit']);
        Permission::create(['name' => 'Inicio.show']);
        Permission::create(['name' => 'Inicio.create']);
        Permission::create(['name' => 'Inicio.destroy']);


        // //Permission list  
        // // categoriaMaterial
        // Permission::create(['name' => 'CategoriaMaterial.index','descripcion'=>'El usuario tiene permiso de ver el listado de categorías de repuestos']);
        // Permission::create(['name' => 'CategoriaMaterial.edit','descripcion'=>'El usuario tiene permiso de editar las categorías de repuestos']);
        // Permission::create(['name' => 'CategoriaMaterial.show','descripcion'=>'El usuario tiene permiso de ver el detalle de las categorías de repuestos']);
        // Permission::create(['name' => 'CategoriaMaterial.create','descripcion'=>'El usuario tiene permiso de crear categorías de repuestos']);
        // Permission::create(['name' => 'CategoriaMaterial.destroy','descripcion'=>'El usuario tiene permiso de eliminar categorías de repuestos']);
        // // material
        // Permission::create(['name' => 'Material.index','descripcion'=>'El usuario tiene permiso de ver el listado de repuestos']);
        // Permission::create(['name' => 'Material.edit','descripcion'=>'El usuario tiene permiso de editar los repuestos']);
        // Permission::create(['name' => 'Material.show','descripcion'=>'El usuario tiene permiso de ver el detalle de repuestos']);
        // Permission::create(['name' => 'Material.create','descripcion'=>'El usuario tiene permiso de crear repuestos']);
        // Permission::create(['name' => 'Material.destroy','descripcion'=>'El usuario tiene permiso de eliminar repuestos']);
        // 
        // //cliente
        // Permission::create(['name' => 'Cliente.index','descripcion'=>'El usuario tiene permiso de ver el listado de clientes']);
        // Permission::create(['name' => 'Cliente.edit','descripcion'=>'El usuario tiene permiso de editar clientes']);
        // Permission::create(['name' => 'Cliente.show','descripcion'=>'El usuario tiene permiso de ver el detalle de los clientes']);
        // Permission::create(['name' => 'Cliente.create','descripcion'=>'El usuario tiene permiso de crear clientes']);
        // Permission::create(['name' => 'Cliente.destroy','descripcion'=>'El usuario tiene permiso de eliminar clientes']);
        // 
        // //proveedor
        // Permission::create(['name' => 'Proveedor.index','descripcion'=>'El usuario tiene permiso de ver el listado de proveedores']);
        // Permission::create(['name' => 'Proveedor.edit','descripcion'=>'El usuario tiene permiso de editar proveedores']);
        // Permission::create(['name' => 'Proveedor.show','descripcion'=>'El usuario tiene permiso de ver el detalle de los proveedores']);
        // Permission::create(['name' => 'Proveedor.create','descripcion'=>'El usuario tiene permiso de crear proveedores']);
        // Permission::create(['name' => 'Proveedor.destroy','descripcion'=>'El usuario tiene permiso de eliminar proveedores']);
        // 
        // //ingreso
        // Permission::create(['name' => 'Ingreso.index','descripcion'=>'El usuario tiene permiso de ver el listado de ingresos']);
        // Permission::create(['name' => 'Ingreso.edit','descripcion'=>'El usuario tiene permiso de editar los ingresos']);
        // Permission::create(['name' => 'Ingreso.show','descripcion'=>'El usuario tiene permiso de ver el detalle de los ingresos']);
        // Permission::create(['name' => 'Ingreso.create','descripcion'=>'El usuario tiene permiso de crear ingresos']);
        // Permission::create(['name' => 'Ingreso.destroy','descripcion'=>'El usuario tiene permiso de eliminar ingresos']);
        //
        // //venta servicio
        // Permission::create(['name' => 'VentaServicio.index','descripcion'=>'El usuario tiene permiso de ver el listado de ventas de servicios']);
        // Permission::create(['name' => 'VentaServicio.edit','descripcion'=>'El usuario tiene permiso de editar las ventas de servicios']);
        // Permission::create(['name' => 'VentaServicio.show','descripcion'=>'El usuario tiene permiso de ver el detalle de las ventas de servicios']);
        // Permission::create(['name' => 'VentaServicio.create','descripcion'=>'El usuario tiene permiso de crear ventas de servicios']);
        // Permission::create(['name' => 'VentaServicio.destroy','descripcion'=>'El usuario tiene permiso de eliminar ventas de servicios']);
        // 
        //  //usuario 
        //  Permission::create(['name' => 'Usuario.index','descripcion'=>'El usuario tiene permiso de ver el listado de usuarios']);
        //  Permission::create(['name' => 'Usuario.edit','descripcion'=>'El usuario tiene permiso de editar los usuarios']);
        //  Permission::create(['name' => 'Usuario.show','descripcion'=>'El usuario tiene permiso de ver el detalle de los usuarios']);
        //  Permission::create(['name' => 'Usuario.create','descripcion'=>'El usuario tiene permiso de crear usuarios']);
        //  Permission::create(['name' => 'Usuario.destroy','descripcion'=>'El usuario tiene permiso de eliminar usuarios']);
        // 
        //   //evento
        // Permission::create(['name' => 'Evento.index','descripcion'=>'El usuario tiene permiso de ver el listado de eventos']);
        // Permission::create(['name' => 'Evento.edit','descripcion'=>'El usuario tiene permiso de editar los eventos']);
        // Permission::create(['name' => 'Evento.show','descripcion'=>'El usuario tiene permiso de ver el detalle de los eventos']);
        // Permission::create(['name' => 'Evento.create','descripcion'=>'El usuario tiene permiso de crear eventos']);
        // Permission::create(['name' => 'Evento.destroy','descripcion'=>'El usuario tiene permiso de eliminar eventos']);
        // 
        //  //categoria servicio
        //  Permission::create(['name' => 'CategoriaServicio.index','descripcion'=>'El usuario tiene permiso de ver el listado de categorías de servicios']);
        //  Permission::create(['name' => 'CategoriaServicio.edit','descripcion'=>'El usuario tiene permiso de editar las categorías de servicios']);
        //  Permission::create(['name' => 'CategoriaServicio.show','descripcion'=>'El usuario tiene permiso de ver el detalle de las categorías de servicios']);
        //  Permission::create(['name' => 'CategoriaServicio.create','descripcion'=>'El usuario tiene permiso de crear categorías de servicios']);
        //  Permission::create(['name' => 'CategoriaServicio.destroy','descripcion'=>'El usuario tiene permiso de eliminar categorías de servicios']);
        // 
        //  //servicio
        //  Permission::create(['name' => 'Servicio.index','descripcion'=>'El usuario tiene permiso de ver el listado de servicios']);
        //  Permission::create(['name' => 'Servicio.edit','descripcion'=>'El usuario tiene permiso de editar los servicios']);
        //  Permission::create(['name' => 'Servicio.show','descripcion'=>'El usuario tiene permiso de ver el detalle de los servicios']);
        //  Permission::create(['name' => 'Servicio.create','descripcion'=>'El usuario tiene permiso de crear servicios']);
        //  Permission::create(['name' => 'Servicio.destroy','descripcion'=>'El usuario tiene permiso de eliminar servicios']);
        // 
        //   //equipo
        // Permission::create(['name' => 'Equipo.index','descripcion'=>'El usuario tiene permiso de ver el listado de equipos']);
        // Permission::create(['name' => 'Equipo.edit','descripcion'=>'El usuario tiene permiso de editar los equipos']);
        // Permission::create(['name' => 'Equipo.show','descripcion'=>'El usuario tiene permiso de ver el detalle de los equipos']);
        // Permission::create(['name' => 'Equipo.create','descripcion'=>'El usuario tiene permiso de crear equipos']);
        // Permission::create(['name' => 'Equipo.destroy','descripcion'=>'El usuario tiene permiso de eliminar equipos']);
        // 
        //  //Sol
        //  Permission::create(['name' => 'Sol.index','descripcion'=>'El usuario tiene permiso de ver el listado de solicitudes']);
        //  Permission::create(['name' => 'Sol.edit','descripcion'=>'El usuario tiene permiso de editar las solicitudes']);
        //  Permission::create(['name' => 'Sol.show','descripcion'=>'El usuario tiene permiso de ver el detalle de las solicitudes']);
        //  Permission::create(['name' => 'Sol.create','descripcion'=>'El usuario tiene permiso de crear solicitudes']);
        //  Permission::create(['name' => 'Sol.destroy','descripcion'=>'El usuario tiene permiso de eliminar solicitudes']);
        // 
        //   //roles
        // Permission::create(['name' => 'Rol.index','descripcion'=>'El usuario tiene permiso de ver el listado de roles']);
        // Permission::create(['name' => 'Rol.edit','descripcion'=>'El usuario tiene permiso de editar los roles']);
        // Permission::create(['name' => 'Rol.show','descripcion'=>'El usuario tiene permiso de ver el detalle de los roles']);
        // Permission::create(['name' => 'Rol.create','descripcion'=>'El usuario tiene permiso de crear roles']);
        // Permission::create(['name' => 'Rol.destroy','descripcion'=>'El usuario tiene permiso de eliminar roles']);
        // 
        // //categoria equipos
        // Permission::create(['name' => 'CategoriaEquipo.index','descripcion'=>'El usuario tiene permiso de ver el listado de categorías de equipos']);
        // Permission::create(['name' => 'CategoriaEquipo.edit','descripcion'=>'El usuario tiene permiso de editar las categorías de equipos']);
        // Permission::create(['name' => 'CategoriaEquipo.show','descripcion'=>'El usuario tiene permiso de ver el detalle de las categorías de equipos']);
        // Permission::create(['name' => 'CategoriaEquipo.create','descripcion'=>'El usuario tiene permiso de crear categorías de equipos']);
        // Permission::create(['name' => 'CategoriaEquipo.destroy','descripcion'=>'El usuario tiene permiso de eliminar categorías de equipos']);
        // 
        // //tipo equipos
        // Permission::create(['name' => 'TipoEquipo.index','descripcion'=>'El usuario tiene permiso de ver el listado de tipos de equipos']);
        // Permission::create(['name' => 'TipoEquipo.edit','descripcion'=>'El usuario tiene permiso de editar los tipos de equipos']);
        // Permission::create(['name' => 'TipoEquipo.show','descripcion'=>'El usuario tiene permiso de ver el detalle de los tipos de equipos']);
        // Permission::create(['name' => 'TipoEquipo.create','descripcion'=>'El usuario tiene permiso de crear tipos de equipos']);
        // Permission::create(['name' => 'TipoEquipo.destroy','descripcion'=>'El usuario tiene permiso de eliminar tipos de equipos']);
        // 
        // //marca
        // Permission::create(['name' => 'Marca.index','descripcion'=>'El usuario tiene permiso de ver el listado de marcas']);
        // Permission::create(['name' => 'Marca.edit','descripcion'=>'El usuario tiene permiso de editar las marcas']);
        // Permission::create(['name' => 'Marca.show','descripcion'=>'El usuario tiene permiso de ver el detalle de las marcas']);
        // Permission::create(['name' => 'Marca.create','descripcion'=>'El usuario tiene permiso de crear marcas']);
        // Permission::create(['name' => 'Marca.destroy','descripcion'=>'El usuario tiene permiso de eliminar marcas']);
        // 

        // // inicio
        // Permission::create(['name' => 'Inicio.index','descripcion'=>'El usuario tiene permiso de ver el listado de inicio']);
        // Permission::create(['name' => 'Inicio.edit','descripcion'=>'El usuario tiene permiso de editar las inicio']);
        // Permission::create(['name' => 'Inicio.show','descripcion'=>'El usuario tiene permiso de ver el detalle de las inicio']);
        // Permission::create(['name' => 'Inicio.create','descripcion'=>'El usuario tiene permiso de crear inicio']);
        // Permission::create(['name' => 'Inicio.destroy','descripcion'=>'El usuario tiene permiso de eliminar inicio']);
        // 





        //Admin
        $admin = Role::create(['name' => 'Admin']);
        $tecnico = Role::create(['name' => 'Tecnico']);
        $almacen = Role::create(['name' => 'Almacen']);





        $admin->givePermissionTo([
            'CategoriaMaterial.index',
            'CategoriaMaterial.edit',
            'CategoriaMaterial.show',
            'CategoriaMaterial.create',
            'CategoriaMaterial.destroy',

            'Material.index',
            'Material.edit',
            'Material.show',
            'Material.create',
            'Material.destroy',

            'Cliente.index',
            'Cliente.edit',
            'Cliente.show',
            'Cliente.create',
            'Cliente.destroy',

            'Proveedor.index',
            'Proveedor.edit',
            'Proveedor.show',
            'Proveedor.create',
            'Proveedor.destroy',

            'Ingreso.index',
            'Ingreso.edit',
            'Ingreso.show',
            'Ingreso.create',
            'Ingreso.destroy',

            'VentaServicio.index',
            'VentaServicio.edit',
            'VentaServicio.show',
            'VentaServicio.create',
            'VentaServicio.destroy',

            'Usuario.index',
            'Usuario.edit',
            'Usuario.show',
            'Usuario.create',
            'Usuario.destroy',

            'Evento.index',
            'Evento.edit',
            'Evento.show',
            'Evento.create',
            'Evento.destroy',

            'CategoriaServicio.index',
            'CategoriaServicio.edit',
            'CategoriaServicio.show',
            'CategoriaServicio.create',
            'CategoriaServicio.destroy',

            'Servicio.index',
            'Servicio.edit',
            'Servicio.show',
            'Servicio.create',
            'Servicio.destroy',

            'Equipo.index',
            'Equipo.edit',
            'Equipo.show',
            'Equipo.create',
            'Equipo.destroy',

            'Sol.index',
            'Sol.edit',
            'Sol.show',
            'Sol.create',
            'Sol.destroy',

            'Rol.index',
            'Rol.edit',
            'Rol.show',
            'Rol.create',
            'Rol.destroy',

            'CategoriaEquipo.index',
            'CategoriaEquipo.edit',
            'CategoriaEquipo.show',
            'CategoriaEquipo.create',
            'CategoriaEquipo.destroy',

            'TipoEquipo.index',
            'TipoEquipo.edit',
            'TipoEquipo.show',
            'TipoEquipo.create',
            'TipoEquipo.destroy',

            'Marca.index',
            'Marca.edit',
            'Marca.show',
            'Marca.create',
            'Marca.destroy',

            'Inicio.index',
            'Inicio.edit',
            'Inicio.show',
            'Inicio.create',
            'Inicio.destroy'
        ]);

        $tecnico->givePermissionTo([
            'CategoriaMaterial.index',
            // 'CategoriaMaterial.edit',
            'CategoriaMaterial.show',
            // 'CategoriaMaterial.create',
            // 'CategoriaMaterial.destroy',

            'Material.index',
            // 'Material.edit',
            'Material.show',
            // 'Material.create',
            // 'Material.destroy',

            'Cliente.index',
            'Cliente.edit',
            'Cliente.show',
            'Cliente.create',
            'Cliente.destroy',

            'Proveedor.index',
            'Proveedor.edit',
            'Proveedor.show',
            'Proveedor.create',
            'Proveedor.destroy',

            'Ingreso.index',
            // 'Ingreso.edit',
            'Ingreso.show',
            // 'Ingreso.create',
            // 'Ingreso.destroy',

            'VentaServicio.index',
            'VentaServicio.edit',
            'VentaServicio.show',
            'VentaServicio.create',
            'VentaServicio.destroy',

            'Usuario.index',
            // 'Usuario.edit',
            'Usuario.show',
            // 'Usuario.create',
            // 'Usuario.destroy',

            'Evento.index',
            'Evento.edit',
            'Evento.show',
            'Evento.create',
            'Evento.destroy',

            'CategoriaServicio.index',
            // 'CategoriaServicio.edit',
            'CategoriaServicio.show',
            // 'CategoriaServicio.create',
            // 'CategoriaServicio.destroy',

            'Servicio.index',
            // 'Servicio.edit',
            'Servicio.show',
            // 'Servicio.create',
            // 'Servicio.destroy',

            'Equipo.index',
            'Equipo.edit',
            'Equipo.show',
            'Equipo.create',
            'Equipo.destroy',

            'Sol.index',
            'Sol.edit',
            'Sol.show',
            'Sol.create',
            'Sol.destroy',

            'CategoriaEquipo.index',
            'CategoriaEquipo.edit',
            'CategoriaEquipo.show',
            'CategoriaEquipo.create',
            'CategoriaEquipo.destroy',

            'TipoEquipo.index',
            'TipoEquipo.edit',
            'TipoEquipo.show',
            'TipoEquipo.create',
            'TipoEquipo.destroy',

            'Marca.index',
            'Marca.edit',
            'Marca.show',
            'Marca.create',
            'Marca.destroy',

            'Inicio.index',
            'Inicio.edit',
            'Inicio.show',
            'Inicio.create',
            'Inicio.destroy'
        ]);

        $almacen->givePermissionTo([
            'CategoriaMaterial.index',
            'CategoriaMaterial.edit',
            'CategoriaMaterial.show',
            'CategoriaMaterial.create',
            'CategoriaMaterial.destroy',

            'Material.index',
            'Material.edit',
            'Material.show',
            'Material.create',
            'Material.destroy',

            'Cliente.index',
            // 'Cliente.edit',
            'Cliente.show',
            // 'Cliente.create',
            // 'Cliente.destroy',

            'Proveedor.index',
            'Proveedor.edit',
            'Proveedor.show',
            'Proveedor.create',
            'Proveedor.destroy',

            'Ingreso.index',
            'Ingreso.edit',
            'Ingreso.show',
            'Ingreso.create',
            'Ingreso.destroy',

            'VentaServicio.index',
            // 'VentaServicio.edit',
            'VentaServicio.show',
            // 'VentaServicio.create',
            // 'VentaServicio.destroy',

            'Usuario.index',
            // 'Usuario.edit',
            'Usuario.show',
            // 'Usuario.create',
            // 'Usuario.destroy',

            'Evento.index',
            // 'Evento.edit',
            'Evento.show',
            // 'Evento.create',
            // 'Evento.destroy',

            'CategoriaServicio.index',
            'CategoriaServicio.edit',
            'CategoriaServicio.show',
            'CategoriaServicio.create',
            'CategoriaServicio.destroy',

            'Servicio.index',
            'Servicio.edit',
            'Servicio.show',
            'Servicio.create',
            'Servicio.destroy',

            'Sol.index',
            'Sol.show',

            'Equipo.index',
            // 'Equipo.edit',
            'Equipo.show',
            // 'Equipo.create',
            // 'Equipo.destroy'

            'CategoriaEquipo.index',
            'CategoriaEquipo.edit',
            'CategoriaEquipo.show',
            'CategoriaEquipo.create',
            'CategoriaEquipo.destroy',

            'TipoEquipo.index',
            'TipoEquipo.edit',
            'TipoEquipo.show',
            'TipoEquipo.create',
            'TipoEquipo.destroy',

            'Marca.index',
            'Marca.edit',
            'Marca.show',
            'Marca.create',
            'Marca.destroy',

            'Inicio.index',
            'Inicio.edit',
            'Inicio.show',
            'Inicio.create',
            'Inicio.destroy'
        ]);
        //$admin->givePermissionTo('CategoriaMaterial.index');
        //$admin->givePermissionTo(Permission::all());
       
        //Guest
        $guest = Role::create(['name' => 'Guest']);

        $guest->givePermissionTo([
            'CategoriaMaterial.index',
            'CategoriaMaterial.show',

            'Material.index',
            'Material.show',

            'Cliente.index',
            'Cliente.show',

            'Proveedor.index',
            'Proveedor.show',

            'Ingreso.index',
            'Ingreso.show',

            'VentaServicio.index',
            'VentaServicio.show',

            'Usuario.index',
            'Usuario.show',

            'Evento.index',
            'Evento.show',

            'CategoriaServicio.index',
            'CategoriaServicio.show',

            'Servicio.index',
            'Servicio.show',

            'Equipo.index',
            'Equipo.show',

            'Sol.index',
            'Sol.show',

            'Rol.index',
            'Rol.show',

            'CategoriaEquipo.index',
            //'CategoriaEquipo.edit',
            'CategoriaEquipo.show',
            //'CategoriaEquipo.create',
            //'CategoriaEquipo.destroy',

            'TipoEquipo.index',
            //'TipoEquipo.edit',
            'TipoEquipo.show',
            //'TipoEquipo.create',
            //'TipoEquipo.destroy',

            'Marca.index',
            //'Marca.edit',
            'Marca.show',
            //'Marca.create',
            //'Marca.destroy'

            'Inicio.index',
            // 'Inicio.edit',
            // 'Inicio.show',
            // 'Inicio.create',
            // 'Inicio.destroy'
        ]);

        //User Admin
        $user = User::find(1); //Italo Morales
        $user->assignRole('Admin');
    }
}
