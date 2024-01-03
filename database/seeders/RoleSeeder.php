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
     */
    public function run(): void
    {
        $role1=Role::create(['name'=>'admin']);
        $role2= Role::create(['name'=>'votante']);
        //
        Permission::create(['name'=>'dashboard'])->syncRoles([$role1 , $role2]);
        Permission::create(['name'=>'dashboard.index'])->syncRoles([$role1 , $role2]);
        permission::create(['name'=>'dashboard.create'])->syncRoles([$role1 , $role2]);
        permission::create(['name'=>'storage'])->syncRoles([$role1 , $role2]);
        permission::create(['name'=>'dashboard.show'])->syncRoles([$role1 , $role2]);
        permission::create(['name'=>'dashboard.update'])->syncRoles([$role1 , $role2]);
        permission::create(['name'=>'dashboard.edit'])->syncRoles([$role1 , $role2]);
        permission::create(['name'=>'dashboard.destroy'])->syncRoles([$role1 , $role2]);

    }
}