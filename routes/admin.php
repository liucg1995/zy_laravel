<?php


Route::prefix('admin')->middleware(['web'])->group(function () {
    Route::group(['namespace' => '\App\Http\Controllers\Admin\\'], function () {
        Route::get('login', 'LoginController@index')->name('admin.loginForm');
        Route::post('login', 'LoginController@store')->name('admin.login');
        Route::get('logout', 'LoginController@logout')->name('admin.logout');
    });
    // auth.admin  登录中间件
    Route::middleware(['auth.admin'])->group(function () {


        Route::group(['namespace' => '\App\Http\Controllers\Admin\\'], function () {

            Route::get('/', 'HomeController@index')->name('admin.home');
//            Route::resource('news', 'NewsController');

//
////            Route::resource('menu', \App\Http\Controllers\Admin\MenuController::class);
//            Route::get('menu/data', 'MenuController@data')->name('admin.menu.data');
//
//            Route::get('menu/create', 'MenuController@create')->name('admin.menu.create');
//            Route::post('menu/store', 'MenuController@store')->name('admin.menu.store');


            // 角色管理
            Route::group([], function () {
                Route::get('news', 'NewsController@index')->name('admin.news');
                Route::get('news/data', 'NewsController@data')->name('admin.news.data');
                //添加
                Route::get('news/create', 'NewsController@create')->name('admin.news.create');
                Route::post('news/store', 'NewsController@store')->name('admin.news.store');
                //编辑
                Route::get('news/{id}/edit', 'NewsController@edit')->name('admin.news.edit');
                Route::put('news/{id}/update', 'NewsController@update')->name('admin.news.update');
                //删除
                Route::delete('news/destroy', 'NewsController@destroy')->name('admin.news.destroy');

            });


            Route::group([], function () {
                //添加
                Route::get('profile', 'ProfileController@index')->name('admin.profile');
                Route::put('profile/update', 'ProfileController@update')->name('admin.profile.update');
            });

            //管理员管理
            Route::group([], function () {
                Route::get('user', 'AdminController@index')->name('admin.user');
                Route::get('user/data', 'AdminController@data')->name('admin.user.data');
                //添加
                Route::get('user/create', 'AdminController@create')->name('admin.user.create');
                Route::post('user/store', 'AdminController@store')->name('admin.user.store');
                //编辑
                Route::get('user/{id}/edit', 'AdminController@edit')->name('admin.user.edit');
                Route::put('user/{id}/update', 'AdminController@update')->name('admin.user.update');
                //删除
                Route::delete('user/destroy', 'AdminController@destroy')->name('admin.user.destroy');

                // 给管理员赋角色
                Route::get('user/{id}/role', 'AdminController@role')->name('admin.user.role');
                Route::put('user/{id}/assignRole', 'AdminController@assignRole')->name('admin.user.assignRole');

            });


            // 权限管理
            Route::group([], function () {
                Route::get('permission/{id}', 'PermissionController@index')->where('id', '[0-9]+')->name('admin.permission');
                Route::get('permission/data/{id}', 'PermissionController@data')->where('id', '[0-9]+')->name('admin.permission.data');
                //添加
                Route::get('permission/{id}/create', 'PermissionController@create')->where('id', '[0-9]+')->name('admin.permission.create');
                Route::post('permission/{id}/store', 'PermissionController@store')->where('id', '[0-9]+')->name('admin.permission.store');
                //编辑
                Route::get('permission/{id}/edit', 'PermissionController@edit')->name('admin.permission.edit');
                Route::put('permission/{id}/update', 'PermissionController@update')->name('admin.permission.update');
                //删除
                Route::delete('permission/destroy', 'PermissionController@destroy')->name('admin.permission.destroy');


            });


            // 角色管理
            Route::group([], function () {
                Route::get('role', 'RoleController@index')->name('admin.role');
                Route::get('role/data', 'RoleController@data')->name('admin.role.data');
                //添加
                Route::get('role/create', 'RoleController@create')->name('admin.role.create');
                Route::post('role/store', 'RoleController@store')->name('admin.role.store');
                //编辑
                Route::get('role/{id}/edit', 'RoleController@edit')->name('admin.role.edit');
                Route::put('role/{id}/update', 'RoleController@update')->name('admin.role.update');
                //删除
                Route::delete('role/destroy', 'RoleController@destroy')->name('admin.role.destroy');

                Route::get('role/{id}/permission', 'RoleController@permission')->name('admin.role.permission');
                Route::put('role/{id}/assignPermission', 'RoleController@assignPermission')->name('admin.role.assignPermission');
            });


            // 角色管理
            Route::group([], function () {
                Route::get('menu', 'MenuController@index')->name('admin.menu');
                Route::get('menu/data', 'MenuController@data')->name('admin.menu.data');
                //添加
                Route::get('menu/create', 'MenuController@create')->name('admin.menu.create');
                Route::post('menu/store', 'MenuController@store')->name('admin.menu.store');
                //编辑
                Route::get('menu/{id}/edit', 'MenuController@edit')->name('admin.menu.edit');
                Route::put('menu/{id}/update', 'MenuController@update')->name('admin.menu.update');
                //删除
                Route::delete('menu/destroy', 'MenuController@destroy')->name('admin.menu.destroy');


            });

            // 栏目管理
            Route::group([], function () {
                Route::get('website', 'WebsiteController@index')->name('admin.website');
                Route::get('website/data', 'WebsiteController@data')->name('admin.website.data');
                //添加
                Route::get('website/create', 'WebsiteController@create')->name('admin.website.create');
                Route::post('website/store', 'WebsiteController@store')->name('admin.website.store');
                //编辑
                Route::get('website/{id}/edit', 'WebsiteController@edit')->name('admin.website.edit');
                Route::put('website/{id}/update', 'WebsiteController@update')->name('admin.website.update');
                //删除
                Route::delete('website/destroy', 'WebsiteController@destroy')->name('admin.website.destroy');


            });


        });


    });
});
