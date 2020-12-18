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