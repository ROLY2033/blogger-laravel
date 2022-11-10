<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);


        Permission::create(['name' => 'admin.home', 'description'=> 'ver Dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index', 'description'=> 'ver listado de usuarios'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.users.edit', 'description'=> 'asignar un rol'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.users.update', 'description'=> ''])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index', 'description'=> 'ver listado de categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create', 'description'=> 'crear nueva categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 'description'=> 'editar categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy', 'description'=> 'eliminar categoria'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index', 'description'=> 'ver listado de etiquetas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create', 'description'=> 'crear etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit', 'description'=> 'editar etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy', 'description'=> 'eliminar etiquetas'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index', 'description'=> 'ver listado de posts'])->syncRoles([$role1 , $role2]);
        Permission::create(['name' => 'admin.posts.create', 'description'=> 'crear post'])->syncRoles([$role1 , $role2]);
        Permission::create(['name' => 'admin.posts.edit', 'description'=> 'editar post'])->syncRoles([$role1 , $role2]);
        Permission::create(['name' => 'admin.posts.destroy', 'description'=> 'eliminar post'])->syncRoles([$role1 , $role2]);

    }
}
