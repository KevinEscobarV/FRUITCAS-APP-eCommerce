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
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'products.index','description' => 'Ver listado de productos'])->syncRoles($role1);
        Permission::create(['name' => 'products.create','description' => 'Crear productos'])->syncRoles($role1);
        Permission::create(['name' => 'products.show','description' => 'Ver un producto en especifico'])->syncRoles($role1);
        Permission::create(['name' => 'products.edit','description' => 'Editar productos'])->syncRoles($role1);
        Permission::create(['name' => 'products.destroy','description' => 'Eliminar productos'])->syncRoles($role1);

        Permission::create(['name' => 'categories.index','description' => 'Ver listado de categorias'])->syncRoles($role1);
        Permission::create(['name' => 'categories.create','description' => 'Crear categorias'])->syncRoles($role1);
        Permission::create(['name' => 'categories.edit','description' => 'Editar categorias'])->syncRoles($role1);
        Permission::create(['name' => 'categories.destroy','description' => 'Eliminar categorias'])->syncRoles($role1);

        Permission::create(['name' => 'subcategories.index','description' => 'Ver listado de subcategorias'])->syncRoles($role1);
        Permission::create(['name' => 'subcategories.create','description' => 'Crear subcategorias'])->syncRoles($role1);
        Permission::create(['name' => 'subcategories.edit','description' => 'Editar subcategorias'])->syncRoles($role1);
        Permission::create(['name' => 'subcategories.destroy','description' => 'Eliminar subcategorias'])->syncRoles($role1);

        Permission::create(['name' => 'brands.index','description' => 'Ver listado de marcas'])->syncRoles($role1);
        Permission::create(['name' => 'brands.create','description' => 'Crear marcas'])->syncRoles($role1);
        Permission::create(['name' => 'brands.edit','description' => 'Editar marcas'])->syncRoles($role1);
        Permission::create(['name' => 'brands.destroy','description' => 'Eliminar marcas'])->syncRoles($role1);

        Permission::create(['name' => 'order.index','description' => 'Ver listado de ordenes'])->syncRoles($role1);
        Permission::create(['name' => 'order.edit','description' => 'Editar ordenes'])->syncRoles($role1);

        Permission::create(['name' => 'departments.index','description' => 'Ver listado de lugares de envio'])->syncRoles($role1);
        Permission::create(['name' => 'departments.create','description' => 'Crear lugares de envio'])->syncRoles($role1);
        Permission::create(['name' => 'departments.edit','description' => 'Editar lugares de envio'])->syncRoles($role1);
        Permission::create(['name' => 'departments.destroy','description' => 'Eliminar lugares de envio'])->syncRoles($role1);

        Permission::create(['name' => 'roles.index','description' => 'Ver listado de roles'])->syncRoles($role1);
        Permission::create(['name' => 'roles.create','description' => 'Crear roles'])->syncRoles($role1);
        Permission::create(['name' => 'roles.edit','description' => 'Editar roles'])->syncRoles($role1);
        Permission::create(['name' => 'roles.destroy','description' => 'Eliminar roles'])->syncRoles($role1);

        Permission::create(['name' => 'users.index','description' => 'Ver listado de Usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'users.edit','description' => 'Asignar roles a usuarios resgistrados'])->syncRoles($role1);


    }
}
