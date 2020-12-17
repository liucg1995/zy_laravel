<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminBaseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth.admin'); //  登录中间件
    }

    /**
     *  管理员账户信息
     */
    public function get_user_info()
    {
        return Auth::user();
    }

}
