<?php

namespace Modules\Pay\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PayPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 初始化模块所需要的角色和权限
        $permissions = config('pay.permissions', []);
        $rolesConfig = config('pay.roles');

        $role = Role::firstOrCreate(['name' => $rolesConfig['name']], $rolesConfig);

        foreach ($permissions as $key => $permission) {
            $p = Permission::firstOrCreate(['name' => $permission['name']], $permission);
            $role->givePermissionTo($p);
        }
    }
}
