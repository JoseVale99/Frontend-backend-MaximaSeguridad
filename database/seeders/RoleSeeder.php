<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       $role1 =  Role::create(['nombre'=>'Admin']);
       $role2 =  Role::create(['nombre'=>'Cliente']);
       $role3 =  Role::create(['nombre'=>'Gerente']);
       
        // reportes
        Permission::create(['nombre'=>'reporte.index','descripcion'=>'ver dashboard'])->syncRoles([$role1,$role3]);
        Permission::create(['nombre'=>'reporte-pdf','descripcion'=>'descargar reporte'])->syncRoles([$role1,$role3]);

        // pedidos
        Permission::create(['nombre'=>'pedido.index','descripcion'=>'ver pedidos'])->syncRoles([$role1,$role3]);
        Permission::create(['nombre'=>'pedido.destroy','descripcion'=>'eliminar pedido'])->syncRoles([$role1]);

        

        // usuarios crud
        Permission::create(['nombre'=>'user.index','descripcion'=>'Listado de usuarios'])->syncRoles($role1);
        Permission::create(['nombre'=>'user.edit','descripcion'=>'Editar rol usuario'])->syncRoles($role1);
        Permission::create(['nombre'=>'user.update','descripcion'=>'Actualizar rol usuario'])->syncRoles($role1);

        // productos   sync
        Permission::create(['nombre'=>'productos.index','descripcion'=>'Listado de productos'])->syncRoles([$role1,$role3]);
        //Permission::create(['nombre'=>'productos.store','descripcion'=>'Crear un Producto'])->syncRoles([$role1,$role3]);
        Permission::create(['nombre'=>'productos.create','descripcion'=>'Crear un producto'])->syncRoles([$role1,$role3]);
        Permission::create(['nombre'=>'productos.show','descripcion'=>'Ver producto'])->syncRoles([$role1,$role3]);
        //Permission::create(['nombre'=>'productos.update','descripcion'=>''])->syncRoles([$role1,$role3]);
        Permission::create(['nombre'=>'productos.edit','descripcion'=>'Editar un producto'])->syncRoles([$role1,$role3]);
        Permission::create(['nombre'=>'productos.destroy','descripcion'=>'Eliminar un producto'])->syncRoles($role1);

        // Citas
        Permission::create(['nombre'=>'cita.index','descripcion'=>'Listado de citas'])->syncRoles([$role1,$role3]);
        Permission::create(['nombre'=>'cita.destroy','descripcion'=>'Eliminar una cita'])->syncRoles($role1);
        Permission::create(['nombre'=>'cita.create','descripcion'=>'Crear una cita'])->syncRoles($role2);; // cliente
       Permission::create(['nombre'=>'cita.store','descripcion'=>'Enviar cita'])->syncRoles($role2); // cliente

        // Permission
        Permission::create(['nombre'=>'permission.index','descripcion'=>'Listado de permisos'])->syncRoles($role1);
        
        //Permission::create(['nombre'=>'permission.store','descripcion'=>''])->syncRoles($role1);
        //Permission::create(['nombre'=>'permission.create','descripcion'=>'Crear un permiso'])->syncRoles($role1);
        Permission::create(['nombre'=>'permission.show','descripcion'=>'Ver permisos'])->syncRoles($role1);
        //Permission::create(['nombre'=>'permission.update','descripcion'=>''])->syncRoles($role1);
        Permission::create(['nombre'=>'permission.destroy','descripcion'=>'Eliminar un permiso'])->syncRoles($role1);
        Permission::create(['nombre'=>'permission.edit','descripcion'=>'Editar un permiso'])->syncRoles($role1);

        // Roles
        Permission::create(['nombre'=>'role.index','descripcion'=>'Ver roles'])->syncRoles($role1);
        //Permission::create(['nombre'=>'role.store','descripcion'=>''])->syncRoles($role1);
        Permission::create(['nombre'=>'role.create','descripcion'=>'Crear rol'])->syncRoles($role1);
        Permission::create(['nombre'=>'role.show','descripcion'=>'Ver rol'])->syncRoles($role1);
        //Permission::create(['nombre'=>'role.update','descripcion'=>''])->syncRoles($role1);
        Permission::create(['nombre'=>'role.destroy','descripcion'=>'Eliminar rol'])->syncRoles($role1);
        Permission::create(['nombre'=>'role.edit','descripcion'=>'Editar rol'])->syncRoles($role1);

        // Cart
        Permission::create(['nombre'=>'cart.cart','descripcion'=>'Ver catálogo'])->syncRoles($role2);
        Permission::create(['nombre'=>'cart.checkout','descripcion'=>'Ver carrito'])->syncRoles($role2);
        //Permission::create(['nombre'=>'cart.clear','descripcion'=>'Limpiar carrito'])->syncRoles($role2);
        //Permission::create(['nombre'=>'cart.removeitem','descripcion'=>'Borrar un producto del carrito'])->syncRoles($role2);
        //Permission::create(['nombre'=>'cart.add','descripcion'=>'Agregar al carrito'])->syncRoles($role2);
        
        
        // compra

        Permission::create(['nombre'=>'cart.stripe','descripcion'=>'Realizar compra'])->syncRoles($role2);

    
        // Facturas
        Permission::create(['nombre'=>'cart.invoices','descripcion'=>'Realizar compra'])->syncRoles([$role2,$role3]);

    }
}
