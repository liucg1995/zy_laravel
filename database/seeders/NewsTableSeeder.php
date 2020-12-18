<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('news')->delete();
        
        \DB::table('news')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'wid' => 2,
                'source' => '新闻标题',
                'title' => '新闻标题',
                'author' => '新闻标题',
                'intro' => '新闻标题',
                'publish_time' => '2020-12-16',
                'is_pub' => 1,
                'view' => 0,
                'image' => NULL,
                'image_id' => NULL,
                'created_at' => '2020-12-14 01:52:06',
                'updated_at' => '2020-12-14 01:52:06',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'wid' => 3,
                'source' => NULL,
                'title' => '测试素材',
                'author' => NULL,
                'intro' => '测试素材',
                'publish_time' => '2020-12-16',
                'is_pub' => 0,
                'view' => 0,
                'image' => NULL,
                'image_id' => NULL,
                'created_at' => '2020-12-18 05:43:17',
                'updated_at' => '2020-12-18 05:43:17',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}