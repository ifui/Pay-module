<?php

namespace Modules\Pay\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PayDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // 初始化生成模块所需角色和权限
        $this->call(PayPermissionTableSeeder::class);
    }
}
