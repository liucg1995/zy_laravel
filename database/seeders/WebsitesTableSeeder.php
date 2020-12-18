<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('websites')->delete();
        
        \DB::table('websites')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 0,
                'title' => '首页',
                'created_at' => '2020-12-18 05:00:00',
                'updated_at' => '2020-12-18 05:00:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 0,
                'title' => '栏目一',
                'created_at' => '2020-12-18 05:00:45',
                'updated_at' => '2020-12-18 05:00:45',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 0,
                'order' => 0,
                'title' => '栏目二',
                'created_at' => '2020-12-18 05:00:54',
                'updated_at' => '2020-12-18 05:00:54',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 0,
                'title' => '栏目一/一',
                'created_at' => '2020-12-18 05:01:12',
                'updated_at' => '2020-12-18 05:01:12',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 0,
                'order' => 0,
                'title' => '栏目三',
                'created_at' => '2020-12-18 05:37:07',
                'updated_at' => '2020-12-18 05:37:07',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}