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

        Permission::create(['name' => 'products.index','description' => 'Ver listado de productos']);
        Permission::create(['name' => 'products.create','description' => 'Crear productos']);
        Permission::create(['name' => 'products.show','description' => 'Ver un producto en especifico']);
        Permission::create(['name' => 'products.edit','description' => 'Editar productos']);
        Permission::create(['name' => 'products.destroy','description' => 'Eliminar productos']);

        Permission::create(['name' => 'categories.index','description' => 'Ver listado de categorias']);
        Permission::create(['name' => 'categories.create','description' => 'Crear categorias']);
        Permission::create(['name' => 'categories.show','description' => 'Ver una categoria en especifico']);
        Permission::create(['name' => 'categories.edit','description' => 'Editar categorias']);
        Permission::create(['name' => 'categories.destroy','description' => 'Eliminar categorias']);

        Permission::create(['name' => 'subcategories.index','description' => 'Ver listado de subcategorias']);
        Permission::create(['name' => 'subcategories.create','description' => 'Crear subcategorias']);
        Permission::create(['name' => 'subcategories.show','description' => 'Ver una subcategoria en especifico']);
        Permission::create(['name' => 'subcategories.edit','description' => 'Editar subcategorias']);
        Permission::create(['name' => 'subcategories.destroy','description' => 'Eliminar subcategorias']);

        Permission::create(['name' => 'roles.index','description' => 'Ver listado de roles']);
        Permission::create(['name' => 'roles.create','description' => 'Crear roles']);
        Permission::create(['name' => 'roles.edit','description' => 'Editar roles']);
        Permission::create(['name' => 'roles.destroy','description' => 'Eliminar roles']);

        Permission::create(['name' => 'users.index','description' => 'Ver listado de Usuarios']);
        Permission::create(['name' => 'users.edit','description' => 'Asignar roles a usuarios resgistrados']);
        Permission::create(['name' => 'users.destroy','description' => 'Suspender usuarios']);


    }
}
