<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('admin.login.login');
    }

    protected function redirectTo(Request $request)
    {
        return route('admin.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request->remember;
        $data = [
            'username' => $request->username,
            'password' => $request->password,
            'ip' => $request->ip(),
            'method' => $request->method(),
            'user_agent' => $request->header('User-Agent'),
        ];
        if (Auth::attempt($credentials, $remember)) {
            $data['remark'] = '登录成功';
            LoginLog::query()->create($data);
            return redirect(route('admin.home'));
        } else {
            $data['remark'] = '登录失败';
            LoginLog::query()->create($data);
            return back()->withErrors(['用户名或密码错误']);
        }

    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'))->with('success', '注销成功');
    }

}
