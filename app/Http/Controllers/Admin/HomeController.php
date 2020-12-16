<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminBaseController;
use Illuminate\Support\Facades\Auth;

class HomeController extends AdminBaseController
{
    /**
     *  后台首页
     */
    public function index()
    {
        return view('admin.home.index');
    }
}
