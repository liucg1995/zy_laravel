<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 0,
                'ident' => 'admin.system',
                'title' => '系统管理',
                'icon' => '',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2020-12-16 12:15:43',
                'updated_at' => '2020-12-16 12:15:43',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 1,
                'order' => 0,
                'ident' => 'admin.user',
                'title' => '管理员管理',
                'icon' => '',
                'uri' => 'admin.user',
                'permission' => NULL,
                'created_at' => '2020-12-16 12:16:08',
                'updated_at' => '2020-12-17 06:55:42',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 1,
                'order' => 0,
                'ident' => 'admin.role',
                'title' => '角色管理',
                'icon' => '',
                'uri' => 'admin.role',
                'permission' => NULL,
                'created_at' => '2020-12-16 12:16:35',
                'updated_at' => '2020-12-16 12:16:35',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 1,
                'order' => 0,
                'ident' => 'admin.menu',
                'title' => '菜单管理',
                'icon' => '',
                'uri' => 'admin.menu',
                'permission' => NULL,
                'created_at' => '2020-12-17 07:00:07',
                'updated_at' => '2020-12-17 07:00:07',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 0,
                'order' => 0,
                'ident' => 'system.website',
                'title' => '栏目管理',
                'icon' => '',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2020-12-17 08:55:01',
                'updated_at' => '2020-12-17 08:55:01',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 5,
                'order' => 0,
                'ident' => 'admin.website',
                'title' => '栏目管理',
                'icon' => '',
                'uri' => 'admin.website',
                'permission' => NULL,
                'created_at' => '2020-12-17 08:55:32',
                'updated_at' => '2020-12-17 08:55:32',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 0,
                'order' => 0,
                'ident' => 'system.news',
                'title' => '新闻管理',
                'icon' => '',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2020-12-17 08:56:04',
                'updated_at' => '2020-12-17 08:56:04',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 7,
                'order' => 0,
                'ident' => 'admin.news',
                'title' => '新闻管理',
                'icon' => '',
                'uri' => 'admin.news',
                'permission' => NULL,
                'created_at' => '2020-12-17 08:56:26',
                'updated_at' => '2020-12-17 15:39:50',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 4,
                'order' => 0,
                'ident' => 'admin.permission',
                'title' => '权限管理',
                'icon' => NULL,
                'uri' => 'admin.permission',
                'permission' => NULL,
                'created_at' => '2020-12-18 05:03:03',
                'updated_at' => '2020-12-18 05:03:03',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}