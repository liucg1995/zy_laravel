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
                'name' => 'admin.system',
                'btn' => 'list',
                'show_name' => '系统管理',
                'menu_id' => 1,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:18',
                'updated_at' => '2020-12-17 06:59:18',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin.user',
                'btn' => 'list',
                'show_name' => '管理员管理',
                'menu_id' => 2,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:37',
                'updated_at' => '2020-12-17 06:59:37',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'admin.user.create',
                'btn' => 'create',
                'show_name' => '管理员管理:添加',
                'menu_id' => 2,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:38',
                'updated_at' => '2020-12-17 06:59:38',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'admin.user.edit',
                'btn' => 'edit',
                'show_name' => '管理员管理:修改',
                'menu_id' => 2,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:38',
                'updated_at' => '2020-12-17 06:59:38',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'admin.user.destroy',
                'btn' => 'destroy',
                'show_name' => '管理员管理:删除',
                'menu_id' => 2,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:38',
                'updated_at' => '2020-12-17 06:59:38',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'admin.user.order',
                'btn' => 'order',
                'show_name' => '管理员管理:排序',
                'menu_id' => 2,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:38',
                'updated_at' => '2020-12-17 06:59:38',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'admin.role',
                'btn' => 'list',
                'show_name' => '角色管理',
                'menu_id' => 3,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'admin.role.create',
                'btn' => 'create',
                'show_name' => '角色管理:添加',
                'menu_id' => 3,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'admin.role.edit',
                'btn' => 'edit',
                'show_name' => '角色管理:修改',
                'menu_id' => 3,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'admin.role.destroy',
                'btn' => 'destroy',
                'show_name' => '角色管理:删除',
                'menu_id' => 3,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'admin.role.order',
                'btn' => 'order',
                'show_name' => '角色管理:排序',
                'menu_id' => 3,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 06:59:44',
                'updated_at' => '2020-12-17 06:59:44',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'admin.menu',
                'btn' => 'list',
                'show_name' => '菜单管理',
                'menu_id' => 4,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-17 07:00:07',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'admin.menu.create',
                'btn' => 'create',
                'show_name' => '菜单管理:添加',
                'menu_id' => 4,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-17 07:00:07',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'admin.menu.edit',
                'btn' => 'edit',
                'show_name' => '菜单管理:修改',
                'menu_id' => 4,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-17 07:00:07',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'admin.menu.destroy',
                'btn' => 'destroy',
                'show_name' => '菜单管理:删除',
                'menu_id' => 4,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-17 07:00:07',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'admin.menu.order',
                'btn' => 'order',
                'show_name' => '菜单管理:排序',
                'menu_id' => 4,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-17 07:00:07',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'admin.user.role',
                'btn' => 'other',
                'show_name' => '管理员管理：赋角色',
                'menu_id' => 2,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:34:24',
                'updated_at' => '2020-12-17 07:42:21',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 20,
                'name' => 'system.website',
                'btn' => 'list',
                'show_name' => '栏目管理',
                'menu_id' => 5,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:01',
                'updated_at' => '2020-12-17 08:55:01',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 21,
                'name' => 'admin.website',
                'btn' => 'list',
                'show_name' => '栏目管理',
                'menu_id' => 6,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:32',
                'updated_at' => '2020-12-17 08:55:32',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 22,
                'name' => 'admin.website.create',
                'btn' => 'create',
                'show_name' => '栏目管理:添加',
                'menu_id' => 6,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:32',
                'updated_at' => '2020-12-17 08:55:32',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 23,
                'name' => 'admin.website.edit',
                'btn' => 'edit',
                'show_name' => '栏目管理:修改',
                'menu_id' => 6,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:32',
                'updated_at' => '2020-12-17 08:55:32',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 24,
                'name' => 'admin.website.destroy',
                'btn' => 'destroy',
                'show_name' => '栏目管理:删除',
                'menu_id' => 6,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:55:32',
                'updated_at' => '2020-12-17 08:55:32',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 26,
                'name' => 'admin.news',
                'btn' => 'list',
                'show_name' => '新闻管理:列表',
                'menu_id' => 8,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:56:26',
                'updated_at' => '2020-12-17 15:39:50',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 27,
                'name' => 'admin.news.create',
                'btn' => 'create',
                'show_name' => '新闻管理:添加',
                'menu_id' => 8,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:56:26',
                'updated_at' => '2020-12-17 15:39:50',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 28,
                'name' => 'admin.news.edit',
                'btn' => 'edit',
                'show_name' => '新闻管理:修改',
                'menu_id' => 8,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:56:26',
                'updated_at' => '2020-12-17 15:45:10',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 29,
                'name' => 'admin.news.destroy',
                'btn' => 'destroy',
                'show_name' => '新闻管理:删除',
                'menu_id' => 8,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:56:26',
                'updated_at' => '2020-12-17 15:39:50',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 30,
                'name' => 'admin.news.audit',
                'btn' => 'other',
                'show_name' => '新闻管理:审核',
                'menu_id' => 8,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 09:59:03',
                'updated_at' => '2020-12-17 15:45:49',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 36,
                'name' => 'system.news',
                'btn' => 'list',
                'show_name' => '新闻管理:列表',
                'menu_id' => 7,
                'guard_name' => 'web',
                'created_at' => '2020-12-17 15:30:36',
                'updated_at' => '2020-12-17 15:30:36',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 37,
                'name' => 'admin.permission',
                'btn' => 'list',
                'show_name' => '权限管理:列表',
                'menu_id' => 9,
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:03:03',
                'updated_at' => '2020-12-18 05:03:03',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 38,
                'name' => 'admin.permission.create',
                'btn' => 'create',
                'show_name' => '权限管理:添加',
                'menu_id' => 9,
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:03:03',
                'updated_at' => '2020-12-18 05:03:03',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 39,
                'name' => 'admin.permission.edit',
                'btn' => 'edit',
                'show_name' => '权限管理:修改',
                'menu_id' => 9,
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:03:03',
                'updated_at' => '2020-12-18 05:03:03',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 40,
                'name' => 'admin.permission.destroy',
                'btn' => 'destroy',
                'show_name' => '权限管理:删除',
                'menu_id' => 9,
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:03:03',
                'updated_at' => '2020-12-18 05:03:03',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 41,
                'name' => 'admin.menu.permission',
                'btn' => 'other',
                'show_name' => '菜单管理：菜单权限',
                'menu_id' => 4,
                'guard_name' => 'web',
                'created_at' => '2020-12-18 05:27:58',
                'updated_at' => '2020-12-18 05:27:58',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}