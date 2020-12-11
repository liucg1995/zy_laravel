<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends AdminController
{
    /**
     *  后台首页
     */
    public function index()
    {

        return view('admin.home.index');
    }
}
