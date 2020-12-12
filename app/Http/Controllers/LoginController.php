<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index()
    {

        return view('admin.login');
    }

    public function store(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $remember = $request->remember;
        if (Auth::guard('admin')->attempt($credentials,$remember)) {
            $user =  Auth::guard('admin')->user();
//            dd($user);
            // 认证通过．．．
            return redirect('/admin/');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

}
