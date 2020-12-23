<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TestController extends Controller
{
    //
    public function index()
    {

//LTAI4GJgv3tcZBW7ZsCssTGt
        $config = [
            'access_key' => 'LTAI4GJgv3tcZBW7ZsCssTGt',
        ];
        $disk = \Storage::disk('qiniu');

        $res = $disk->put('file1.jpg', public_path('storage/8rusYTvUfew9flDtRCdcCzUy05HWmS0tT8kR01BJ.jpg'));
        dump($res);
        dd($disk);


        // 创建角色  权限 并赋值
//        $role = Role::create(['name' => 'writer2']);
//        $permission = Permission::create(['name' => 'edit articles2']);
//
//        $role->givePermissionTo($permission);


    }

    public function test2()
    {
        // 多个权限 赋给 角色1
        $role = Role::findById(1);
        $role->syncPermissions([1, 2]);
    }

    public function test3()
    {
        $role = Role::findById(1);
        $role->revokePermissionTo([1, 2]);

    }
}
