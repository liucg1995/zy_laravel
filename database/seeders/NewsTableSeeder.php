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
                'wid' => 0,
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
                'wid' => 0,
                'source' => '新闻标题',
                'title' => '新闻标题',
                'author' => '新闻标题',
                'intro' => '新闻标题',
                'publish_time' => '2020-12-14',
                'is_pub' => 1,
                'view' => 0,
                'image' => '/storage/images/2020-12-14/dm65eKhGoB2pglA5Llnsi3w4kDv5lt6LWueIX0Tf.jpg',
                'image_id' => 'lSmJSzQUq',
                'created_at' => '2020-12-14 02:00:45',
                'updated_at' => '2020-12-17 09:10:34',
                'deleted_at' => '2020-12-17 09:10:34',
            ),
        ));
        
        
    }
}