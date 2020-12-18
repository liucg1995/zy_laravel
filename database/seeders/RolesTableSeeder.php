<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'writer',
                'show_name' => NULL,
                'guard_name' => 'admin',
                'created_at' => '2020-12-15 01:35:01',
                'updated_at' => '2020-12-16 03:37:01',
                'deleted_at' => '2020-12-16 03:37:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'audit.role',
                'show_name' => '审核管理员',
                'guard_name' => 'web',
                'created_at' => '2020-12-15 01:39:12',
                'updated_at' => '2020-12-17 07:55:05',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'super.role',
                'show_name' => '超级管理员',
                'guard_name' => 'web',
                'created_at' => '2020-12-16 03:28:43',
                'updated_at' => '2020-12-17 07:51:41',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'general.role',
                'show_name' => '普通管理员',
                'guard_name' => 'web',
                'created_at' => '2020-12-16 03:28:51',
                'updated_at' => '2020-12-17 07:52:17',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'view.role',
                'show_name' => '查看管理员',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 07:54:10',
                'updated_at' => '2020-12-17 07:54:10',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'addnews.role',
                'show_name' => '新闻添加管理员',
                'guard_name' => 'web',
                'created_at' => '2020-12-17 08:59:47',
                'updated_at' => '2020-12-17 08:59:47',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}