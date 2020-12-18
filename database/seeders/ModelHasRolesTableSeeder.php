<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
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

        \DB::table('model_has_roles')->delete();

        \DB::table('model_has_roles')->insert(array (
            0 =>
            array (
                'role_id' => 3,
                'model_type' => 'App\\Models\\Admin',
                'model_id' => 1,
            ),
            1 =>
            array (
                'role_id' => 6,
                'model_type' => 'App\\Models\\Admin',
                'model_id' => 3,
            ),
            2 =>
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\Admin',
                'model_id' => 5,
            ),
            3 =>
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\Admin',
                'model_id' => 20,
            ),
            4 =>
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\Admin',
                'model_id' => 29,
            ),
        ));


    }
}
