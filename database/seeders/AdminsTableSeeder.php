<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'admin',
                'name' => 'admin',
                'email' => '164445438@qq.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DN.sSOOnKOi4K.m3fQZJDuj5mKkmDX3zYqZEDqz9a7UCNg18u19BO',
                'remember_token' => 'DVxyg1PyOaIXe2oBMK0oxuVGgSB0ZhjSxbsxeK3ahB9CEIkGIgpbZkcuDElw',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-12-11 04:56:55',
                'updated_at' => '2020-12-17 08:35:25',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'liucg',
                'name' => NULL,
                'email' => '164445430@qq.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$hNIpC6jpjvWUazKFwtSpTOHGpPg4RxQm2pantC2fHn.8rgwzeuCcm',
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-12-16 01:33:10',
                'updated_at' => '2020-12-16 01:33:10',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'addnews',
                'name' => NULL,
                'email' => '164445438@qq.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$SpdSdmLhgR0Fkn8NGsGfb.xmXCG.lRg/4Cy7Xzea6Nt9zzwhW8o0.',
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-12-17 09:56:55',
                'updated_at' => '2020-12-17 09:56:55',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'username' => 'general',
                'name' => NULL,
                'email' => '164445438@qq.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$9uPZ3hD.qFvNdSTvUnwozuFORE6gacc9mMhGAxCFZEPn8d.lnXS92',
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-12-17 09:57:57',
                'updated_at' => '2020-12-17 09:57:57',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'username' => 'audit',
                'name' => NULL,
                'email' => '164445438@qq.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$yxtL0lnA3by/9MNQEpb8f.i7RRLLDNfIeqLYgq1fQQRVysyJJ82.a',
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-12-17 09:58:22',
                'updated_at' => '2020-12-17 09:58:22',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}