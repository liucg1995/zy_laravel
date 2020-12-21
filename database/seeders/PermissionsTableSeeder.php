<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'name' => 'admin.system',
                'route' => 'admin.system',
                'show_name' => '系统管理',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:18',
                'updated_at' => '2020-12-17 06:59:18',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 1,
                'name' => 'admin.user',
                'route' => 'admin.user',
                'show_name' => '管理员管理',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:37',
                'updated_at' => '2020-12-17 06:59:37',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'name' => 'admin.user.create',
                'route' => 'admin.user.create',
                'show_name' => '管理员管理:添加',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:38',
                'updated_at' => '2020-12-17 06:59:38',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'name' => 'admin.user.edit',
                'route' => 'admin.user.edit',
                'show_name' => '管理员管理:修改',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:38',
                'updated_at' => '2020-12-17 06:59:38',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'name' => 'admin.user.destroy',
                'route' => 'admin.user.destroy',
                'show_name' => '管理员管理:删除',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:38',
                'updated_at' => '2020-12-17 06:59:38',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'name' => 'admin.user.order',
                'route' => 'admin.user.order',
                'show_name' => '管理员管理:排序',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:38',
                'updated_at' => '2020-12-17 06:59:38',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 1,
                'name' => 'admin.role',
                'route' => 'admin.role',
                'show_name' => '角色管理',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 7,
                'name' => 'admin.role.create',
                'route' => 'admin.role.create',
                'show_name' => '角色管理:添加',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 7,
                'name' => 'admin.role.edit',
                'route' => 'admin.role.edit',
                'show_name' => '角色管理:修改',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 7,
                'name' => 'admin.role.destroy',
                'route' => 'admin.role.destroy',
                'show_name' => '角色管理:删除',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => 7,
                'name' => 'admin.role.order',
                'route' => 'admin.role.order',
                'show_name' => '角色管理:排序',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => 0,
                'name' => 'admin.menu',
                'route' => 'admin.menu',
                'show_name' => '菜单管理',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-17 07:00:07',
                'deleted_at' => '2020-12-21 01:48:46',
            ),
            12 => 
            array (
                'id' => 13,
                'parent_id' => 0,
                'name' => 'admin.menu.create',
                'route' => 'admin.menu.create',
                'show_name' => '菜单管理:添加',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-21 01:48:46',
                'deleted_at' => '2020-12-21 01:48:46',
            ),
            13 => 
            array (
                'id' => 14,
                'parent_id' => 0,
                'name' => 'admin.menu.edit',
                'route' => 'admin.menu.edit',
                'show_name' => '菜单管理:修改',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-21 01:48:51',
                'deleted_at' => '2020-12-21 01:48:51',
            ),
            14 => 
            array (
                'id' => 15,
                'parent_id' => 0,
                'name' => 'admin.menu.destroy',
                'route' => 'admin.menu.destroy',
                'show_name' => '菜单管理:删除',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-21 01:48:49',
                'deleted_at' => '2020-12-21 01:48:49',
            ),
            15 => 
            array (
                'id' => 16,
                'parent_id' => 0,
                'name' => 'admin.menu.order',
                'route' => 'admin.menu.order',
                'show_name' => '菜单管理:排序',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-21 01:48:54',
                'deleted_at' => '2020-12-21 01:48:54',
            ),
            16 => 
            array (
                'id' => 17,
                'parent_id' => 2,
                'name' => 'admin.user.role',
                'route' => 'admin.user.role',
                'show_name' => '管理员管理：赋角色',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:34:24',
                'updated_at' => '2020-12-17 07:42:21',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 20,
                'parent_id' => 0,
                'name' => 'system.website',
                'route' => 'system.website',
                'show_name' => '栏目管理',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:01',
                'updated_at' => '2020-12-17 08:55:01',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 21,
                'parent_id' => 20,
                'name' => 'admin.website',
                'route' => 'admin.website',
                'show_name' => '栏目管理',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:32',
                'updated_at' => '2020-12-17 08:55:32',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 22,
                'parent_id' => 21,
                'name' => 'admin.website.create',
                'route' => 'admin.website.create',
                'show_name' => '栏目管理:添加',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:32',
                'updated_at' => '2020-12-17 08:55:32',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 23,
                'parent_id' => 21,
                'name' => 'admin.website.edit',
                'route' => 'admin.website.edit',
                'show_name' => '栏目管理:修改',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:32',
                'updated_at' => '2020-12-17 08:55:32',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 24,
                'parent_id' => 21,
                'name' => 'admin.website.destroy',
                'route' => 'admin.website.destroy',
                'show_name' => '栏目管理:删除',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:32',
                'updated_at' => '2020-12-17 08:55:32',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 26,
                'parent_id' => 36,
                'name' => 'admin.news',
                'route' => 'admin.news',
                'show_name' => '新闻管理',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:56:26',
                'updated_at' => '2020-12-17 15:39:50',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 27,
                'parent_id' => 26,
                'name' => 'admin.news.create',
                'route' => 'admin.news.create',
                'show_name' => '新闻管理:添加',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:56:26',
                'updated_at' => '2020-12-17 15:39:50',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 28,
                'parent_id' => 26,
                'name' => 'admin.news.edit',
                'route' => 'admin.news.edit',
                'show_name' => '新闻管理:修改',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:56:26',
                'updated_at' => '2020-12-17 15:45:10',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 29,
                'parent_id' => 26,
                'name' => 'admin.news.destroy',
                'route' => 'admin.news.destroy',
                'show_name' => '新闻管理:删除',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:56:26',
                'updated_at' => '2020-12-17 15:39:50',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 30,
                'parent_id' => 26,
                'name' => 'admin.news.audit',
                'route' => 'admin.news.audit',
                'show_name' => '新闻管理:审核',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 09:59:03',
                'updated_at' => '2020-12-17 15:45:49',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 36,
                'parent_id' => 0,
                'name' => 'system.news',
                'route' => 'system.news',
                'show_name' => '新闻管理',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 15:30:36',
                'updated_at' => '2020-12-17 15:30:36',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 37,
                'parent_id' => 1,
                'name' => 'admin.permission',
                'route' => 'admin.permission',
                'show_name' => '权限管理',
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:03:03',
                'updated_at' => '2020-12-21 01:24:57',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 38,
                'parent_id' => 37,
                'name' => 'admin.permission.create',
                'route' => 'admin.permission.create',
                'show_name' => '权限管理:添加',
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:03:03',
                'updated_at' => '2020-12-21 01:24:57',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 39,
                'parent_id' => 37,
                'name' => 'admin.permission.edit',
                'route' => 'admin.permission.edit',
                'show_name' => '权限管理:修改',
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:03:03',
                'updated_at' => '2020-12-21 01:24:57',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 40,
                'parent_id' => 37,
                'name' => 'admin.permission.destroy',
                'route' => 'admin.permission.destroy',
                'show_name' => '权限管理:删除',
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:03:03',
                'updated_at' => '2020-12-21 01:24:57',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 41,
                'parent_id' => 37,
                'name' => 'admin.menu.permission',
                'route' => 'admin.menu.permission',
                'show_name' => '菜单管理：菜单权限',
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:27:58',
                'updated_at' => '2020-12-18 05:27:58',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 42,
                'parent_id' => 7,
                'name' => 'admin.role.permission',
                'route' => 'admin.role.permission',
                'show_name' => '角色管理:赋权限',
                'guard_name' => 'web',
                'created_at' => '2020-12-18 06:51:44',
                'updated_at' => '2020-12-18 06:51:44',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 43,
                'parent_id' => 0,
                'name' => 'admin.news.test2',
                'route' => 'admin.news.test2',
                'show_name' => '新闻权限',
                'guard_name' => 'web',
                'created_at' => '2020-12-18 07:47:51',
                'updated_at' => '2020-12-21 01:48:33',
                'deleted_at' => '2020-12-21 01:48:33',
            ),
            35 => 
            array (
                'id' => 44,
                'parent_id' => 36,
                'name' => 'admin.permission',
                'route' => NULL,
                'show_name' => '新闻管理：测试',
                'guard_name' => 'web',
                'created_at' => '2020-12-21 02:51:03',
                'updated_at' => '2020-12-21 03:13:20',
                'deleted_at' => '2020-12-21 03:13:20',
            ),
            36 => 
            array (
                'id' => 45,
                'parent_id' => 44,
                'name' => 'xxx',
                'route' => NULL,
                'show_name' => '管理员管理：赋角色',
                'guard_name' => 'web',
                'created_at' => '2020-12-21 02:55:10',
                'updated_at' => '2020-12-21 02:55:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}