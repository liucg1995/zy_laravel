<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::defaultView('vendor.pagination.bootstrap-4');


        //左侧菜单
        view()->composer('admin.layout', function ($view) {

            $user_info = \Auth::user();

            $layout_menus = Permission::query()->where('parent_id',0)->with('childs')->get();



            $route_name = Route::currentRouteName();


            $view->with('route_name', $route_name);
            $view->with('user_info', $user_info);
            $view->with('layout_menus', $layout_menus);
        });
    }


}
