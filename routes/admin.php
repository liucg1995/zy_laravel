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


            // 基本信息
            Route::group([], function () {
                //添加
                Route::get('profile', 'ProfileController@index')->name('admin.profile');
                Route::put('profile/update', 'ProfileController@update')->name('admin.profile.update');
            });
//            Route::resource('news', 'NewsController');

//
////            Route::resource('menu', \App\Http\Controllers\Admin\MenuController::class);
//            Route::get('menu/data', 'MenuController@data')->name('admin.menu.data');
//
//            Route::get('menu/create', 'MenuController@create')->name('admin.menu.create');
//            Route::post('menu/store', 'MenuController@store')->name('admin.menu.store');


            // 新闻管理
            Route::group(['middleware' => 'permission:system.news'], function () {
                Route::get('news', 'NewsController@index')->name('admin.news')->middleware('permission:admin.news');
                Route::get('news/data', 'NewsController@data')->name('admin.news.data')->middleware('permission:admin.news');
                //添加
                Route::get('news/create', 'NewsController@create')->name('admin.news.create')->middleware('permission:admin.news.create');
                Route::post('news/store', 'NewsController@store')->name('admin.news.store')->middleware('permission:admin.news.create');
                //编辑
                Route::get('news/{id}/edit', 'NewsController@edit')->name('admin.news.edit')->middleware('permission:admin.news.edit');
                Route::put('news/{id}/update', 'NewsController@update')->name('admin.news.update')->middleware('permission:admin.news.edit');
                //删除
                Route::delete('news/destroy', 'NewsController@destroy')->name('admin.news.destroy')->middleware('permission:admin.news.destroy');

            });

            Route::group(['middleware' => 'permission:admin.system'], function () {
                //管理员管理
                Route::group(['middleware' => 'permission:admin.user'], function () {
                    Route::get('user', 'AdminController@index')->name('admin.user')->middleware('permission:admin.user');
                    Route::get('user/data', 'AdminController@data')->name('admin.user.data')->middleware('permission:admin.user');
                    //添加
                    Route::get('user/create', 'AdminController@create')->name('admin.user.create')->middleware('permission:admin.user.create');
                    Route::post('user/store', 'AdminController@store')->name('admin.user.store')->middleware('permission:admin.user.create');
                    //编辑
                    Route::get('user/{id}/edit', 'AdminController@edit')->name('admin.user.edit')->middleware('permission:admin.user.edit');
                    Route::put('user/{id}/update', 'AdminController@update')->name('admin.user.update')->middleware('permission:admin.user.edit');
                    //删除
                    Route::delete('user/destroy', 'AdminController@destroy')->name('admin.user.destroy')->middleware('permission:admin.user.destroy');

                    // 给管理员赋角色
                    Route::get('user/{id}/role', 'AdminController@role')->name('admin.user.role')->middleware('permission:admin.user.role');
                    Route::put('user/{id}/assignRole', 'AdminController@assignRole')->name('admin.user.assignRole')->middleware('permission:admin.user.role');

                });


                // 权限管理
                Route::group(['middleware' => 'permission:admin.menu.permission'], function () {
                    Route::get('permission', 'PermissionController@index')->where('id', '[0-9]+')->name('admin.permission')->middleware('permission:admin.menu.permission');
                    Route::get('permission/{id}', 'PermissionController@index')->where('id', '[0-9]+')->name('admin.permission.menu')->middleware('permission:admin.menu.permission');
                    Route::get('permission/data/{id}', 'PermissionController@data')->where('id', '[0-9]+')->name('admin.permission.data')->middleware('permission:admin.menu.permission');
                    //添加
                    Route::get('permission/{id}/create', 'PermissionController@create')->where('id', '[0-9]+')->name('admin.permission.create')->middleware('permission:admin.permission.create');
                    Route::post('permission/{id}/store', 'PermissionController@store')->where('id', '[0-9]+')->name('admin.permission.store')->middleware('permission:admin.permission.create');
                    //编辑
                    Route::get('permission/{id}/edit', 'PermissionController@edit')->name('admin.permission.edit')->middleware('permission:admin.permission.edit');
                    Route::put('permission/{id}/update', 'PermissionController@update')->name('admin.permission.update')->middleware('permission:admin.permission.edit');
                    //删除
                    Route::delete('permission/destroy', 'PermissionController@destroy')->name('admin.permission.destroy')->middleware('permission:admin.permission.destroy');


                });


                // 角色管理
                Route::group(['middleware' => 'permission:admin.role'], function () {
                    Route::get('role', 'RoleController@index')->name('admin.role')->middleware(['permission:admin.role']);
                    Route::get('role/data', 'RoleController@data')->name('admin.role.data')->middleware('permission:admin.role');
                    //添加
                    Route::get('role/create', 'RoleController@create')->name('admin.role.create')->middleware('permission:admin.role.create');
                    Route::post('role/store', 'RoleController@store')->name('admin.role.store')->middleware('permission:admin.role.create');
                    //编辑
                    Route::get('role/{id}/edit', 'RoleController@edit')->name('admin.role.edit')->middleware('permission:admin.role.edit');
                    Route::put('role/{id}/update', 'RoleController@update')->name('admin.role.update')->middleware('permission:admin.role.edit');
                    //删除
                    Route::delete('role/destroy', 'RoleController@destroy')->name('admin.role.destroy')->middleware('permission:admin.role.destroy');

                    Route::get('role/{id}/permission', 'RoleController@permission')->name('admin.role.permission')->middleware('role_or_permission:super_role|admin.role.permission');
                    Route::put('role/{id}/assignPermission', 'RoleController@assignPermission')->name('admin.role.assignPermission')->middleware('role_or_permission:super_role|admin.role.permission');;
                });


                // 菜单管理
                Route::group(['middleware' => 'permission:admin.menu'], function () {
                    Route::get('menu', 'MenuController@index')->name('admin.menu')->middleware('permission:admin.menu');
                    Route::get('menu/data', 'MenuController@data')->name('admin.menu.data')->middleware('permission:admin.menu');
                    //添加
                    Route::get('menu/create', 'MenuController@create')->name('admin.menu.create')->middleware('permission:admin.menu.create');
                    Route::post('menu/store', 'MenuController@store')->name('admin.menu.store')->middleware('permission:admin.menu.create');
                    //编辑
                    Route::get('menu/{id}/edit', 'MenuController@edit')->name('admin.menu.edit')->middleware('permission:admin.menu.edit');
                    Route::put('menu/{id}/update', 'MenuController@update')->name('admin.menu.update')->middleware('permission:admin.menu.edit');
                    //删除
                    Route::delete('menu/destroy', 'MenuController@destroy')->name('admin.menu.destroy')->middleware('permission:admin.menu.destroy');


                });
            });

            // 栏目管理
            Route::group(['middleware' => 'permission:system.website'], function () {
                Route::get('website', 'WebsiteController@index')->name('admin.website')->middleware('permission:admin.website');
                Route::get('website/data', 'WebsiteController@data')->name('admin.website.data')->middleware('permission:admin.website');
                //添加
                Route::get('website/create', 'WebsiteController@create')->name('admin.website.create')->middleware('permission:admin.website.create');
                Route::post('website/store', 'WebsiteController@store')->name('admin.website.store')->middleware('permission:admin.website.create');
                //编辑
                Route::get('website/{id}/edit', 'WebsiteController@edit')->name('admin.website.edit')->middleware('permission:admin.website.edit');
                Route::put('website/{id}/update', 'WebsiteController@update')->name('admin.website.update')->middleware('permission:admin.website.edit');
                //删除
                Route::delete('website/destroy', 'WebsiteController@destroy')->name('admin.website.destroy')->middleware('permission:admin.website.destroy');

            });


        });


    });
});
