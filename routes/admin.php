<?php


Route::prefix('admin')->group(function () {
    Route::group(['namespace' => '\App\Http\Controllers\Admin\\'], function () {
        Route::get('login', 'LoginController@index')->name('admin.loginForm');
        Route::post('login', 'LoginController@store')->name('admin.login');
        Route::get('logout', 'LoginController@logout')->name('admin.logout');
    });
    // auth.base  登录中间件 ： 传参
    Route::middleware(['auth.basic:admin'])->group(function () {


        Route::group(['namespace' => '\App\Http\Controllers\Admin\\'], function () {

            Route::get('/', 'HomeController@index');
            Route::resource('news', 'NewsController');

//
////            Route::resource('menu', \App\Http\Controllers\Admin\MenuController::class);
//            Route::get('menu/data', 'MenuController@data')->name('admin.menu.data');
//
//            Route::get('menu/create', 'MenuController@create')->name('admin.menu.create');
//            Route::post('menu/store', 'MenuController@store')->name('admin.menu.store');


            //管理员管理
            Route::group([], function () {
                Route::get('admin', 'AdminController@index')->name('admin.admin');
                Route::get('admin/data', 'AdminController@data')->name('admin.admin.data');
                //添加
                Route::get('admin/create', 'AdminController@create')->name('admin.admin.create');
                Route::post('admin/store', 'AdminController@store')->name('admin.admin.store');
                //编辑
                Route::get('admin/{id}/edit', 'AdminController@edit')->name('admin.admin.edit');
                Route::put('admin/{id}/update', 'AdminController@update')->name('admin.admin.update');
                //删除
                Route::delete('admin/destroy', 'AdminController@destroy')->name('admin.admin.destroy');

                // 给管理员赋角色
                Route::get('admin/{id}/role', 'AdminController@role')->name('admin.admin.role');
                Route::put('admin/{id}/assignRole','AdminController@assignRole')->name('admin.admin.assignRole');

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

        });


    });
});
