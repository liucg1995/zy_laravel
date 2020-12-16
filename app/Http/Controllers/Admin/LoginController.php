<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('admin.login.login');
    }



    public function store(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request->remember;
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect(route('admin.login'));
        }else{
           return back()->withErrors(['密码错误']);
        }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'))->with('success','注销成功');
    }

}
